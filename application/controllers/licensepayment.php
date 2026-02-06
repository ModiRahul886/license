<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * License payment + license-key generation flow (PayPal Standard/IPN)
 *
 * Endpoints:
 * - POST /licensepayment/request
 * - POST /licensepayment/verify
 * - POST /licensepayment/ipn
 * - GET  /licensepayment/success
 * - GET  /licensepayment/cancelled
 * - GET  /licensepayment/failed
 */
class Licensepayment extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('licensepayment_model', '', true);
	}

	private function json_response($data)
	{
		header('Content-type: application/json');
		$callback = '';
		if (isset($_REQUEST['callback'])) {
			$callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
		}
		$main = json_encode($data);
		echo $callback . '' . $main . '';
		exit;
	}

	private function get_transaction_mode()
	{
		// configurations.tDescription = 'Transaction Mode' => 'Yes' for Live, 'No' for Testing
		$mode = $this->licensepayment_model->get_configuration_value_by_description('Transaction Mode');
		if ($mode === null) {
			return 'sandbox';
		}
		return (trim($mode) === 'Yes') ? 'live' : 'sandbox';
	}

	private function parse_transaction_mode_override($mode)
	{
		$mode = strtolower(trim((string)$mode));
		if ($mode === 'yes' || $mode === 'live' || $mode === 'production' || $mode === 'prod') {
			return 'live';
		}
		if ($mode === 'no' || $mode === 'sandbox' || $mode === 'test' || $mode === 'testing') {
			return 'sandbox';
		}
		return null;
	}

	private function get_paypal_business_email()
	{
		// configurations.tDescription = 'Owner Paypal Email Account'
		$email = $this->licensepayment_model->get_configuration_value_by_description('Owner Paypal Email Account');
		if ($email !== null) {
			$email = trim($email);
		}
		return $email;
	}

	private function get_amount_for_duration($durationMonths)
	{
		$durationMonths = (int)$durationMonths;
		$map = array(
			1 => '1 Month Vendor Subscription Price',
			3 => '3 Month Vendor Subscription Price',
			6 => '6 Month Vendor Subscription Price',
			12 => '12 Month Vendor Subscription Price',
		);
		if (!isset($map[$durationMonths])) {
			return null;
		}
		$val = $this->licensepayment_model->get_configuration_value_by_description($map[$durationMonths]);
		if ($val === null) {
			return null;
		}
		return (float)$val;
	}

	private function paypal_checkout_base_url($mode)
	{
		return ($mode === 'live')
			? 'https://www.paypal.com/cgi-bin/webscr'
			: 'https://www.sandbox.paypal.com/cgi-bin/webscr';
	}

	private function paypal_ipn_verify_url($mode)
	{
		return ($mode === 'live')
			? 'https://ipnpb.paypal.com/cgi-bin/webscr'
			: 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr';
	}

	private function build_paypal_payment_url($requestId, $businessEmail, $amount, $currency, $itemName, $modeOverride = null)
	{
		$mode = $modeOverride ? $modeOverride : $this->get_transaction_mode();
		$base = $this->paypal_checkout_base_url($mode);

		$returnUrl = site_url('licensepayment/success') . '?request_id=' . urlencode($requestId);
		$cancelUrl = site_url('licensepayment/cancelled') . '?request_id=' . urlencode($requestId);
		$failedUrl = site_url('licensepayment/failed') . '?request_id=' . urlencode($requestId);
		$notifyUrl = site_url('licensepayment/ipn');

		$params = array(
			'cmd' => '_xclick',
			'business' => $businessEmail,
			'item_name' => $itemName,
			'amount' => number_format((float)$amount, 2, '.', ''),
			'currency_code' => $currency,
			'no_note' => '1',
			'rm' => '2',
			'custom' => (string)$requestId,
			'invoice' => 'LICREQ-' . (string)$requestId,
			'return' => $returnUrl,
			'cancel_return' => $cancelUrl,
			'notify_url' => $notifyUrl,
			'bn' => 'CRMPunch_License',
			// Not a native PayPal parameter, but included for clients that want a known "failed" URL.
			// Safe to keep; PayPal will ignore unknown keys.
			'failed_return' => $failedUrl,
		);

		return $base . '?' . http_build_query($params);
	}

	/**
	 * POST: email, modulesid, duration_months (1/3/6/12), amount(optional), currency(optional)
	 * Returns: payment_url + request_id
	 */
	function request()
	{
		// Support both POST body and query string for easier Postman testing.
		$email = trim((string)($this->input->post('email') !== null ? $this->input->post('email') : $this->input->get('email')));
		$modulesIdRaw = ($this->input->post('modulesid') !== null ? $this->input->post('modulesid') : $this->input->get('modulesid'));
		$durationRaw = ($this->input->post('duration_months') !== null ? $this->input->post('duration_months') : $this->input->get('duration_months'));
		$amount = ($this->input->post('amount') !== null ? $this->input->post('amount') : $this->input->get('amount'));
		$currency = strtoupper(trim((string)($this->input->post('currency') !== null ? $this->input->post('currency') : $this->input->get('currency'))));
		$businessEmailOverride = trim((string)($this->input->post('business_email') !== null ? $this->input->post('business_email') : $this->input->get('business_email')));
		$modeOverrideRaw = ($this->input->post('transaction_mode') !== null ? $this->input->post('transaction_mode') : $this->input->get('transaction_mode'));

		$modulesId = (int)$modulesIdRaw;
		$durationMonths = (int)$durationRaw;

		if ($email === '' || $modulesId <= 0) {
			return $this->json_response(array('status' => 'Failure', 'msg' => 'Failure, Please use correct paramaters'));
		}
		if ($durationMonths <= 0) {
			$durationMonths = 12;
		}
		if ($currency === '') {
			$currency = 'USD';
		}
		$businessEmail = $businessEmailOverride !== '' ? $businessEmailOverride : $this->get_paypal_business_email();
		if ($businessEmail === null || $businessEmail === '') {
			return $this->json_response(array(
				'status' => 'Failure',
				'msg' => "Paypal business email not configured. Set it in Admin > Configuration (Owner Paypal Email Account) OR pass 'business_email' param in this request.",
			));
		}

		// user must exist
		$user = $this->licensepayment_model->get_user_by_email($email);
		if (empty($user)) {
			return $this->json_response(array('status' => 'Failure', 'msg' => 'User email not found'));
		}

		$module = $this->licensepayment_model->get_module_by_id($modulesId);
		if (empty($module)) {
			return $this->json_response(array('status' => 'Failure', 'msg' => 'Invalid modulesid'));
		}

		if ($amount === null || trim((string)$amount) === '') {
			$amount = $this->get_amount_for_duration($durationMonths);
		}
		$amount = (float)$amount;
		if ($amount <= 0) {
			return $this->json_response(array('status' => 'Failure', 'msg' => 'Amount is required (or configure subscription prices in Settings)'));
		}

		$requestData = array(
			'vEmail' => $email,
			'iModulesId' => $modulesId,
			'iDurationMonths' => $durationMonths,
			'fAmount' => $amount,
			'vCurrency' => $currency,
			'eStatus' => 'Pending',
			'dCreatedDate' => date('Y-m-d H:i:s'),
			'dUpdatedDate' => date('Y-m-d H:i:s'),
		);
		$requestId = $this->licensepayment_model->create_request($requestData);
		if (!$requestId) {
			return $this->json_response(array('status' => 'Failure', 'msg' => 'Unable to create request'));
		}

		$itemName = 'License - ' . $module['modules'];
		$modeOverride = $this->parse_transaction_mode_override($modeOverrideRaw);
		$effectiveMode = $modeOverride ? $modeOverride : $this->get_transaction_mode();
		$paymentUrl = $this->build_paypal_payment_url($requestId, $businessEmail, $amount, $currency, $itemName, $modeOverride);

		return $this->json_response(array(
			'status' => 'Success',
			'msg' => 'Payment link generated',
			'request_id' => (int)$requestId,
			'transaction_mode' => $effectiveMode,
			'business_email_used' => $businessEmail,
			'payment_url' => $paymentUrl,
			'callback_urls' => array(
				'success' => site_url('licensepayment/success') . '?request_id=' . urlencode($requestId),
				'cancelled' => site_url('licensepayment/cancelled') . '?request_id=' . urlencode($requestId),
				'failed' => site_url('licensepayment/failed') . '?request_id=' . urlencode($requestId),
			),
		));
	}

	/**
	 * POST: request_id
	 */
	function verify()
	{
		$requestId = (int)$this->input->post('request_id');
		if ($requestId <= 0) {
			return $this->json_response(array('status' => 'Failure', 'msg' => 'Failure, Please use correct paramaters'));
		}

		$req = $this->licensepayment_model->get_request_by_id($requestId);
		if (empty($req)) {
			return $this->json_response(array('status' => 'Failure', 'msg' => 'Request not found'));
		}

		$out = array(
			'status' => 'Success',
			'msg' => 'OK',
			'request_id' => (int)$requestId,
			'payment_status' => $req['eStatus'],
			'paypal_payment_status' => $req['vPaypalPaymentStatus'],
			'paypal_txn_id' => $req['vPaypalTxnId'],
			'license_id' => $req['iLicenseId'],
		);

		if ($req['eStatus'] === 'Paid' && !empty($req['iLicenseId'])) {
			$license = $this->licensepayment_model->get_license_by_id($req['iLicenseId']);
			if (!empty($license)) {
				$out['license_key'] = $license['license_key'];
				$out['license_expire_date'] = $license['license_expire_date'];
			}
		}

		return $this->json_response($out);
	}

	/**
	 * PayPal IPN (server-to-server)
	 */
	function ipn()
	{
		// Always return 200 quickly.
		if (empty($_POST)) {
			echo 'NOPOST';
			exit;
		}

		$mode = $this->get_transaction_mode();
		$verifyUrl = $this->paypal_ipn_verify_url($mode);

		$verifyData = $_POST;
		$verifyData['cmd'] = '_notify-validate';

		$verifyResponse = $this->curl->simple_post(
			$verifyUrl,
			$verifyData,
			array(
				CURLOPT_SSL_VERIFYPEER => true,
				CURLOPT_SSL_VERIFYHOST => 2,
				CURLOPT_HTTPHEADER => array('Connection: Close'),
				CURLOPT_TIMEOUT => 30,
			)
		);

		if ($verifyResponse === false || stripos((string)$verifyResponse, 'VERIFIED') === false) {
			// Invalid IPN
			echo 'INVALID';
			exit;
		}

		$requestId = isset($_POST['custom']) ? (int)$_POST['custom'] : 0;
		if ($requestId <= 0) {
			echo 'NOREQ';
			exit;
		}

		$req = $this->licensepayment_model->get_request_by_id($requestId);
		if (empty($req)) {
			echo 'REQNF';
			exit;
		}

		$paymentStatus = isset($_POST['payment_status']) ? trim((string)$_POST['payment_status']) : '';
		$txnId = isset($_POST['txn_id']) ? trim((string)$_POST['txn_id']) : '';
		$receiverEmail = isset($_POST['receiver_email']) ? trim((string)$_POST['receiver_email']) : '';
		$mcGross = isset($_POST['mc_gross']) ? (float)$_POST['mc_gross'] : null;
		$currency = isset($_POST['mc_currency']) ? strtoupper(trim((string)$_POST['mc_currency'])) : null;

		// Optional receiver email validation if configured
		$businessEmail = $this->get_paypal_business_email();
		if (!empty($businessEmail) && !empty($receiverEmail) && strcasecmp($businessEmail, $receiverEmail) !== 0) {
			$this->licensepayment_model->update_request($requestId, array(
				'eStatus' => 'Invalid',
				'vPaypalTxnId' => $txnId,
				'vPaypalPaymentStatus' => $paymentStatus,
				'tPaypalRaw' => json_encode($_POST),
				'dUpdatedDate' => date('Y-m-d H:i:s'),
			));
			echo 'RECEIVER_MISMATCH';
			exit;
		}

		// Optional amount/currency validation
		if ($mcGross !== null && (float)$req['fAmount'] > 0 && abs($mcGross - (float)$req['fAmount']) > 0.01) {
			$this->licensepayment_model->update_request($requestId, array(
				'eStatus' => 'Invalid',
				'vPaypalTxnId' => $txnId,
				'vPaypalPaymentStatus' => $paymentStatus,
				'tPaypalRaw' => json_encode($_POST),
				'dUpdatedDate' => date('Y-m-d H:i:s'),
			));
			echo 'AMOUNT_MISMATCH';
			exit;
		}
		if ($currency !== null && !empty($req['vCurrency']) && strtoupper($req['vCurrency']) !== $currency) {
			$this->licensepayment_model->update_request($requestId, array(
				'eStatus' => 'Invalid',
				'vPaypalTxnId' => $txnId,
				'vPaypalPaymentStatus' => $paymentStatus,
				'tPaypalRaw' => json_encode($_POST),
				'dUpdatedDate' => date('Y-m-d H:i:s'),
			));
			echo 'CURRENCY_MISMATCH';
			exit;
		}

		// Update request with PayPal info
		$this->licensepayment_model->update_request($requestId, array(
			'vPaypalTxnId' => $txnId,
			'vPaypalPaymentStatus' => $paymentStatus,
			'tPaypalRaw' => json_encode($_POST),
			'dUpdatedDate' => date('Y-m-d H:i:s'),
		));

		if (strcasecmp($paymentStatus, 'Completed') !== 0) {
			// Not completed - mark as failed/cancelled/pending based on PayPal status
			$mapped = 'Pending';
			if (in_array($paymentStatus, array('Denied', 'Failed', 'Voided', 'Expired', 'Reversed', 'Refunded'), true)) {
				$mapped = 'Failed';
			}
			$this->licensepayment_model->update_request($requestId, array(
				'eStatus' => $mapped,
				'dUpdatedDate' => date('Y-m-d H:i:s'),
			));
			echo 'NOT_COMPLETED';
			exit;
		}

		// If already paid, do nothing (idempotent)
		if ($req['eStatus'] === 'Paid' && !empty($req['iLicenseId'])) {
			echo 'ALREADY_PAID';
			exit;
		}

		// Create license + assign to user
		$user = $this->licensepayment_model->get_user_by_email($req['vEmail']);
		$module = $this->licensepayment_model->get_module_by_id((int)$req['iModulesId']);
		if (empty($user) || empty($module)) {
			$this->licensepayment_model->update_request($requestId, array(
				'eStatus' => 'Failed',
				'dUpdatedDate' => date('Y-m-d H:i:s'),
			));
			echo 'USER_OR_MODULE_MISSING';
			exit;
		}

		$prefix = 'CP';
		if (!empty($module['modules'])) {
			$prefix = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $module['modules']), 0, 3));
			if ($prefix === '') {
				$prefix = 'CP';
			}
		}
		$licenseObj = new KeyLicense($prefix, 'AA99-9A9A-A9A9-99AA', 'upper', 1);
		$licenseKey = $licenseObj->generate();

		$activeDate = date('Y-m-d');
		$expireDate = date('Y-m-d', strtotime('+' . (int)$req['iDurationMonths'] . ' months', strtotime($activeDate)));

		$licenseData = array(
			'licensename' => 'Auto - ' . $module['modules'],
			'modulesid' => (int)$req['iModulesId'],
			'modulesname' => $module['modules'],
			'license_key' => $licenseKey,
			'prefix_code' => $prefix,
			'license_active_date' => $activeDate,
			'license_expire_date' => $expireDate,
			'created_date' => date('Y-m-d'),
			'eStatus' => 'Active',
		);
		$licenseId = $this->licensepayment_model->create_license($licenseData);
		if (!$licenseId) {
			$this->licensepayment_model->update_request($requestId, array(
				'eStatus' => 'Failed',
				'dUpdatedDate' => date('Y-m-d H:i:s'),
			));
			echo 'LICENSE_CREATE_FAIL';
			exit;
		}

		$assigned = $this->licensepayment_model->assign_license_to_user((int)$user['iUserId'], (int)$licenseId);
		if (!$assigned) {
			// Leave license row; mark request failed so admin can resolve.
			$this->licensepayment_model->update_request($requestId, array(
				'eStatus' => 'Failed',
				'iLicenseId' => (int)$licenseId,
				'dUpdatedDate' => date('Y-m-d H:i:s'),
			));
			echo 'ASSIGN_FAIL';
			exit;
		}

		$this->licensepayment_model->update_request($requestId, array(
			'eStatus' => 'Paid',
			'iLicenseId' => (int)$licenseId,
			'dUpdatedDate' => date('Y-m-d H:i:s'),
		));

		echo 'OK';
		exit;
	}

	function success()
	{
		$requestId = isset($_GET['request_id']) ? (int)$_GET['request_id'] : 0;
		header('Content-Type: text/plain');
		if ($requestId <= 0) {
			echo 'Payment Success. (request_id missing)';
			return;
		}

		$req = $this->licensepayment_model->get_request_by_id($requestId);
		if (empty($req)) {
			echo 'Payment Success. (request not found)';
			return;
		}
		echo 'Payment Success. Request ID: ' . $requestId;
		if ($req['eStatus'] === 'Paid' && !empty($req['iLicenseId'])) {
			$license = $this->licensepayment_model->get_license_by_id($req['iLicenseId']);
			if (!empty($license)) {
				echo "\nLicense Key: " . $license['license_key'];
				echo "\nExpiry Date: " . $license['license_expire_date'];
			}
		} else {
			echo "\nYour payment is being verified. Please check again shortly.";
		}
	}

	function cancelled()
	{
		$requestId = isset($_GET['request_id']) ? (int)$_GET['request_id'] : 0;
		if ($requestId > 0) {
			$this->licensepayment_model->update_request($requestId, array(
				'eStatus' => 'Cancelled',
				'dUpdatedDate' => date('Y-m-d H:i:s'),
			));
		}
		header('Content-Type: text/plain');
		echo 'Payment Cancelled.';
		if ($requestId > 0) {
			echo " Request ID: " . $requestId;
		}
	}

	function failed()
	{
		$requestId = isset($_GET['request_id']) ? (int)$_GET['request_id'] : 0;
		if ($requestId > 0) {
			$this->licensepayment_model->update_request($requestId, array(
				'eStatus' => 'Failed',
				'dUpdatedDate' => date('Y-m-d H:i:s'),
			));
		}
		header('Content-Type: text/plain');
		echo 'Payment Failed.';
		if ($requestId > 0) {
			echo " Request ID: " . $requestId;
		}
	}
}

?>

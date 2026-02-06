<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Licensepayments extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('licensepayment_model', '', TRUE);
		$this->load->model('common_model', '', TRUE);

		$this->smarty->assign("data", $this->data);
		if (!isset($this->session->userdata['license_admin_info'])) {
			redirect($this->data['admin_url'] . 'authentication');
			exit;
		}
	}

	function index() {
		$this->data['menuAction'] = 'managePayments';
		$this->data['payment_requests'] = $this->licensepayment_model->get_requests_with_details();
		$this->data['tpl_name'] = "admin/licensepayments/view_licensepayments.tpl";
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];

		$this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
		$this->breadcrumb->add('License Payments', '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();

		$this->smarty->assign('data', $this->data);
		$this->smarty->view('admin/admin-template.tpl');
	}

	function view() {
		$requestId = (int)$this->uri->segment(4);
		if ($requestId <= 0) {
			redirect($this->data['admin_url'] . 'licensepayments');
			return;
		}

		$this->data['menuAction'] = 'managePayments';
		$this->data['payment_request'] = $this->licensepayment_model->get_request_detail_with_details($requestId);
		if (empty($this->data['payment_request'])) {
			$this->session->set_flashdata('message', 'Request not found');
			redirect($this->data['admin_url'] . 'licensepayments');
			return;
		}

		$this->data['tpl_name'] = "admin/licensepayments/view_licensepayment_detail.tpl";
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];

		$this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
		$this->breadcrumb->add('License Payments', $this->data['admin_url'] . 'licensepayments');
		$this->breadcrumb->add('Request #' . $requestId, '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();

		$this->smarty->assign('data', $this->data);
		$this->smarty->view('admin/admin-template.tpl');
	}
}

?>

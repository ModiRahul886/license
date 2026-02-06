<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Licensepayment_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_requests_with_details()
	{
		$this->db->select('r.*');
		$this->db->select('m.modules AS vModuleName');
		$this->db->select('l.license_key AS vLicenseKey, l.license_expire_date AS dLicenseExpireDate');
		$this->db->from('license_payment_requests AS r');
		$this->db->join('modules AS m', 'm.imodulesId = r.iModulesId', 'left');
		$this->db->join('license AS l', 'l.ilicenseId = r.iLicenseId', 'left');
		$this->db->order_by('r.iRequestId', 'DESC');
		$q = $this->db->get();
		return $q->result_array();
	}

	function get_request_detail_with_details($requestId)
	{
		$this->db->select('r.*');
		$this->db->select('m.modules AS vModuleName');
		$this->db->select('l.licensename AS vLicenseName, l.license_key AS vLicenseKey, l.license_active_date AS dLicenseActiveDate, l.license_expire_date AS dLicenseExpireDate');
		$this->db->from('license_payment_requests AS r');
		$this->db->join('modules AS m', 'm.imodulesId = r.iModulesId', 'left');
		$this->db->join('license AS l', 'l.ilicenseId = r.iLicenseId', 'left');
		$this->db->where('r.iRequestId', (int)$requestId);
		$q = $this->db->get();
		return $q->row_array();
	}

	function create_request($data)
	{
		$q = $this->db->insert('license_payment_requests', $data);
		if ($q) {
			return $this->db->insert_id();
		}
		return false;
	}

	function get_request_by_id($requestId)
	{
		$this->db->from('license_payment_requests');
		$this->db->where('iRequestId', (int)$requestId);
		$q = $this->db->get();
		return $q->row_array();
	}

	function update_request($requestId, $data)
	{
		$this->db->where('iRequestId', (int)$requestId);
		return $this->db->update('license_payment_requests', $data);
	}

	function get_user_by_email($email)
	{
		$this->db->select('iUserId, vEmail');
		$this->db->from('users');
		$this->db->where('vEmail', $email);
		$q = $this->db->get();
		return $q->row_array();
	}

	function get_module_by_id($modulesId)
	{
		$this->db->select('imodulesId, modules');
		$this->db->from('modules');
		$this->db->where('imodulesId', (int)$modulesId);
		$q = $this->db->get();
		return $q->row_array();
	}

	function create_license($data)
	{
		$q = $this->db->insert('license', $data);
		if ($q) {
			return $this->db->insert_id();
		}
		return false;
	}

	function get_license_by_id($licenseId)
	{
		$this->db->from('license');
		$this->db->where('ilicenseId', (int)$licenseId);
		$q = $this->db->get();
		return $q->row_array();
	}

	function assign_license_to_user($userId, $licenseId)
	{
		$data = array(
			'userid' => (int)$userId,
			'licenseid' => (int)$licenseId,
			'assigned_date' => date('Y-m-d'),
		);
		$q = $this->db->insert('users_license', $data);
		if ($q) {
			return $this->db->insert_id();
		}
		return false;
	}

	function get_configuration_value_by_description($description)
	{
		// configurations table is used by admin settings.
		$this->db->select('vValue');
		$this->db->from('configurations');
		$this->db->where('tDescription', $description);
		$this->db->where('eStatus', 'Active');
		$q = $this->db->get();
		$row = $q->row_array();
		if (empty($row)) {
			return null;
		}
		return $row['vValue'];
	}
}

?>

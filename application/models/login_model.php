<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function checkClientCodeUsageStatus($code) {
        $this->db->select('');
        $this->db->from('client');
        $this->db->where('vForgotPasswordString', $code);
        $query = $this->db->get();
        $totrows = $query->num_rows();
        if ($totrows > 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }
    function checkDriverCodeUsageStatus($code) {
        $this->db->select('');
        $this->db->from('driver');
        $this->db->where('vForgotPasswordString', $code);
        $query = $this->db->get();
        $totrows = $query->num_rows();
        if ($totrows > 0) {
            return 'yes';
        } else {
            return 'no';
        }
    }
    //get login detail
    function getdriver_by_mail($data) {
        $this->db->select('');
        $this->db->from('driver');
        $this->db->where('vPassword', $data['vPassword']);
        $this->db->where('vEmail', $data['vEmail']);
        /*$this->db->where('eStatus','Active');*/
        $query = $this->db->get();
        return $query->row_array();
    }
    function check_credit_card_exists($credit_card_no) {
        $this->db->select('');
        $this->db->from('credit_card_information');
        $this->db->where('vCreditcardNo', $credit_card_no);
        $query = $this->db->get();
        $res = $query->row_array();
        if ($res) {
            return 'exist';
        } else {
            return 'not exist';
        }
    }
    //get login detail
    function getuser_by_mail($data) {
        $this->db->select('');
        $this->db->from('client');
        $this->db->where('vPassword', $data['vPassword']);
        $this->db->where('vEmail', $data['vEmail']);
        /*$this->db->where('eStatus','Active');*/
        $query = $this->db->get();
        return $query->row_array();
    }
    //get login detail
    function getcompany_by_name($data) {
        $this->db->select('');
        $this->db->from('company_information');
        $this->db->where('vPassword', $data['vPassword']);
        $this->db->where('vCompanyEmail', $data['vEmail']);
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();
        // echo "<pre>";print_r($query->row_array());exit;
        return $query->row_array();
    }
    //get login detail
    function checkdriver_mail($email) {
        $this->db->select('vEmail,vPassword,vFirstName,vLastName');
        $this->db->from('driver');
        $this->db->where('vEmail', $email);
        //$this->db->where('eStatus','Active');
        $query = $this->db->get();
        return $query->row_array();
    }
    //get login detail
    function checkuser_mail($email) {
        $this->db->select('vEmail,vPassword,vFirstName,vLastName');
        $this->db->from('client');
        $this->db->where('vEmail', $email);
        //$this->db->where('eStatus','Active');
        $query = $this->db->get();
        return $query->row_array();
    }
    function add_client($data) {
        $query = $this->db->insert('client', $data);
        return $this->db->insert_id();
    }
    function add_driver($data) {
        $query = $this->db->insert('driver', $data);
        return $this->db->insert_id();
    }
    function add_transaction($data) {
        $query = $this->db->insert('credit_card_information', $data);
        return $this->db->insert_id();
    }
    function add_company($data) {
        // echo "<pre>";print_r($data);exit;
        $query = $this->db->insert('company_information', $data);
        return $this->db->insert_id();
    }
    function add_bank($data) {
        $query = $this->db->insert('bank_detail', $data);
        return $this->db->insert_id();
    }
    function get_states($iCountryId) {
        $this->db->select('iStateId,iCountryId,vState');
        $this->db->from('state');
        $this->db->where('iCountryId', $iCountryId);
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_cities($iStateId) {
        $this->db->select('iCityId,vCity');
        $this->db->from('city');
        $this->db->where('iStateId', $iStateId);
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }
    function updatestatus($code, $table) {
        $data = array('eStatus' => 'Active', 'vActivationCode' => '');
        $this->db->where('vActivationCode', $code);
        $this->db->update($table, $data);
    }
    function updatetablestatus($email, $table, $data) {
        $this->db->where('vEmail', $email);
        $this->db->update($table, $data);
    }
    function get_card() {
        $this->db->select('');
        $this->db->from(' card_master');
        $query = $this->db->get();
        return $query->result_array();
    }
    function city_exists($iStateId, $vCity) {
        $this->db->select('');
        $this->db->from('city');
        $this->db->where('iStateId', $iStateId);
        $this->db->where('vCity', $vCity);
        $query = $this->db->get();
        return $query->row_array();
    }
    function add_city($data) {
        $query = $this->db->insert('city', $data);
        return $this->db->insert_id();
    }
    function getUserDetails($string, $table) {
        $this->db->select('');
        $this->db->from($table);
        $this->db->where('vForgotPasswordString', $string);
        return $this->db->get()->result_array();
    }
    function updatePassword($id, $type, $data) {
        if ($type == 'rider') {
            $table = 'client';
            $data['vForgotPasswordString'] = '';
            $this->db->where('iClientId', $id);
            $this->db->update($table, $data);
            return $this->db->affected_rows();
        } else {
            $table = 'driver';
            $data['vForgotPasswordString'] = '';
            $this->db->where('iDriverId', $id);
            $this->db->update($table, $data);
            return $this->db->affected_rows();
        }
    }
    //get login detail
    function checkcompany_mail($email) {
        $this->db->select('vCompanyEmail,vPassword,vCompnayName');
        $this->db->from('company_information');
        $this->db->where('vCompanyEmail', $email);
        //$this->db->where('eStatus','Active');
        $query = $this->db->get();
        return $query->row_array();
    }
    function getClientDetailByCode($code) {
        $this->db->select('iClientId,vEmail');
        $this->db->from('client');
        $this->db->where('vForgotPasswordString', $code);
        $query = $this->db->get();
        return $query->row_array();
    }
    function getDriverDetailByCode($code) {
        $this->db->select('iDriverId,vEmail');
        $this->db->from('driver');
        $this->db->where('vForgotPasswordString', $code);
        $query = $this->db->get();
        return $query->row_array();
    }
    function checkuser_facebookId($userFacebookId) {
        $this->db->select('iClientId,vEmail,vPassword,vFirstName,vLastName,biFBId');
        $this->db->from('client');
        $this->db->where('biFBId', $userFacebookId);
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();
        return $query->row_array();
    }
    function email_allready_exists($vEmail) {
        $this->db->select('');
        $this->db->from('client');
        $this->db->where('vEmail', $vEmail);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function add_freeUser_facebook($data) {
        $query = $this->db->insert('client', $data);
        return $this->db->insert_id();
    }
    function getcountryID($iStateId) {
        $this->db->select('iCountryId');
        $this->db->from('state');
        $this->db->where('iStateId', $iStateId);
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();
        return $query->row_array();
    }
    function checkExpiryDate($data) {
        $this->db->select('d.iDriverId,d.vFirstName,d.vLastName,d.vEmail,dl.vLicenceExpiryDate');
        $this->db->from('driver as d');
        $this->db->join('drivers_licence as dl', 'd.iDriverId=dl.iDriverId');
        $this->db->where('d.vPassword', $data['vPassword']);
        $this->db->where('d.vEmail', $data['vEmail']);
        /*$this->db->where('eStatus','Active');*/
        $query = $this->db->get();
        return $query->row_array();
    }
    function getClientStatusInfo($data) {
        $this->db->select('eStatus');
        $this->db->from('client');
        $this->db->where('vPassword', $data['vPassword']);
        $this->db->where('vEmail', $data['vEmail']);
        /*$this->db->where('eStatus','Active');*/
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_all_drivercategory(){
        $this->db->select('iDriverCategoryId,vCategory');
        $this->db->from('driver_category');
        $this->db->where('eStatus', 'Active');
        $this->db->order_by('iDriverCategoryId desc');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>
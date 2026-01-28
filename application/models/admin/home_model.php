<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class home_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function today_signup_user() {
        $today = date("Y-m-d");
        $this->db->select('iUserId,vFirstName,vLastName,vEmail,eStatus,dCreatedDate,iMobileNo');
        $this->db->from('users');
        //$this->db->where('dCreatedDate', $today);
        $this->db->order_by('dCreatedDate DESC');
        //$this->db->order_by('iUserId desc');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
    }

    function totalRegisterUsers(){
        $this->db->select('iUserId,vFirstName,vLastName,vEmail,eStatus,dCreatedDate');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_currency(){
        $this->db->select('vValue');
        $this->db->from('configurations');
        $this->db->where('vName','CURRENCY');
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['vValue'];
    }

    function get_allstates() {
        $this->db->select('iStateId,vState');
        $this->db->from('state');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_country() {
        $this->db->select('iCountryId,vCountry');
        $this->db->from('country');
        $query = $this->db->get();
        return $query->result_array();
    }

    function change_password($data) {
        $this->db->update("administrator", $data, array('iAdminId' => $data['iAdminId']));
        return $this->db->affected_rows();
    }

    function todayLicense(){
        $today = date("Y-m-d");
        $this->db->select('bb.ilicenseId,u.iUserId,bb.licensename,bb.license_key,bb.license_active_date,bb.license_expire_date,u.vFirstName,u.vLastName');
        $this->db->from('license as bb');
        $this->db->join('users_license as ul','bb.ilicenseId=ul.licenseid');
        $this->db->join('users as u','ul.userid=u.iUserId');
        //$this->db->where("DATE_FORMAT(bb.created_date,'%Y-%m-%d')", $today);
        $this->db->order_by("bb.created_date desc");
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();      
    }

    function getPendingBarFoodCount() {
        $this->db->select('eStatus');
        $this->db->from('food');
        $this->db->where('eStatus', 'Pending');
        $query = $this->db->count_all_results();
        return $query;
    }
}
?>
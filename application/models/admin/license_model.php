<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class License_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function getAllUsers(){
        $this->db->select("iUserId, vFirstName, vLastName");
        $this->db->from('users');
        $this->db->order_by('iUserId','desc');
        $query = $this->db->get();
        return $query->result_array();  
    }

    function getAllModules(){
        $this->db->select("imodulesId, modules, modulesname,eStatus");
        $this->db->from('modules');
        $this->db->order_by('imodulesId','desc');
        $query = $this->db->get();
        return $query->result_array();  
    }

    function getModulesById($imodulesId){
        $this->db->select("imodulesId, modules");
        $this->db->from('modules');
        $this->db->where('imodulesId', $imodulesId);
        $query = $this->db->get();
        return $query->row_array();  
    }

    function getAllLicenseDetail(){
        $this->db->select("b.ilicenseId,b.licensename,b.eStatus,b.license_key,b.license_active_date,b.license_expire_date",FALSE);
        $this->db->from('license as b');
        $this->db->order_by('b.ilicenseId','desc');
        $query = $this->db->get();
        return $query->result_array();  
    }

    function getBarOwnerDetails($ilicenseId) {
        $this->db->select('');
        $this->db->from('license');
        $this->db->where('ilicenseId', $ilicenseId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function edit_barDetail($data) {
        $this->db->update("license", $data, array('ilicenseId' => $data['ilicenseId']));
        return $this->db->affected_rows();
    }
    
    function add_license($data) {
        $this->db->insert('license', $data);
        return $this->db->insert_id();
    }
}
?>
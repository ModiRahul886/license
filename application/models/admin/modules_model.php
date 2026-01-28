<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Modules_model extends CI_Model {
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

    function getAllmodulesDetail(){
        $this->db->select("b.imodulesId,b.modulesname,b.modules,b.eStatus",FALSE);
        $this->db->from('modules as b');
        $this->db->order_by('b.imodulesId','desc');
        $query = $this->db->get();
        return $query->result_array();  
    }

    function getBarOwnerDetails($imodulesId) {
        $this->db->select('');
        $this->db->from('modules');
        $this->db->where('imodulesId', $imodulesId);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function edit_barDetail($data) {
        $this->db->update("modules", $data, array('imodulesId' => $data['imodulesId']));
        return $this->db->affected_rows();
    }
    
    function add_modules($data) {
        $this->db->insert('modules', $data);
        return $this->db->insert_id();
    }
}
?>
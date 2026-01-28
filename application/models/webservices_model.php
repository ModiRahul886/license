<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class webservices_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function validateLicense($licensekey){
        $this->db->select('ilicenseId');
        $this->db->from('license');
        $this->db->where('license_key',$licensekey);
        $que = $this->db->get();
        $res = $que->num_rows();
        if($res>0){
            return 'yes';
        }else {
            return 'no';
        }   
    }

    function licensekeyverifywithusers($licensekey,$email,$verify_date){
        $end_date = date('Y-m-d',strtotime('+1 year', strtotime($verify_date)));
        $minus_date = date('Y-m-d',strtotime('-1 day', strtotime($end_date)));
        $sql="SELECT t1.ilicenseId,t1.license_key 
                FROM license t1
                INNER JOIN users_license as ul ON t1.ilicenseId=ul.licenseid
                INNER JOIN users as u ON ul.userid=u.iUserId
                WHERE t1.license_key = '".$licensekey."' AND  
                	(t1.license_expire_date >='" . $verify_date . "')
                	AND u.vEmail = '".$email."'";    
        //echo $sql;exit;
        $query = $this->db->query($sql);
        $res = $query->num_rows();
        if($res>0){
            return 'YES';
        }else {
            return 'NO';
        }
    }

    function domainverifywithusers($email,$domain,$http_host,$remote_addr,$server_name,$server_addr){
        $end_date = date('Y-m-d',strtotime('+1 year', strtotime($verify_date)));
        $minus_date = date('Y-m-d',strtotime('-1 day', strtotime($end_date)));
        $sql="SELECT d1.verifyid,d1.iuserid 
                FROM domain_verify d1
                INNER JOIN users as u ON d1.iuserid=u.iUserId
                WHERE u.vEmail = '".$email."' AND http_host = '".$http_host."' AND remote_addr = '".$remote_addr."' AND server_name = '".$server_name."' AND server_addr = '".$server_addr."'";
        $query = $this->db->query($sql);
        $res = $query->num_rows();
        if($res>0){
            return 'YES';
        }else {
            return 'NO';
        }
    }

    function domainexistwithusers($email,$http_host,$remote_addr){
        $sql="SELECT d1.verifyid,d1.iuserid 
                FROM domain_verify d1
                INNER JOIN users as u ON d1.iuserid=u.iUserId
                WHERE u.vEmail = '".$email."' AND http_host = '".$http_host."' AND remote_addr = '".$remote_addr."'";
        $query = $this->db->query($sql);
        $res = $query->num_rows();
        if($res>0){
            return 'YES';
        }else {
            return 'NO';
        }
    }

    function check_userid_auth_exists($vEmail){
        $this->db->select('iUserId,vEmail');
        $this->db->from('users');
        $this->db->where('vEmail',$vEmail);
        $query = $this->db->get();
        return $query->row_array(); 
    }

    function update_domain_data($data){
        $this->db->insert('domain_verify', $data);
        return $this->db->insert_id();
    }
}
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL ^ (E_WARNING & ~E_NOTICE & ~E_DEPRECATED  & E_ERROR & ~E_STRICT));
ini_set('display_errors', 1);

class Webservices extends Admin_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('string');
        $this->load->model('webservices_model','',true);
    }

    function index(){
    	if ($this->input->post('action')) {
            $action = trim($this->input->post('action'));
        } else {
            $action = trim($_REQUEST["action"]);
        }
        switch($action){
            case 'verifyLicense':
                $this->verifyLicense();
                break;
            case 'authetication':
                $this->authetication();
                break;
        }
    }

    function verifyLicense(){
        if ($this->input->post('licensekey') && $this->input->post('email') && $this->input->post('domain') && $this->input->post('http_host') && $this->input->post('remote_addr') && $this->input->post('verify_date') && $this->input->post('server_name') && $this->input->post('server_addr')) {
            
            $check_license_exist = $this->webservices_model->validateLicense($this->input->post('licensekey'));
            if ($check_license_exist == 'yes') {
				$licenseInfo = $this->webservices_model->licensekeyverifywithusers($this->input->post('licensekey'),$this->input->post('email'),$this->input->post('verify_date'));
				//echo "<pre>";print_r($licenseInfo);exit;
				if (!empty($licenseInfo)) {
                    $domain_verify = $this->webservices_model->domainverifywithusers($this->input->post('email'),$this->input->post('domain'),$this->input->post('http_host'),$this->input->post('remote_addr'),$this->input->post('server_name'),$this->input->post('server_addr'));
                    if ($domain_verify == 'YES') {
                        $data['status'] = 'Success';
                        $data['msg'] = "License verify successfully";    
						$data['expirydate'] = isset($licenseInfo['license_expire_date']) ? $licenseInfo['license_expire_date'] : '';
                    }else{
                        $data['status'] = 'Failure';
                        $data['msg'] ='Domain verify failed, Please contact to administrator!';
                    }
                }else{
                    $data['status'] = 'Failure';
                    $data['msg'] ='License key not verified, Please contact to administrator!';
                }
            }else{
                $data['status'] = 'Failure';
                $data['msg'] ='License key is wrong, Please contact to administrator!';
            }
        } else {
			$data['status'] = 'Failure';
			$data['msg'] = 'Failure, Please use correct paramaters';
        }
    	
        header('Content-type: application/json');
        $callback = '';
        if (isset($_REQUEST['callback'])){
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($data);
        echo $callback . ''.$main.'';
        exit;
    }

    function authetication(){
        if ($this->input->post('email') && $this->input->post('domain') && $this->input->post('http_host') && $this->input->post('remote_addr') && $this->input->post('server_name') && $this->input->post('server_addr')) {
    		$authData =  $this->webservices_model->check_userid_auth_exists($this->input->post('email'));
            if($authData){
            	$domainExist = $this->webservices_model->domainexistwithusers($this->input->post('email'),$this->input->post('http_host'),$this->input->post('remote_addr'));
            	if ($domainExist == "NO") {
            		$addData['iuserid'] = $authData['iUserId'];
	                $addData['domain'] = $this->input->post('domain');
	                $addData['http_host'] = $this->input->post('http_host');
	                $addData['remote_addr'] = $this->input->post('remote_addr');
	                $addData['server_name'] = $this->input->post('server_name');
	                $addData['server_addr'] = $this->input->post('server_addr');
	                $addData['created_date'] = date('Y-m-d');
	                $updateDetails = $this->webservices_model->update_domain_data($addData);
	                
	                if ($updateDetails) {
	                    $data['status'] = 'Success';
	                    $data['msg'] = 'Authentication verified successfully';    
	                }else{
	                    $data['status'] = 'Failure';
	                    $data['msg'] = 'Somthing went to wrong, please contact to administrator';   
	                }	
            	}else{
            		$data['status'] = 'Success';
	                $data['msg'] = 'Authentication verified successfully';    
            	}
    		}else{
    			$data['status'] = 'Failure';
    			$data['msg'] = 'Somthing went to wrong, please contact to administrator';	
    		}
    	}else{
    		$data['status'] = 'Failure';
    		$data['msg'] = "Failure, Please use correct paramaters";
    	}
    	header('Content-type: application/json');
        $callback = '';
        if (isset($_REQUEST['callback'])){
            $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
        }
        $main = json_encode($data);
        echo $callback . ''.$main.'';
        exit;
    }

    function getToken(){
        $total_digits = 25;
        $token = "";
        $digits = "0123456789";
        $digits_length = strlen($digits) - 1;
        for ($i=0; $i < $total_digits; $i++) {
            $token .= $digits[rand(0,$digits_length)];
        }

        $alphabet = "abcdefghijklmnopqrstuvwxyz";
        $alphabet_length = strlen($alphabet) - 1;
        $token .= $alphabet[rand(0,$alphabet_length)];
        return $token;
    }
}
?>
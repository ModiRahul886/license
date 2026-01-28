<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//ini_set('display_errors','on'); version_compare(PHP_VERSION, '5.5.0') <= 0 ? error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED) : error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);   // DEBUGGING
//ini_set('display_errors','on'); error_reporting(E_ALL); // STRICT DEVELOPMENT
class User extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/user_model', '', TRUE);
        $this->load->model('admin/country_model', '', TRUE);
        $this->load->model('admin/state_model', '', TRUE);
        if (!isset($this->session->userdata['license_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
        $this->smarty->assign("data", $this->data);
    }
    
    //load user listing
    function index() {
        $this->data['menuAction'] = 'manageUser';
        $this->data['userlist'] = $this->user_model->getAllUserList();
        $this->data['tpl_name'] = "admin/user/view_user.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Users', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }
    
    //create user
    function create() {
        $this->data['menuAction'] = 'manageUser';
        $eStatuses = field_enums('users', 'eStatus');
        $eRole = field_enums('users', 'eRole');
        $eGender = field_enums('users', 'eGender');
        $this->data['action'] = 'create';
        $this->data['label'] = 'Add';
        if ($this->input->post()) {
            $user = $this->input->post();
            $user['iMobileNo'] = $this->input->post('iMobileNo');
            $user['vPassword'] = encrypt($this->input->post('vPassword'));
            if ($this->input->post('dBirthDate')) {
                $user['dBirthDate'] = date('Y-m-d',strtotime($this->input->post('dBirthDate')));
            }
            $user['dCreatedDate'] = date('Y-m-d');
            $user['vHashCode'] = random_string();
            $user['eStatus'] = 'Active';
            //echo"<pre>";print_r($user);exit;
            $iUserId = $this->user_model->add_user($user);
            
            if ($_FILES['vProfilePicture']['name'] != '') {
                $size = array();
                $user['vProfilePicture'] = $_FILES['vProfilePicture']['name'];
                $image_uploaded = $this->do_upload_img($iUserId, 'user', 'vProfilePicture', $size);
                $user['vProfilePicture'] = $image_uploaded;
                $user['iUserId'] = $iUserId;
                $user['imagetype'] = 'withouturl';

                $userId = $this->user_model->edit_user($user);
            }
            $user['iUserId'] = $iUserId;
            $user['vPromotionCode'] = 'HAP'.str_pad($iUserId, 3, "0", STR_PAD_LEFT);
            //echo "<pre>"; print_r($user);exit;
            $iUserId = $this->user_model->edit_user($user);
            $this->session->set_flashdata('message', "User added successfully");
            redirect($this->data['admin_url'] . 'user');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Users', $this->data['admin_url'] . "user");
        $this->breadcrumb->add('Add User', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/user/add_edit_user.tpl";
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('eRole', $eRole);
        $this->smarty->assign('eGender', $eGender);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }
    
    //update user
    function update() {
        $this->data['menuAction'] = 'manageUser';
        $this->data['action'] = 'update';
        $this->data['label'] = 'Edit';
        $eStatuses = field_enums('users', 'eStatus');
        $eRole = field_enums('users', 'eRole');
        $eGender = field_enums('users', 'eGender');
        $iUserId = $this->uri->segment(4);
        $user_info = $this->user_model->get_user_details($iUserId);
        $user_info['iMobileNo'] = $user_info['iMobileNo'];
        if($user_info['vProfilePicture']){
            $user_info['image_name'] = $user_info['vProfilePicture']; 
        }else{
            $user_info['image_name'] = "No_image_available.jpg";
        }
        if ($user_info['imagetype'] == 'withurl') {
            $user_info['vProfilePicture'] = $user_info['vProfilePicture'];
        }elseif ($user_info['imagetype'] == 'withouturl') {
            $file = $this->config->item('base_path').'uploads/user/'.$user_info['iUserId'].'/'.$user_info['vProfilePicture'];
            if ($user_info['vProfilePicture']) {
               if(file_exists($file)) {
                   $user_info['vProfilePicture'] = $this->config->item('base_url').'uploads/user/'.$user_info['iUserId'].'/'.$user_info['vProfilePicture']; 
                }else{
                    $user_info['vProfilePicture'] = "";
                } 
            }else{
                    $user_info['vProfilePicture'] = "";
            }
        }else{
            $user_info['vProfilePicture'] = "";
        }

        $this->data['user_detail'] = $user_info;
        // /echo "<pre>";print_r($this->data['user_detail']);exit;
        $this->data['user']['vPassword'] = $this->decrypt($this->data['user']['vPassword']);
        
        if ($this->input->post()) {
            
            $user = $this->input->post();
            $user['dBirthDate'] = date('Y-m-d',strtotime($this->input->post('dBirthDate')));
            $user['dModifiedDate'] = date('Y-m-d');
            $user['iMobileNo'] = $this->input->post('iMobileNo');
            if ($_FILES['vProfilePicture']['name'] != '') {
                $iUserId = $this->input->post('iUserId');
                $size = array();
                $user['vProfilePicture'] = $_FILES['vProfilePicture']['name'];
                $image_uploaded = $this->do_upload_img($iUserId, 'user', 'vProfilePicture', $size);
                $user['vProfilePicture'] = $image_uploaded;
                $user['imagetype'] = 'withouturl';
               
            }

            $iUserId = $this->user_model->edit_user($user);
           
            $this->session->set_flashdata('message', "User updated successfully");
            redirect($this->data['admin_url'] . 'user');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Users', $this->data['admin_url'] . "user");
        $this->breadcrumb->add('Edit User', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/user/edit_user.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('iUserId', $iUserId);
        $this->smarty->assign('eRole', $eRole);
        $this->smarty->assign('eGender', $eGender);
        $this->smarty->view('admin/admin-template.tpl');
    }



    function checkEmailExist(){
        $iUserId=$this->uri->segment(4);
        $oldUserEmail=$this->user_model->getUserEmailDetailsByUserId($iUserId);
        if ($oldUserEmail['vEmail'] == $this->input->post('vEmail')) {
           
             echo json_encode(array('valid' => true,));  
        }
        else{
            $chekemailfromUser=$this->user_model->checkEmailExistFromUser($this->input->post('vEmail'));
            $chekemailfromAdmin=$this->user_model->checkEmailExistFromAdmin($this->input->post('vEmail'));
            
            if($chekemailfromUser =='YES' || $chekemailfromAdmin == 'YES'){
                echo json_encode(array('valid' => false,));  
            }
            else{ 
                echo json_encode(array('valid' => true,));    
            }
        }  
    }

    //update status
    function action_update() {
        $ids = $this->input->post('iId');
        $action = $this->input->post('action');
        $tableData['tablename'] = 'users';
        $tableData['update_field'] = 'iUserId';
        $tableData['image_field'] = 'vProfilePicture';
        $tableData['folder_name'] = 'users';
        $count = $this->update_status($ids, $action, $tableData);
        if ($action == 'Delete') {
            $count = count($ids);
        } else {
            $count = $count;
        }
        if ($action == 'Delete') {
            $this->session->set_flashdata('message', "Total  ($count) " . $recordtitle . " Deleted Successfully");
        } else {
            $this->session->set_flashdata('message', "Total  ($count) " . $recordtitle . " Updated Successfully");
        }
        redirect($this->data['admin_url'] . 'user');
    }
    // get all states
    function get_all_states() {
        $iUserId = $this->uri->segment(4);
        $states = $this->user_model->get_states($iUserId);
        $options = '';
        if (count($states) > 0) {
            $options.= '<option value="">-- Select State--</option>';
            for ($i = 0;$i < count($states);$i++) {
                $options.= '<option value="' . $states[$i]['iStateId'] . '">' . $states[$i]['vState'] . '</option>';
            }
        } else {
            $options.= '<option value="">-- Select State--</option>';
        }
        $json_lang = json_encode($options);
        print $json_lang;
        exit;
    }
    //delete images
    function deleteicon() {
        $upload_path = $this->config->item('base_path');
        $iUserId = $this->input->get('id');
        $crop_imag = array();
        $crop_imag['image1'] = '160X180_';
        $crop_imag['image2'] = '42X37_';
        $tableData['tablename'] = 'user';
        $tableData['update_field'] = 'iUserId';
        $tableData['image_field'] = 'vProfileImage';
        $tableData['crop_image'] = $crop_imag;
        $tableData['folder_name'] = 'user';
        $tableData['field_id'] = $iUserId;
        $deleteImage = $this->delete_images($tableData);
        redirect($this->data['admin_url'] . 'user/update/' . $iUserId);
    }

    function deleteimage(){
        $this->data['menuAction'] = 'User';
        $upload_path = $this->data['base_path'];
        $iUserId=$this->uri->segment(4);
        $tPlaydeleteimage=$this->uri->segment(5);
        $tdeletetype=$this->uri->segment(6);
        //print_r($iUserId . $tPlaydeleteimage . $tdeletetype);exit;
        $tableData['tablename']='users';
        $tableData['update_field']='iUserId';
        $tableData['image_field']=$tdeletetype;
        $tableData['folder_name']='user';
        $tableData['field_id']=$iUserId;        
        $deleteImage=$this->delete_images($tableData);
        redirect($this->data['admin_url'].'/user/update/'.$iUserId);
    }

    function deletewithurlimage(){
        $this->data['menuAction'] = 'User';
        $upload_path = $this->data['base_path'];
        $iUserId=$this->uri->segment(4);
        $tdeletetype=$this->uri->segment(5);
        $tableData['tablename']='users';
        $tableData['update_field']='iUserId';
        $tableData['image_field']=$tdeletetype;
        $tableData['folder_name']='user';
        $tableData['field_id']=$iUserId;       
        $deleteuserimage = $this->common_model->delete_images($tableData);
        $updatetablefiels['tablename']='users';
        $updatetablefiels['image_type'] = 'imagetype';
        $updatetablefiels['update_field'] = 'iUserId';
        $updatetablefiels['field_id'] = $iUserId;
        $changeimagetype = $this->common_model->update_imagetype($updatetablefiels);
        redirect($this->data['admin_url'].'/user/update/'.$iUserId);
    }
   
    function check_username() {
        $email = $this->input->get('email');
        $db_user_email = $this->input->get('db_user_email');
        if ($db_user_email == $email) {
            echo "sucess";
        } else {
            $getUserDetail = $this->user_model->getuser_by_mail($email);
            if (count($getUserDetail) > 0) {
                echo "exitst";
                exit;
            } else {
                echo "sucess";
                exit;
            }
        }
    }
    
    // get all cities
    function get_all_cities() {
        $iStateId = $this->input->get('iStateId');
        $iCountryId = $this->input->get('iCountryId');
        $states = $this->user_model->get_cities($iCountryId, $iStateId);
        $options = '';
        if (count($states) > 0) {
            $options.= '<option value="">-- Select city--</option>';
            for ($i = 0;$i < count($states);$i++) {
                $options.= '<option value="' . $states[$i]['iCityId'] . '">' . $states[$i]['vCity'] . '</option>';
            }
        } else {
            $options.= '<option value="">-- Select city--</option>';
        }
        $json_lang = json_encode($options);
        print $json_lang;
        exit;
    }

    function exportToExcel(){
        $allUsers = $this->user_model->getAllExportUsers();
        $this->data['menuAction'] = 'User';
        
        /*echo "<pre>";print_r($allUsers);exit;*/
        $acticodestr =array();
        for($i=0;$i<count($allUsers);$i++){
            $acticodestr[$i]['Name'] = $allUsers[$i]['vFirstName'].' '.$allUsers[$i]['vLastName'];
            $acticodestr[$i]['Email']=$allUsers[$i]['vEmail'];
            $acticodestr[$i]['Contact Number']=$allUsers[$i]['iMobileNo'];
            $acticodestr[$i]['Date Of Birth']=$allUsers[$i]['dBirthDate'];
            $acticodestr[$i]['Gender']=$allUsers[$i]['eGender'];
            $acticodestr[$i]['Join Date']=$allUsers[$i]['dCreatedDate'];
            $acticodestr[$i]['User Type']=$allUsers[$i]['eRole'];
            $acticodestr[$i]['Status']=$allUsers[$i]['eStatus'];
        }
        $date=date('Ymd');
        $filename='Users_List_'.$date.'.xls';
        // For excel
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        
        $flag = false;
        if(count($acticodestr) > 0){
            foreach($acticodestr as $row) {
                if(!$flag) {
                    // display field/column names as first row
                    echo implode("\t", array_keys($row)) . "\r\n";
                    $flag = true;
                }
                array_walk($row, 'cleanData');
                echo implode("\t", array_values($row)) . "\r\n";
            }
        }
        //redirect($this->data['admin_url'].'admin/users');
        exit;
    }

    function licenseassign(){
        $iUserId = $this->uri->segment(4);
        $this->data['action'] = 'savelicenseassign';
        $this->data['menuAction'] = 'manageUser';
        $this->data['allLicense'] = $this->user_model->notassignedLicense();
        //allLicense'] 
        $this->data['tpl_name'] = "admin/user/license-assign.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
        $this->smarty->assign('iUserId', $iUserId);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }

    function savelicenseassign(){
        if ($this->input->post()) {
            $user = $this->input->post();
            $licenseData['userid'] = $this->input->post('iUserId');
            $licenseData['licenseid'] = $this->input->post('ilicenseId');
            $licenseData['assigned_date'] = date('Y-m-d');
            $iUserId = $this->user_model->licenseAssigned($licenseData);
            
            $this->session->set_flashdata('message', "License Assigned successfully");
            redirect($this->data['admin_url'] . 'user');
            exit;
        }
    }

    
    function delete_images($tableData){
        $upload_path =$this->data['base_path'];
        $data= $this->common_model->get_image_details($tableData['field_id'],$tableData);
        $var=unlink($upload_path.'uploads/'.$tableData['folder_name'].'/'.$tableData['field_id'].'/'.$data[$tableData['image_field']]);
    
        $crop_image=$tableData['crop_image'];
       
        if(count($crop_image)>0){
            foreach($crop_image as $value){
                if($value!=''){           
                    $delete_cropimage=unlink($upload_path.'uploads/'.$tableData['folder_name'].'/'.$tableData['field_id'].'/'.$value.$data[$tableData['image_field']]);
                }
            }
       }       
        $var1 = $this->common_model->delete_images($tableData);
        return  $var1;      
    }

    function get_state()
    {
    	$iCountryId = $_REQUEST['id'];
        $state_detail = $this->state_model->get_allstates($iCountryId);
        echo json_encode($state_detail);
    }

}
?>
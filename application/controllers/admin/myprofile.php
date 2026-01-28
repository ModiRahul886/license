<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class myprofile extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/myprofile_model', '', TRUE);
        if (!isset($this->session->userdata['ridein_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
        $this->smarty->assign("data", $this->data);
    }
    //load myprofile data
    function index() {
        $eStatuses = field_enums('client', 'eStatus');
        $iAdminId = $this->session->userdata['ridein_admin_info']['iAdminId'];
        $this->data['user'] = $this->myprofile_model->get_user_details($iAdminId);
        // echo '<pre>';print_r($this->data['user']);exit();
        if ($this->input->post()) {
            $user = $this->input->post('data');
            /*
            if($_FILES['vProfileImage']['name']!=''){
            $size=array();
            $size['height']=180;
            $size['width']=160;
            $size['height2']=37;
            $size['width2']=42;
            $user['vProfileImage']=$_FILES['vProfileImage']['name'];
            $image_uploaded =$this->do_upload_img($iUserId,'user','vProfileImage',$size);
            $user['vProfileImage'] = $image_uploaded ;
            $user['iUserId'] = $iUserId;
            }
            
            $iStateId=$user[iStateId];
            $state = $this->myprofile_model->get_states_code($iStateId);
            $iCountryId=$user[iCountryId];
            $country = $this->myprofile_model->get_country_code($iCountryId);
            */
            $iAdminId = $this->myprofile_model->edit_user($user);
            $this->session->set_flashdata('message', "My Profile Updated Successfully");
            redirect($this->data['admin_url']);
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('Edit MyProfile', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $countries = $this->myprofile_model->get_country();
        $this->data['all_country'] = $countries;
        $state = $this->myprofile_model->get_allstates_bycountry($this->data['user']['iCountryId']);
        $this->data['all_state'] = $state;
        $this->data['tpl_name'] = "admin/myprofile/edit-profile.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('eRoles', $eRoles);
        $this->smarty->view('admin/admin_template.tpl');
    }
    //get all sates
    function get_all_states() {
        $iCountryId = $this->uri->segment(4);
        $states = $this->myprofile_model->get_states($iCountryId);
        $options = '';
        if (count($states) > 0) {
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
    //delete image
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
        $deleteImage = $this->delete_image($tableData);
        redirect($this->data['admin_url'] . 'myprofile/');
    }
    function check_username() {
        $email = $this->input->get('email');
        $db_user_email = $this->input->get('db_user_email');
        if ($db_user_email == $email) {
            echo "sucess";
        } else {
            $getUserDetail = $this->myprofile_model->getuser_by_mail($email);
            if ($getUserDetail != 0) {
                echo "exitst";
                exit;
            } else {
                echo "sucess";
                exit;
            }
        }
    }
}
/* End of file user.php */
/* Location: ./application/controllers/user.php */
?>
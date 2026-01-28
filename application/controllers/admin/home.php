<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class home extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/home_model', '', TRUE);
      
        if (!isset($this->session->userdata['license_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
        $this->smarty->assign("data", $this->data);
    }
    //load dashboard
    function index() {
        $this->data['menuAction'] = 'Dashboard';
        $license = $this->home_model->todayLicense();
        //echo "<pre>";print_r($license);exit;
        $this->data['todaylicense'] = $license;
        $this->data['countOfUsers'] = $this->home_model->totalRegisterUsers();
        $newUsers = $this->home_model->today_signup_user();
        /*echo "<pre>";
        print_r($newUsers);exit;*/
        $this->data['signupUsers'] = $newUsers;
        //$this->data['pending_food_count'] = $pending_food_count;
        $this->data['paging_message'] = 'No Records Found';
        $this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
        $this->data['tpl_name'] = "admin/home/homes.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }

    function changepassword() {
        $this->breadcrumb->add('Dashboard', $this->data['admin_url']);
        $this->breadcrumb->add('Change Password', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
        $this->data['tpl_name'] = "admin/home/changepassword.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
        if ($this->input->post('vPassword')) {
            $new_password = $this->input->post('vPassword');
            $user['vPassword'] = encrypt($this->input->post('vPassword'));
            $user['iAdminId'] = $this->data['license_admin_info']['iAdminId'];
            $this->home_model->change_password($user);
            
            redirect($this->data['admin_url']);
        }
    }
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class emailtemplate extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/emailtemplate_model', '', TRUE);
        if (!isset($this->session->userdata['license_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
        $this->smarty->assign("data", $this->data);
    }
    
    //email templated listing
    function index() {
        $this->data['menuAction'] = 'emailTemplate';
        $this->data['all_emailtemplate'] = $this->emailtemplate_model->get_emailtemplate();
        $this->data['tpl_name'] = "admin/emailtemplate/view-emailtemplate.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Email Template', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
      /*  echo "<pre>";
        print_r($this->data);exit;*/
        $this->smarty->view('admin/admin-template.tpl');
    }
    
    //email templated listing
    function create() {
        $this->data['menuAction'] = 'emailTemplate';
        $eStatuses = field_enums('emailtemplate', 'eStatus');
        $eSendTypes = field_enums('emailtemplate', 'eSendType');
        $this->data['action'] = 'create';
        if ($this->input->post()) {
            $emailtemplate = $this->input->post();
            $iEmailTemplateId = $this->emailtemplate_model->add_emailtemplate($emailtemplate);
            $this->session->set_flashdata('message', "Email Template Added Successfully");
            redirect($this->data['admin_url'] . 'emailtemplate');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Email Template', $this->data['admin_url'] . "emailtemplate");
        $this->breadcrumb->add('Add Email Template', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/emailtemplate/add-edit-emailtemplate.tpl";
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('eSendTypes', $eSendTypes);
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }
    
    //update email template data.
    function update() {
        $this->data['menuAction'] = 'emailTemplate';
        $eStatuses = field_enums('emailtemplate', 'eStatus');
        $eSendTypes = field_enums('emailtemplate', 'eSendType');
        $iEmailTemplateId = $this->uri->segment(4);
        $this->data['action'] = 'update';
        $this->data['all_emailtemplate'] = $this->emailtemplate_model->get_emailtemplate_details($iEmailTemplateId);
        if ($this->input->post()) {
            $emailtemplate = $this->input->post();
            /*echo "<pre>";print_r($emailtemplate);exit();*/
            $iEmailTemplateId = $this->emailtemplate_model->edit_emailtemplate($emailtemplate);
            $this->session->set_flashdata('message', "Email Template Updated Successfully");
            redirect($this->data['admin_url'] . 'emailtemplate');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Email Template', $this->data['admin_url'] . "emailtemplate");
        $this->breadcrumb->add('Edit Email Template', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/emailtemplate/add-edit-emailtemplate.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('eSendTypes', $eSendTypes);
        $this->smarty->view('admin/admin-template.tpl');
    }
    
    //update template status
    function action_update() {
        $ids = $this->input->post('iId');
        $action = $this->input->post('action');
        /*print_r($ids);
        print_r($action);exit;*/
        $tableData['tablename'] = 'emailtemplate';
        $tableData['update_field'] = 'iEmailTemplateId';
        if ($action == 'Delete') {
            $count = count($ids);
            $countId = $this->update_status($ids, $action, $tableData);
            $recordtitle = '';
            if ($count >1) {
                $recordtitle = 'Records';
            } else {
                $recordtitle = 'Record';
            }
            $this->session->set_flashdata('message', "Total  ($count) " . $recordtitle . " Deleted Successfully");
        } else {
            $count = $this->update_status($ids, $action, $tableData);
            $recordtitle = '';
            if ($count >1) {
                $recordtitle = 'Records';
            } else {
                $recordtitle = 'Record';
            }
            $this->session->set_flashdata('message', "Total  ($count) " . $recordtitle . " Updated Successfully");
        }
        redirect($this->data['admin_url'] . 'emailtemplate');
    }
}
/* End of file emailtemplate.php */
/* Location: ./application/controllers/emailtemplate.php */
?>
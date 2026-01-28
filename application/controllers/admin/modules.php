<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modules extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('admin/modules_model', '', TRUE);
		$this->load->model('common_model','', TRUE);
		
		$this->smarty->assign("data", $this->data);
		if (!isset($this->session->userdata['license_admin_info'])) {
			redirect($this->data['admin_url'] . 'authentication');
			exit;
		}
	}
	
	function index() {
		$this->data['menuAction'] = 'manageBar';
		$this->data['module_detail'] = $this->modules_model->getAllmodulesDetail();
		//echo "<pre>";print_r($this->data['license_detail']);exit;
		$this->data['tpl_name'] = "admin/modules/view_modules.tpl";
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
		$this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
		$this->breadcrumb->add('View Modules', '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();
		
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('admin/admin-template.tpl');
	}

	function action_update() {
		$ids = $this->input->post('iId');
		$action = $this->input->post('action');
		$tableData['tablename'] = 'modules';
		$tableData['update_field'] = 'imodulesId';
		$count = $this->update_status($ids, $action, $tableData);
		if ($action == 'Delete') {
			$count = count($ids);
		} else {
			$count = $count;
		}
		$recordtitle = '';
		if ($count > 1) {
			$recordtitle = 'Records';
		} else {
			$recordtitle = 'Record';
		}
		if ($action == 'Delete') {
			$this->session->set_flashdata('message', "Total  ($count) " . $recordtitle . " Deleted Successfully");
		} else {
			$this->session->set_flashdata('message', "Total  ($count) " . $recordtitle . " Updated Successfully");
		}
		redirect($this->data['admin_url'] . 'modules');
	}

	function create() {
		$this->data['menuAction'] = 'manageBar';
		$eStatuses = field_enums('modules', 'eStatus');
		$users = $this->modules_model->getAllUsers();
		
		$this->data['action'] = 'create';
		$this->data['label'] = 'Add';
		if ($this->input->post()) {
			$modules_detail['modules'] = $this->input->post('modules');
			$modules_detail['modulesname'] = $this->input->post('modulesname');
			$modules_detail['eStatus'] = $this->input->post('eStatus');
			
			$this->modules_model->add_modules($modules_detail);

			$this->session->set_flashdata('message', "Modules Added Successfully");
			redirect($this->data['admin_url'] . 'modules');
			exit;
		}
		$this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
		$this->breadcrumb->add('View Modules', $this->data['admin_url'] . "modules");
		$this->breadcrumb->add('Add Modules', '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();
		$this->data['tpl_name'] = "admin/modules/add_edit_modules.tpl";
		$this->smarty->assign('data', $this->data);
		$this->smarty->assign('barOweners', $users);
		$this->smarty->view('admin/admin-template.tpl');
	}
	
	function update() {
		$this->data['menuAction'] = 'manageBar';
		$users = $this->modules_model->getAllUsers();
		$this->data['action'] = 'update';
		$this->data['label'] = 'Edit';
		$imodulesId = $this->uri->segment(4);
		$this->data['modules_detail'] = $this->modules_model->getBarOwnerDetails($imodulesId);
		
		if ($this->input->post()) {
			$moduleDetail['imodulesId'] = $this->input->post('imodulesId');
			$moduleDetail['modules'] = $this->input->post('modules');
			$moduleDetail['modulesname'] = $this->input->post('modulesname');
			$moduleDetail['eStatus'] = $this->input->post('eStatus');

			$iBarId = $this->modules_model->edit_barDetail($moduleDetail);
			
			$this->session->set_flashdata('message', "Modules Details Updated Successfully");
			redirect($this->data['admin_url'] . 'modules');
			exit;
		}
		$this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
		$this->breadcrumb->add('View Modules', $this->data['admin_url'] . "modules");
		$this->breadcrumb->add('Edit Modules', '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();
		$this->data['tpl_name'] = "admin/modules/add_edit_modules.tpl";
		$this->smarty->assign('data', $this->data);
		$this->smarty->assign('barOweners', $users);
		$this->smarty->view('admin/admin-template.tpl');
	}
}
?>
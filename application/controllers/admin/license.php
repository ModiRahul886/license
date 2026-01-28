<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class License extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('admin/license_model', '', TRUE);
		$this->load->model('common_model','', TRUE);
		
		$this->smarty->assign("data", $this->data);
		if (!isset($this->session->userdata['license_admin_info'])) {
			redirect($this->data['admin_url'] . 'authentication');
			exit;
		}
	}
	
	function index() {
		$this->data['menuAction'] = 'manageBar';
		$this->data['license_detail'] = $this->license_model->getAllLicenseDetail();
		//echo "<pre>";print_r($this->data['license_detail']);exit;
		$this->data['tpl_name'] = "admin/license/view_license.tpl";
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
		$this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
		$this->breadcrumb->add('View License', '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();
		
		$this->smarty->assign('data', $this->data);
		$this->smarty->view('admin/admin-template.tpl');
	}

	function action_update() {
		$ids = $this->input->post('iId');
		$action = $this->input->post('action');
		$tableData['tablename'] = 'license';
		$tableData['update_field'] = 'ilicenseId';
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
		redirect($this->data['admin_url'] . 'license');
	}

	function create() {
		$this->data['menuAction'] = 'manageBar';
		$eStatuses = field_enums('license', 'eStatus');
		$users = $this->license_model->getAllUsers();
		$modules = $this->license_model->getAllModules();
		//echo "<pre>";print_r($modules);exit;
		$this->data['action'] = 'create';
		$this->data['label'] = 'Add';
		if ($this->input->post()) {
			
			$bar_detail = $this->input->post();
			$preFix = strtoupper($this->input->post('prefixcode'));
			$license = new KeyLicense($preFix, 'AA99-9A9A-A9A9-99AA', 'upper', 1); // prefix, template (A => letters, 9 => numbers), case of letters (upper, lower), number of keys
			$license_detail['licensename'] = $this->input->post('licensename');
			$license_detail['modulesid'] = $this->input->post('modulesid');
			$modules = $this->license_model->getModulesById($this->input->post('modulesid'));
			$license_detail['modulesname'] = $modules['modules'];
			$license_detail['license_key'] = $license->generate(); // prints 5 license keys with defined parameters
			$license_detail['prefix_code'] = $preFix;
			$license_detail['license_active_date'] = date('Y-m-d',strtotime($this->input->post('license_active_date')));
			$license_detail['license_expire_date'] = date('Y-m-d',strtotime($this->input->post('license_expire_date')));
			$license_detail['created_date'] = date('Y-m-d');
	    	
			$iBarId = $this->license_model->add_license($license_detail);

			$this->session->set_flashdata('message', "License Added Successfully");
			redirect($this->data['admin_url'] . 'license');
			exit;
		}
		$this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
		$this->breadcrumb->add('View License', $this->data['admin_url'] . "license");
		$this->breadcrumb->add('Add License', '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();
		$this->data['tpl_name'] = "admin/license/add_edit_license.tpl";
		$this->smarty->assign('data', $this->data);
		$this->smarty->assign('barOweners', $users);
		$this->smarty->assign('modules', $modules);
		$this->smarty->assign('allOffer', $allOffer);
		$this->smarty->assign('eStatuses', $eStatuses);
		$this->smarty->assign('eFeatured', $eFeatured);
		$this->smarty->assign('eDesignation', $eDesignation);
		$this->smarty->assign('eDiscountType', $eDiscountType);
		$this->smarty->assign('eType', $eType);
		$this->smarty->assign('eFoodCategory', $eFoodCategory);
		$this->smarty->view('admin/admin-template.tpl');
	}
	
	function update() {
		$this->data['menuAction'] = 'manageBar';
		$users = $this->license_model->getAllUsers();
		$this->data['action'] = 'update';
		$this->data['label'] = 'Edit';
		$ilicenseId = $this->uri->segment(4);
		$this->data['license_detail'] = $this->license_model->getBarOwnerDetails($ilicenseId);
		$modules = $this->license_model->getAllModules();
		
		if ($this->input->post()) {
			$post_detail = $this->input->post();
			
			$licenseDetail['ilicenseId'] = $this->input->post('ilicenseId');
			$licenseDetail['licensename'] = $this->input->post('licensename');
			$license_detail['modulesid'] = $this->input->post('modulesid');
			$modules = $this->license_model->getModulesById($this->input->post('modulesid'));
			$license_detail['modulesname'] = $modules['modules'];
			$licenseDetail['license_key'] = $this->input->post('license_key');
			$licenseDetail['prefix_code'] = $this->input->post('prefixcode');
			$licenseDetail['license_active_date'] = $this->input->post('license_active_date');
			$licenseDetail['license_expire_date'] = $this->input->post('license_expire_date');
			$licenseDetail['eStatus'] = $this->input->post('eStatus');

            $iBarId = $this->license_model->edit_barDetail($licenseDetail);
			
			$this->session->set_flashdata('message', "License Details Updated Successfully");
			redirect($this->data['admin_url'] . 'license');
			exit;
		}
		$this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
		$this->breadcrumb->add('View License', $this->data['admin_url'] . "bar");
		$this->breadcrumb->add('Edit License', '');
		$this->data['breadcrumb'] = $this->breadcrumb->output();
		$this->data['tpl_name'] = "admin/license/add_edit_license.tpl";
		$this->smarty->assign('data', $this->data);
		$this->smarty->assign('modules', $modules);
		$this->smarty->assign('barOweners', $users);
		$this->smarty->view('admin/admin-template.tpl');
	}

    function exportToExcel(){
        $allMerchants = $this->bar_model->getAllExportMerchants();
        
        $acticodestr =array();
        for($i=0;$i<count($allMerchants);$i++){
        	$acticodestr[$i]['Hotel Name'] = $allMerchants[$i]['vBarName'];
            $acticodestr[$i]['Hotel Owner Name'] = $allMerchants[$i]['vFirstName'].' '.$allMerchants[$i]['vLastName'];
            /*$acticodestr[$i]['About Bar'] = $allMerchants[$i]['tAboutBar'];
            $acticodestr[$i]['Atmosphere'] = $allMerchants[$i]['vAtmosphere'];
            $acticodestr[$i]['Facilities'] = $allMerchants[$i]['vFacilities'];
            $acticodestr[$i]['Language'] = $allMerchants[$i]['vLanguage'];
            $acticodestr[$i]['Highlight'] = $allMerchants[$i]['tHighlight'];*/

            $acticodestr[$i]['Opening Hour Monday - Sunday'] = $allMerchants[$i]['opening_hours'].' - '.$allMerchants[$i]['closing_hours'];
            
            $acticodestr[$i]['Address'] = $allMerchants[$i]['tAddress'];
            $acticodestr[$i]['Featured'] = $allMerchants[$i]['eFeatured'];

            $acticodestr[$i]['Merchant Code'] = $allMerchants[$i]['vRedeemCode'];
            $acticodestr[$i]['Discount'] = $allMerchants[$i]['fDiscount'];
            $acticodestr[$i]['Discount Type'] = $allMerchants[$i]['eDiscountType'];
            /*$acticodestr[$i]['Active Date'] = $allMerchants[$i]['dActiveDate'];
            $acticodestr[$i]['Expiry Date'] = $allMerchants[$i]['dExpiryDate'];*/
            $acticodestr[$i]['Status'] = $allMerchants[$i]['eStatus'];
        }
        $date=date('Ymd');
        $filename='Merchants_List_'.$date.'.xls';
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
}
?>
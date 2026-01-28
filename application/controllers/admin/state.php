<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class State extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/state_model', '', TRUE);
        $this->load->model('admin/client_model', '', TRUE);
        if (!isset($this->session->userdata['ridein_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
        $this->smarty->assign("data", $this->data);
    }
    function index() {
        $this->data['tpl_name'] = "admin/state/view-state.tpl";
        $result = $this->state_model->getStateCount();
        if (count($result) > 0) {
            $this->data['Expot_dispalay'] = 1;
        } else {
            $this->data['Expot_dispalay'] = 0;
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->breadcrumb->add('Dashboard', base_url() . 'admin/home');
        $this->breadcrumb->add('View Province', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin_template.tpl');
    }
    function create() {
        $eStatuses = field_enums('state', 'eStatus');
        $country = $this->client_model->get_country();
        $this->data['country'] = $country;
        if ($this->input->post()) {
            $state = $this->input->post('data');
            $statename = ucfirst($state['vState']);
            $state['vState'] = $statename;
            $iStateId = $this->state_model->add_state($state);
            $this->session->set_flashdata('message', "Province Added Successfully");
            redirect($this->data['admin_url'] . 'state');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Province', $this->data['admin_url'] . "state");
        $this->breadcrumb->add('Add Province', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/state/new-state.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('admin/admin_template.tpl');
    }
    function update() {
        $eStatuses = field_enums('state', 'eStatus');
        $iStateId = $this->uri->segment(4);
        $this->data['state'] = $this->state_model->get_state_details($iStateId);
        if ($this->input->post()) {
            $state = $this->input->post('data');
            $statename = ucfirst($state['vState']);
            $state['vState'] = $statename;
            $iStateId = $this->state_model->edit_state($state);
            $this->session->set_flashdata('message', "Province Updated Successfully");
            redirect($this->data['admin_url'] . 'state');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Province', $this->data['admin_url'] . "state");
        $this->breadcrumb->add('Edit Province', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/state/edit-state.tpl";
        $countries = $this->client_model->get_country();
        $this->data['all_country'] = $countries;
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('admin/admin_template.tpl');
    }
    function action_update() {
        $ids = $this->input->post('iId');
        $action = $this->input->post('action');
        $tableData['tablename'] = 'state';
        $tableData['update_field'] = 'iStateId';
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
        redirect($this->data['admin_url'] . 'state');
    }
    function get_state_listing() {
        $all_state = $this->state_model->get_all_state();
        if (count($all_state) > 0) {
            foreach ($all_state as $key => $value) {
                $alldata[$key]['id'] = '<center><input type="checkbox" name="iId[]" id="iId" value="' . $value['iStateId'] . '"></center>';
                $alldata[$key]['statename'] = $value['vState'];
                $alldata[$key]['countryname'] = $value['vCountry'];
                $alldata[$key]['vStatecode'] = $value['vStatecode'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<center><a href="' . $this->data['base_url'] . 'state/update/' . $value['iStateId'] . '"><i class="icon-pen icon2x"></i></a></center>';
            }
            $aData['aaData'] = $alldata;
        } else {
            $aData['aaData'] = '';
        }
        $json_lang = json_encode($aData);
        echo $json_lang;
        exit;
    }
    function check_statename() {
        $Statename = $this->uri->segment(4);
        $statename = ucfirst($Statename);
        $stateexist = $this->state_model->state_exists($statename);
        $name = count($stateexist);
        echo $name;
        exit;
    }
    function check_statecode() {
        $Statecode = $this->uri->segment(4);
        $statecodeexist = $this->state_model->stateCode_exists($Statecode);
        $code = count($statecodeexist);
        echo $code;
        exit;
    }
    function exportcsv() {
        $record = $this->state_model->getAllStateDetails();
        $RiderDeteil = array();
        for ($i = 0;$i < count($record);$i++) {
            $RiderDeteil[$i]['Province Name'] = $record[$i]['vState'];
            $RiderDeteil[$i]['Province Code'] = $record[$i]['vStatecode'];
            $RiderDeteil[$i]['Country Name'] = $record[$i]['vCountry'];
            $RiderDeteil[$i]['Country Code'] = $record[$i]['vCountryCode'];
            $RiderDeteil[$i]['Country ISD Code'] = $record[$i]['vIsdCode'];
        }
        $date = date('Ymd');
        $filename = 'Province_Detail' . $date . '.xls';
        // For excel
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        $flag = false;
        if (count($RiderDeteil) > 0) {
            foreach ($RiderDeteil as $row) {
                if (!$flag) {
                    // display field/column names as first row
                    echo implode("	", array_keys($row)) . "
";
                    $flag = true;
                }
                array_walk($row, 'cleanData');
                echo implode("	", array_values($row)) . "
";
            }
        }
        exit;
    }
}
/* End of file state.php */
/* Location: ./application/controllers/state.php */
?>
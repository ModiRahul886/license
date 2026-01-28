<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class City extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/city_model', '', TRUE);
        $this->load->model('admin/client_model', '', TRUE);
        $this->load->model('admin/state_model', '', TRUE);
        $this->smarty->assign("data", $this->data);
        if (!isset($this->session->userdata['ridein_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
    }
    function index() {
        $this->data['tpl_name'] = "admin/city/view_city.tpl";
        $result = $this->city_model->getCityCount();
        if (count($result) > 0) {
            $this->data['Expot_dispalay'] = 1;
        } else {
            $this->data['Expot_dispalay'] = 0;
        }
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['ridein_admin_info'] = $this->session->userdata['ridein_admin_info'];
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Cities', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin_template.tpl');
    }
    
    function action_update() {
        $ids = $this->input->post('iId');
        $action = $this->input->post('action');
        $tableData['tablename'] = 'city';
        $tableData['update_field'] = 'iCityId';
        $count = $this->update_status($ids, $action, $tableData);
        if ($action == 'City') {
            redirect($this->data['admin_url'] . 'city/getcitynamefromaddress');
        }
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
        redirect($this->data['admin_url'] . 'city');
    }
    function getcitynamefromaddress() {
        $this->data['tpl_name'] = "admin/city/getcitynamefromaddress.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['ridein_admin_info'] = $this->session->userdata['ridein_admin_info'];
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Cities', $this->data['admin_url'] . 'city');
        $this->breadcrumb->add('Get City Name From Address', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin_template.tpl');
    }
    function checkcitynamefromapi() {
        $address = $this->input->get('address');
        $address = urlencode($address);
        $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false";
        $result = file_get_contents("$url");
        $json = json_decode($result);
        if ($json->status == 'OK') {
            foreach ($json->results as $result) {
                foreach ($result->address_components as $addressPart) {
                    $flagcnt = 0;
                    foreach ($addressPart->types as $value) {
                        if ($value == 'locality' || $value == 'political') {
                            $flagcnt++;
                        }
                    }
                    if ($flagcnt == 2) {
                        $city = $addressPart->long_name;
                    }
                }
            }
            $city = mysql_real_escape_string($city);
            echo $city;
            exit;
        } else {
            echo 'error';
            exit;
        }
    }
    

    function create() {
        $eStatuses = field_enums('city', 'eStatus');
        $country = $this->client_model->get_country();
        $this->data['action'] = 'create';
        $this->data['label'] = 'Add';
        if ($this->input->post()) {
            $city = $this->input->post('city');
            $cityname = ucfirst($city['vCity']);
            echo $cityname;
            $city['vCity'] = $cityname;
            $icityId = $this->city_model->add_city($city);
            $this->session->set_flashdata('message', "City Added Successfully");
            redirect($this->data['admin_url'] . 'city');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View City', $this->data['admin_url'] . "city");
        $this->breadcrumb->add('Add City', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/city/city.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('country', $country);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('admin/admin_template.tpl');
    }
    

    function update() {
        $eStatuses = field_enums('city', 'eStatus');
        $country = $this->client_model->get_country();
        $this->data['action'] = 'update';
        $this->data['label'] = 'Edit';
        $icityId = $this->uri->segment(4);
        $this->data['city'] = $this->city_model->get_city_details($icityId);
        $countryid = $this->data['city']['iCountryId'];
        $statename = $this->city_model->get_state($countryid);
        if ($this->input->post()) {
            $city = $this->input->post('city');
            $cityname = ucfirst($city['vCity']);
            $city['vCity'] = $cityname;
            $icityId = $this->city_model->edit_city($city);
            $this->session->set_flashdata('message', "City Updated Successfully");
            redirect($this->data['admin_url'] . 'city');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View city', $this->data['admin_url'] . "city");
        $this->breadcrumb->add('Edit city', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/city/city.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('country', $country);
        $this->smarty->assign('statename', $statename);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('admin/admin_template.tpl');
    }
    
    function get_states() {
        $iCountryId = $this->uri->segment(4);
        $states = $this->state_model->get_allstates($iCountryId);
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
    

    function get_city_listing() {
        $all_city = $this->city_model->get_all_city();
        if (count($all_city) > 0) {
            foreach ($all_city as $key => $value) {
                $alldata[$key]['id'] = '<center><input type="checkbox" name="iId[]" id="iId" value="' . $value['iCityId'] . '"></center>';
                $alldata[$key]['cityname'] = ucfirst($value['vCity']);
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<center><a href="' . $this->data['base_url'] . 'city/update/' . $value['iCityId'] . '"><i class="icon-pen icon2x"></i></a></center>';
            }
            $aData['aaData'] = $alldata;
        } else {
            $aData['aaData'] = '';
        }
        $json_lang = json_encode($aData);
        echo $json_lang;
        exit;
    }
    function check_cityname() {
        $Cityname = $this->uri->segment(4);
        $city = ucfirst($Cityname);
        $cityexist = $this->city_model->city_exists($city);
        $name = count($cityexist);
        echo $name;
        exit;
    }
    function exportcsv() {
        $record = $this->city_model->getAllCityDetails();
        $RiderDeteil = array();
        for ($i = 0;$i < count($record);$i++) {
            $RiderDeteil[$i]['City Name'] = $record[$i]['vCity'];
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
?>
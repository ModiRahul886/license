<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Country extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/country_model', '', TRUE);
        $this->smarty->assign("data", $this->data);
        if (!isset($this->session->userdata['happyhour_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
    }
    /*
     * Create By : Bela Lakhani
     * Created Date : 21-April-2014
     * Modified By :
     * Modified Date :
     * Purpose: Show country
    */
    function index() {
        echo "string";exit;
        $this->data['tpl_name'] = "admin/country/view-country.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['happyhour_admin_info'] = $this->session->userdata['happyhour_admin_info'];
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Country', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin_template.tpl');
    }
    /*
     * Create By : Bela Lakhani
     * Created Date : 21-April-2014
     * Modified By :
     * Modified Date :
     * Purpose: Make country active,inactive
    */
    function action_update() {
        $ids = $this->input->post('iId');
        $action = $this->input->post('action');
        $tableData['tablename'] = 'country';
        $tableData['update_field'] = 'iCountryId';
        $count = $this->update_status($ids, $action, $tableData);
        if ($action == 'Delete') {
            $count = count($ids);
        } else {
            $count = $count;
        }
        if ($action == 'Delete') {
            $this->session->set_flashdata('message', "Total  ($count)  Record Deleted Successfully");
        } else {
            $this->session->set_flashdata('message', "Total  ($count)  Record Updated Successfully");
        }
        redirect($this->data['admin_url'] . 'country');
    }
    /*
     * Create By : Bela Lakhani
     * Created Date : 21-April-2014
     * Modified By :
     * Modified Date :
     * Purpose: create country
    */
    function create() {
        $eStatuses = field_enums('country', 'eStatus');
        if ($this->input->post()) {
            $country = $this->input->post('data');
            $countryname = ucfirst($country['vCountry']);
            $country['vCountry'] = $countryname;
            $iCountryId = $this->country_model->add_country($country);
            $this->session->set_flashdata('message', "Country Added Successfully");
            redirect($this->data['admin_url'] . 'country');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Country', $this->data['admin_url'] . "country");
        $this->breadcrumb->add('Add Country', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/country/new-country.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('admin/admin_template.tpl');
    }
    /*
     * Create By : Bela Lakhani
     * Created Date : 21-April-2014
     * Modified By :
     * Modified Date :
     * Purpose: udpate country
    */
    function update() {
        $eStatuses = field_enums('country', 'eStatus');
        $iCountryId = $this->uri->segment(4);
        $this->data['country'] = $this->country_model->get_country_details($iCountryId);
        if ($this->input->post()) {
            $country = $this->input->post('data');
            $countryname = ucfirst($country['vCountry']);
            $country['vCountry'] = $countryname;
            $iCountryId = $this->country_model->edit_country($country);
            $this->session->set_flashdata('message', "Country Updated Successfully");
            redirect($this->data['admin_url'] . 'country');
            exit;
        }
        $this->breadcrumb->add('Dashboard', $this->data['admin_url'] . 'home');
        $this->breadcrumb->add('View Country', $this->data['admin_url'] . "country");
        $this->breadcrumb->add('Edit Country', '');
        $this->data['breadcrumb'] = $this->breadcrumb->output();
        $this->data['tpl_name'] = "admin/country/edit-country.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->view('admin/admin_template.tpl');
    }
    /*
     * Create By : Bela Lakhani
     * Created Date : 21-April-2014
     * Modified By :
     * Modified Date :
     * Purpose: get coutrylisting
    */
    function get_country_listing() {
        $all_country = $this->country_model->get_all_country();
        //  echo "<pre>";print_r($all_country);
        if (count($all_country) > 0) {
            foreach ($all_country as $key => $value) {
                $alldata[$key]['id'] = '<input type="checkbox" name="iId[]" id="iId" value="' . $value['iCountryId'] . '">';
                $alldata[$key]['countryname'] = $value['vCountry'];
                $alldata[$key]['vCountryCode'] = $value['vCountryCode'];
                $alldata[$key]['vIsdCode'] = $value['vIsdCode'];
                $alldata[$key]['status'] = $value['eStatus'];
                $alldata[$key]['editlink'] = '<a href="' . $this->data['base_url'] . 'country/update/' . $value['iCountryId'] . '"><i class="icon-pen icon2x"></i></a>';
            }
            $aData['aaData'] = $alldata;
        } else {
            $aData['aaData'] = '';
        }
        $json_lang = json_encode($aData);
        echo $json_lang;
        exit;
    }
    function check_countryname() {
        $Countryname = $this->uri->segment(4);
        $countryname = ucfirst($Countryname);
        $countryexist = $this->country_model->country_exists($countryname);
        $name = count($countryexist);
        echo $name;
        exit;
    }
    function check_countrycode() {
        $Countrycode = $this->uri->segment(4);
        $countrycodeexist = $this->country_model->countryCode_exists($Countrycode);
        $code = count($countrycodeexist);
        echo $code;
        exit;
    }
    function check_countryIsdcode() {
        $CountryIsdcode = $this->uri->segment(4);
        $countryIsdcodeexist = $this->country_model->countryISDCode_exists($CountryIsdcode);
        $Isdcode = count($countryIsdcodeexist);
        echo $Isdcode;
        exit;
    }
}
?>
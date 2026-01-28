<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Report extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('admin/report_model', '', TRUE);
        $this->smarty->assign("data", $this->data);
        if (!isset($this->session->userdata['license_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
    }
    
    function index() {
        $this->data['menuAction'] = 'Reports';
        $this->data['AllBarName'] = $this->report_model->getAllBarList();
        
        $this->data['tpl_name'] = "admin/report/view_report.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }
    
    function charts_content(){
        $chartdata=$this->input->post();
        $iBarId = $this->input->post('iBarId');
        if($chartdata['option']=='Month'){
            unset($chartdata['Month']);
        }
        $year=$chartdata['Year'];
        $month=explode('-',$chartdata['Month']);
        if($chartdata['option']=='Day') {
            $no_months_days=$this->days_in_month($month[1],$year);
            $total_actCode=0;
            $total_playlist=0;
            for($i=1;$i<=$no_months_days;$i++){
                $month_day=$year."-".$month[1]."-".$i;
                $month_dayindate=date('Y-m-d',strtotime($month_day));
                
                $total_actCode=$this->report_model->getcount_ActCode_assign($month_dayindate,$iBarId);
                $month_data[]=$total_actCode;
            } 
            $this->data['total']=$no_months_days;   
            $this->data['Final_data']=$month_data;
        }

        if($chartdata['option']=='Month'){
            $total_actCode=0;
            for($i=1;$i<=12;$i++){
                $month_start_day=$year."-".$i."-"."1";
                $month_start_dayindate=date('Y-m-d',strtotime($month_start_day));
                $no_months_days=$this->days_in_month($i,$year);
                $month_end_day=$year."-".$i."-".$no_months_days;
                $month_end_dayindate=date('Y-m-d',strtotime($month_end_day));
                $total_actCode=$this->report_model->getcount_ActCode_assign_holemonth($month_start_dayindate,$month_end_dayindate,$iBarId);
                
                $month_data[]=$total_actCode;
            }
            $this->data['total']=12;    
            $this->data['Final_data']=$month_data;
        }

        if($chartdata['option']=='Week') {
            $str = '';
            $monval = $month[1];
            $yearval =$year;

            $startdate=date($yearval."-".$monval."-01") ;
            $ld= cal_days_in_month(CAL_GREGORIAN, $monval, $yearval);
            $lastday=$yearval.'-'.$monval.'-'.$ld;
            $start_date = date('Y-m-d', strtotime($startdate));
            $end_date = date('Y-m-d', strtotime($lastday));
            $end_date1 = date('Y-m-d', strtotime($lastday." + 6 days"));
            $count_week=0;
            $week_array = array();

            for($date = $start_date; $date <= $end_date1; $date = date('Y-m-d', strtotime($date. ' + 7 days')))
            {
                if($count_week!=0){
                    $start_date = date('Y-m-d', strtotime($start_date." + 1 day"));
                }
                $getarray= $this->getWeekDates($count_week,$date, $start_date, $end_date);
                $week_array[]=$getarray;
                $count_week++;
                if($getarray['week_end_date']==$end_date){
                    break;
                }
            }
            $this->data['total']=$count_week;
            $total_actCode=0;
            $total_playlist=0;
            foreach ($week_array as $key => $value) {
                $total_actCode=$this->report_model->getcount_ActCode_assign_holemonth($value['week_start_date'],$value['week_end_date'],$iBarId);
                $month_data[]=$total_actCode;
            }
            $this->data['Final_data']=$month_data;
        }
        
        $this->data['menuAction'] = 'Reports';
        $this->data['option']=$chartdata['option'];
        $this->data['AllBarName'] = $this->report_model->getAllBarList();
        
        $this->data['tpl_name'] = "admin/report/view_report.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');   
    }

    function days_in_month($month, $year)
    {
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    } 

    function getWeekDates($count_week,$date, $start_date, $end_date)
    {
        $week =  date('W', strtotime($date));
        $year =  date('Y', strtotime($date));

        $from = date("Y-m-d", strtotime("{$year}-W{$week}+1"));
        $from = date('Y-m-d', strtotime($from." - 1 day"));
        
        if($from < $start_date){
            
            $from = $start_date;
        }

        $to = date("Y-m-d", strtotime("{$year}-W{$week}-6")); 
        if($to > $end_date) $to = $end_date;

        $array1 = array(
                "week_start_date" => $from,
                "week_end_date" => $to,
        );
        return $array1;
    }

    function mostBookBar(){
        $this->data['menuAction'] = 'Most_Book';
        $this->data['report_chart_status'] = 'no';
        /*$allBookBar  = $this->report_model->get_all_book_list();
        foreach ($allBookBar as $key => $value) {
            $allBookBar[$key]['vBarName'] = 'Bar';
            $allBookBar[$key]['avg'] = '50.00';
        }
        $this->data['allBookBar'] = $allBookBar;*/
        $this->data['tpl_name'] = "admin/report/view_most_book_bar_report.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }

    function showMostBookBarReport(){
        $this->data['menuAction'] = 'Most_Book';
        $this->data['action']='index';
        $this->data['label']='Index';

        $this->data['message'] = $this->session->flashdata('message');
        $sessiondata = $this->session->userdata('license_admin_info');
            
        $start_date = date('Y-m-d',strtotime($this->input->post('startDate')));
        $end_date = date('Y-m-d',strtotime($this->input->post('endDate')));

        $this->data['startdate'] = date('d-m-Y',strtotime($start_date));
        $this->data['enddate'] = date('d-m-Y',strtotime($end_date));
        $getAllBar = $this->report_model->getAllBarList();
        $this->data['allBars'] = $getAllBar;
        //echo "<pre>"; print_r($this->data['allBars']);
        $allBookBar = $this->report_model->getAllMostBookBarList($start_date,$end_date);
        //echo "<pre>"; print_r($allBookBar);
        $totalBookingBar = count($allBookBar) + 1;
        foreach ($allBookBar as $key => $value) {
            $countTotalBar = $this->report_model->getTotalIndividualBarCount($value['iBarId']);
            $arrayBar[$value['iBarId']] = count($countTotalBar);
            $getBarList[$key]['vBarName'] = $value['vBarName'];
            $getBarList[$key]['avg'] = round($arrayBar[$value['iBarId']] * 100 / $totalBookingBar,2);
        }
        //print_r($getBarList);exit;
        $items_thread = array_unique($getBarList, SORT_REGULAR);
        
        $getAllBarListing = $this->report_model->getAllBarListing($start_date,$end_date);
        //echo"<pre>"; print_r($getAllBarListing);exit;
        foreach ($getAllBarListing as $key => $value) {
            $countBar = $this->report_model->getTotalIndividualBarCount($value['iBarId']);
            $arrayBar[$value['iBarId']] = count($countBar);
            $getAllBarListing[$key]['avg'] = round($arrayBar[$value['iBarId']] * 100 / $totalBookingBar,2);
        }
        if(count($getAllBarListing)==0){
            $this->data['report_chart_status'] = 'no';
        }

        $this->data['allBookBar'] = array_values($items_thread);
        //print_r($this->data['allBookBar']);exit;
        $bookbar = array();
        foreach ($getAllBarListing as $key => $value) {
            $bookbar[$key]['avg'] =$value['avg'];
            $bookbar[$key]['iBarId'] = $value['iBarId'];
            $bookbar[$key]['vBarName'] = $value ['vBarName'];
            $bookbar[$key]['iOwnerId'] = $value['iOwnerId'];
            $bookbar[$key]['vFirstName'] =$value['vFirstName'];
            $bookbar[$key]['vLastName']= $value['vLastName'];
            $bookbar[$key]['vEmail'] = $value['vEmail'];
            $bookbar[$key]['iMobileNo'] =$value['iMobileNo'];
            $bookbar[$key]['eDesignation'] = $value['eDesignation'];
            rsort($bookbar);
        }
        $this->data['mostBookBar'] = $bookbar;
        //echo"<pre>"; print_r($this->data['mostBookBar']); exit;
        $this->data['tpl_name'] = "admin/report/view_most_book_bar_report.tpl";
        //smarty assign variables
        $this->smarty->assign('data',$this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }


    function mostUserBook(){
        $this->data['menuAction'] = 'Most_User';
        $this->data['report_chart_status'] = 'no';
        $this->data['tpl_name'] = "admin/report/view_most_user_book_report.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['license_admin_info'] = $this->session->userdata['license_admin_info'];
        
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }

    function showMostUserReport(){
        $this->data['menuAction'] = 'Most_User';
        $this->data['action']='index';
        $this->data['label']='Index';

        $this->data['message'] = $this->session->flashdata('message');
        $sessiondata = $this->session->userdata('license_admin_info');
            
        $start_date = date('Y-m-d',strtotime($this->input->post('startDate')));
        $end_date = date('Y-m-d',strtotime($this->input->post('endDate')));

        $this->data['startdate'] = date('d-m-Y',strtotime($start_date));
        $this->data['enddate'] = date('d-m-Y',strtotime($end_date));

        $allBookBar = $this->report_model->getAllMostUserList($start_date,$end_date);
        $totalBookingBar = count($allBookBar) + 1;
       
        foreach ($allBookBar as $key => $value) {
            $userarr = $this->report_model->getAllUserList($start_date,$end_date,$value['iUserId']);
            $com =0; $conf = 0; $can = 0;
            foreach ($userarr as $keys => $values) {
                if ($values['vOrderStatus'] == 'Complete') {
                    $getuserList[$key]['complete']= ++$com;
                }elseif ($values['vOrderStatus'] == 'Confirm' || $values['vOrderStatus'] == 'NEW') {
                    $getuserList[$key]['confirm']= ++$conf;
                }elseif ($values['vOrderStatus'] == 'Cancel') {
                   $getuserList[$key]['cancel']    = ++$can; 
                }else{
                    $getuserList[$key]['complete'] = 0;
                    $getuserList[$key]['confirm']= 0;
                    $getuserList[$key]['cancel'] =0;
                }
            }

            //$arrayuser[$value['iUserId']] = count($userarr);
            $getuserList[$key]['vName'] = $value['vFirstName'].' '.$value['vLastName'];
            /*$getuserList[$key]['avg'] = $arrayuser[$value['iUserId']] * 100 / $totalBookingBar;*/
            //$getuserList[$key]['count'] = count($userarr);
            $getuserList[$key]['vEmail'] = $value['vEmail'];
            $getuserList[$key]['iMobileNo'] = $value['iMobileNo'];

        }
        //echo "<pre>"; print_r($getuserList);exit;
       
        $items_thread = array_unique($getuserList, SORT_REGULAR);
        $this->data['allUser'] = array_values($items_thread);
        
        /*$getUserList = $this->report_model->getUserList($start_date,$end_date);
        if(count($getUserList)==0){
            $this->data['report_chart_status'] = 'no';
        }
        $this->data['mostUser'] = $getUserList;*/

        $this->data['tpl_name'] = "admin/report/view_most_user_book_report.tpl";
        //smarty assign variables
        $this->smarty->assign('data',$this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }

}
?>
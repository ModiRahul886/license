<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pushnotification extends Admin_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->model('admin/push_notification_model', '', TRUE);
        $this->smarty->assign("data", $this->data);
        if (!isset($this->session->userdata['happyhour_admin_info'])) {
            redirect($this->data['admin_url'] . 'authentication');
            exit;
        }
    }
    
    function index() {
        $this->data['menuAction'] = 'Pushnotification';
        /*$this->data['messagelist']=$this->push_notification_model->getAllMessages();*/
        $this->data['all_push_notification_text'] = $this->push_notification_model->get_push_notification_text();
        //echo"<pre>";print_r($this->data['all_push_notification_text']);exit;
        $this->data['tpl_name'] = "admin/push_notification/view_pushnotification.tpl";
        $this->data['message'] = $this->session->flashdata('message');
        $this->data['happyhour_admin_info'] = $this->session->userdata['happyhour_admin_info'];
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }
    
    function action_update() {
        $this->data['menuAction'] = 'Administrator';
        $ids = $this->input->post('iId');
        $action = $this->input->post('action');
        $tableData['tablename'] = 'admin';
        $tableData['update_field'] = 'iAdminId';
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
        redirect($this->data['admin_url'] . 'admin_management');
    }

    function create() {
        $this->data['menuAction'] = 'Pushnotification';
        $all_users = $this->push_notification_model->getAllUsers();
        /*echo "<pre>";print_r($allUser);exit;*/
        $this->data['action'] = 'create';
        $this->data['label'] = 'Add';
        if ($this->input->post()) {
            $pushNotificationDetail = $this->input->post();
            //print_r($pushNotificationDetail);exit;
            $pushNotification['tText'] = $pushNotificationDetail['tMessage'];
            $iPushNotificationId = $this->push_notification_model->add_pushNotification($pushNotification);
           
            $databrandusers['iPushNotificationId'] = $iPushNotificationId;
            // end of code for save record

            $all_users = $this->input->post('user');
            foreach ($all_users as $value) {
                $device_details = $this->push_notification_model->get_device_details($value);
                $pushNotificationData['action'] = 'sendNotification';
                $pushNotificationData['msg'] = $pushNotification['tText'];
                $pushNotificationData['vDeviceid'] = $device_details['device_id'];
                $pushNotificationData['certificatetype'] = "development";
                $datapush = $this->pushNotification($pushNotificationData);
                $databrandusers['iUserId'] = $value;
                 $iPushNotificationId = $this->push_notification_model->add_pushNotificationUser($databrandusers);
            }
            redirect($this->data['admin_url'].'pushnotification');
            exit;
            
        }

        $mainstr = "<tr>";
        for($i=0;$i<count($all_users);$i++){
                $all_users[$i]['vFullname'] = $all_users[$i]['vFirstName'].' '.$all_users[$i]['vLastName'];
            if(($i%3==0) && ($i!==0)){
                $mainstr = $mainstr."</tr><tr><td width=2%><input type='checkbox' name='user[]' value='".$all_users[$i]['iUserId']."'></td><td width=31%><lable>".$all_users[$i]['vFullname']."</lable></td>";
            }
            else {
                $mainstr = $mainstr."<td width=2%><input type='checkbox' name='user[]' value='".$all_users[$i]['iUserId']."'></td><td width=31%><lable>".$all_users[$i]['vFullname']."</lable></td>";
            }
        }
        $mainstr = $mainstr."</tr>";
        $this->data['all_records'] = $mainstr;
        $this->data['allUser'] = $all_users;
       // print_r($this->data['all_records']);exit;
        
        $this->data['tpl_name'] = "admin/push_notification/send_pushnotification.tpl";
        $this->smarty->assign('data', $this->data);
        $this->smarty->assign('eStatuses', $eStatuses);
        $this->smarty->assign('eRole', $eRole);
        $this->smarty->view('admin/admin-template.tpl');
    }

    // puch notifications
    function pushNotification($data){
        $url = 'http://happyhour.coderspreview.com/pushnotification/webservice.php';
        $data['project'] = 'HAPPYHOUR';
        
        $fields_string = '';
        foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        $fields_string = rtrim($fields_string,'&');
        
        $ch = curl_init();
        
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,count($data));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
        
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result,true);
    }

    function view()
    {
        $iPushNotificationId = $this->uri->segment('4');
        $this->data['menuAction'] = 'Pushnotification';
        $sessiondata = $this->session->userdata('happyhour_admin_info');
        /*$this->data['loginuser_photos'] = $this->brand_model->get_admin_photos($sessiondata['iAdminId']);*/
        $this->data['all_notification_user'] = $this->push_notification_model->get_all_notofication_users($iPushNotificationId);

        $this->data['loginuser'] = $sessiondata['vFirstName'].' '.$sessiondata['vLastName'];
        $this->data['loginuser_adminid'] = $sessiondata['iAdminId'];

        $this->data['tpl_name'] = "admin/push_notification/pushnotification.tpl";
        $this->data['logindata'] = $logindetails;
        //smarty assign variables
        $this->smarty->assign('data', $this->data);
        $this->smarty->view('admin/admin-template.tpl');
    }
}
?>
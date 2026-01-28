<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class client_report_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function getTripDatails($iClientId) {
        $this->db->select('t.*,c.vFirstName,c.vLastName');
        $this->db->from('trip_detail as t');
        $this->db->join('client as c', 't.iClientId=c.iClientId');
        /*$this->db->join('trip_drivers as td','t.iTripId=td.iTripId');*/
        /*$this->db->join('driver as d','td.iDriverId=d.iDriverId');*/
        $this->db->where('t.iClientId', $iClientId);
        /*$this->db->where('t.ePaymentStatus','Completed');*/
        $this->db->where('t.eStatus !=', 'Pending');
        /*$this->db->where('t.eDriverAssign','Yes');*/
        $this->db->order_by('t.iTripId', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
    function getTripCountDatails($iClientId) {
        $this->db->select('t.*,c.vFirstName,c.vLastName');
        $this->db->from('trip_detail as t');
        $this->db->join('client as c', 't.iClientId=c.iClientId');
        /*$this->db->join('trip_drivers as td','t.iTripId=td.iTripId')*/;
        /*$this->db->join('driver as d','td.iDriverId=d.iDriverId');*/
        $this->db->where('t.iClientId', $iClientId);
        /*$this->db->where('t.ePaymentStatus','Completed');*/
        $this->db->where('t.eStatus !=', 'Pending');
        /*$this->db->where('t.eDriverAssign','Yes');*/
        $this->db->order_by('t.iTripId', 'desc');
        $this->db->limit(5);
        return $this->db->count_all_results();
    }
    function getTotalPayment($iClientId, $iTripId) {
        $this->db->select('SUM(t.fPerMileFare) as kmFare,SUM(t.fTotalMinute) as TotalMinFare,SUM(t.fFinalPayment) as TotalPayment');
        $this->db->from('trip_detail as t');
        $this->db->join('client as c', 't.iClientId=c.iClientId');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('t.iTripId', $iTripId);
        $this->db->where('t.eStatus !=', 'Pending');
        $this->db->order_by('t.iTripId', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->row_array();
    }
    function searchTripDetailsbyDate($sourceDate, $departDate, $iClientId) {
        $this->db->select("td.*,c.vFirstName,c.vLastName");
        $this->db->from("trip_detail as td");
        $this->db->join("client as c", "td.iClientId=c.iClientId");
        $this->db->where("DATE_FORMAT(td.dTripDate,'%Y-%m-%d') >=", $sourceDate);
        $this->db->where("DATE_FORMAT(td.dRideEndDate,'%Y-%m-%d') <=", $departDate);
        $this->db->where('td.iClientId', $iClientId);
        $this->db->where('td.eStatus !=', 'Pending');
        $this->db->limit(5);
        $data = $this->db->get();
        return $data->result_array();
    }
    function searchTripDetailsbyDate_pagination($sourceDate, $departDate, $iClientId, $start) {
        $this->db->select("td.*,c.vFirstName,c.vLastName");
        $this->db->from("trip_detail as td");
        $this->db->join("client as c", "td.iClientId=c.iClientId");
        $this->db->where("DATE_FORMAT(td.dTripDate,'%Y-%m-%d') >=", $sourceDate);
        $this->db->where("DATE_FORMAT(td.dRideEndDate,'%Y-%m-%d') <=", $departDate);
        $this->db->where('td.iClientId', $iClientId);
        $this->db->where('td.eStatus !=', 'Pending');
        $this->db->limit(5, $start);
        $data = $this->db->get();
        return $data->result_array();
    }
    function searchTripCountbyDate($sourceDate, $departDate, $iClientId) {
        $this->db->select("td.*,c.vFirstName,c.vLastName");
        $this->db->from("trip_detail as td");
        $this->db->join("client as c", "td.iClientId=c.iClientId");
        $this->db->where("DATE_FORMAT(td.dTripDate,'%Y-%m-%d') >=", $sourceDate);
        $this->db->where("DATE_FORMAT(td.dRideEndDate,'%Y-%m-%d') <=", $departDate);
        $this->db->where('td.iClientId', $iClientId);
        $this->db->where('td.eStatus !=', 'Pending');
        return $this->db->count_all_results();
    }
    function getTotalPaymentbyDate($sourceDate, $departDate, $iClientId, $iTripId) {
        $this->db->select("SUM(td.fPerMileFare) as kmFare,SUM(td.fTotalMinute) as TotalMinFare,SUM(td.fFinalPayment) as TotalPayment");
        $this->db->from("trip_detail as td");
        $this->db->join("client as c", "td.iClientId=c.iClientId");
        $this->db->where("DATE_FORMAT(td.dTripDate,'%Y-%m-%d') >=", $sourceDate);
        $this->db->where("DATE_FORMAT(td.dRideEndDate,'%Y-%m-%d') <=", $departDate);
        $this->db->where('td.iClientId', $iClientId);
        $this->db->where('td.iTripId', $iTripId);
        $this->db->where('td.eStatus !=', 'Pending');
        $data = $this->db->get();
        return $data->row_array();
    }
    function getReportDetails($iClientId) {
        $this->db->select('t.*,d.vFirstName,d.vLastName,c.vFirstName as customerFirstName,c.vLastName as customerLastName,ct.vCity');
        $this->db->select("DATE_FORMAT(t.dTripDate,'%h:%i') AS dTripTime", FALSE);
        $this->db->select("DATE_FORMAT(t.dRideEndDate,'%h:%i') AS dTripEndTime", FALSE);
        $this->db->from('trip_detail as t');
        $this->db->join('trip_drivers as td', 't.iTripId=td.iTripId', 'left');
        $this->db->join('driver as d', 'td.iDriverId=d.iDriverId', 'left');
        $this->db->join('client as c', 't.iClientId=c.iClientId');
        $this->db->join('city as ct', 't.iCityId=ct.iCityId');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('t.eStatus !=', 'Pending');
        /*$this->db->where('t.ePaymentStatus','Completed');*/
        $this->db->order_by('t.iTripId', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getReportDetails_datewise($iClientId, $sourceDate, $departDate) {
        $this->db->select('t.*,d.vFirstName,d.vLastName,c.vFirstName as customerFirstName,c.vLastName as customerLastName,ct.vCity');
        $this->db->select("DATE_FORMAT(t.dTripDate,'%h:%i') AS dTripTime", FALSE);
        $this->db->select("DATE_FORMAT(t.dRideEndDate,'%h:%i') AS dTripEndTime", FALSE);
        $this->db->from('trip_detail as t');
        $this->db->join('trip_drivers as td', 't.iTripId=td.iTripId', 'left');
        $this->db->join('driver as d', 'td.iDriverId=d.iDriverId', 'left');
        $this->db->join('client as c', 't.iClientId=c.iClientId');
        $this->db->join('city as ct', 't.iCityId=ct.iCityId');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('t.eStatus !=', 'Pending');
        $this->db->where("DATE_FORMAT(t.dTripDate,'%Y-%m-%d') >=", $sourceDate);
        $this->db->where("DATE_FORMAT(t.dRideEndDate,'%Y-%m-%d') <=", $departDate);
        /*$this->db->where('t.ePaymentStatus','Completed');*/
        $this->db->order_by('t.iTripId', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getPaginationTripDatails($start, $iClientId) {
        $this->db->select('t.*,c.vFirstName,c.vLastName');
        $this->db->from('trip_detail as t');
        $this->db->join('client as c', 't.iClientId=c.iClientId');
        /*$this->db->join('trip_drivers as td','t.iTripId=td.iTripId');
         $this->db->join('driver as d','td.iDriverId=d.iDriverId');*/
        $this->db->where('t.iClientId', $iClientId);
        /*$this->db->where('t.ePaymentStatus','Completed');*/
        $this->db->where('t.eStatus !=', 'Pending');
        /*$this->db->where('t.eDriverAssign','Yes');*/
        $this->db->order_by('t.iTripId', 'desc');
        $this->db->limit(5, $start);
        return $this->db->get()->result_array();
    }
    function getPaginationTotalPayment($iClientId, $iTripId) {
        $this->db->select('SUM(t.fPerMileFare) as kmFare,SUM(t.fTotalMinute) as TotalMinFare,SUM(t.fFinalPayment) as TotalPayment');
        $this->db->from('trip_detail as t');
        $this->db->join('client as c', 't.iClientId=c.iClientId');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('t.iTripId', $iTripId);
        $this->db->where('t.eStatus !=', 'Pending');
        $this->db->order_by('t.iTripId', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->row_array();
    }
}
?>
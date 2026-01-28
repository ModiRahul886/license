<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class client_info_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function get_credit_card_image($iCustomerCreditCardId) {
        $this->db->select('cm.vCardImage');
        $this->db->from('credit_card_information cci');
        $this->db->join('card_master cm', 'cci.iCardTypeId=cm.iCardTypeId');
        $this->db->where('cci.iTransactionId', $iCustomerCreditCardId);
        $query = $this->db->get();
        $res = $query->row_array();
        if (!empty($res)) {
            return $res['vCardImage'];
        } else {
            return 'no';
        }
    }
    function Update_creditcard_info($iClientId) {
        $update_data['ePrimmary'] = 'Yes';
        $this->db->where('iClientId', $iClientId);
        $this->db->update('credit_card_information', $update_data);
    }
    function get_trip_driver_details($iTripId) {
        $this->db->select('d.iDriverId,d.vFirstName,d.vLastName');
        $this->db->from('trip_drivers tdr');
        $this->db->join('driver d', 'tdr.iDriverId=d.iDriverId');
        $this->db->where('tdr.iTripId', $iTripId);
        $query = $this->db->get();
        return $query->row_array();
    }
    function get_all_completed_trips($iClientId) {
        $this->db->select('');
        $this->db->from('trip_detail');
        $this->db->where('iClientId', $iClientId);
        $this->db->where('eStatus !=', 'Pending');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
    function getAllCompletedTripsCount($iClientId) {
        $this->db->select('');
        $this->db->from('trip_detail');
        $this->db->where('iClientId', $iClientId);
        $this->db->where('eStatus !=', 'Pending');
        return $this->db->count_all_results();
    }
    function get_client_details($iClientId) {
        $this->db->select('');
        $this->db->from('client');
        $this->db->where('iClientId', $iClientId);
        $query = $this->db->get();
        return $query->row_array();
    }
    function delete_payment($id) {
        $this->db->where('iTransactionId', $id);
        $this->db->delete('credit_card_information');
    }
    function get_trip_patner($iClientId, $iTripId) {
        $this->db->select('tp.iPartnerId');
        $this->db->from('trip_partners as tp');
        $this->db->where('tp.iTripId', $iTripId);
        $this->db->where('tp.iClientId', $iClientId);
        $this->db->where('tp.eRequestStatus', 'Accepted');
        $this->db->get();
        $que = $this->db->last_query();
        $this->db->select('vFirstName,vLastName');
        $this->db->from('client');
        $this->db->where("iClientId in ($que)");
        $que2 = $this->db->get();
        return $que2->result_array();
    }
    function get_country() {
        $this->db->select('iCountryId,vCountry');
        $this->db->from('country');
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_state() {
        $this->db->select('iStateId,vState');
        $this->db->from('state');
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_country_code($iCountryId) {
        $this->db->select('vCountryMobileCode');
        $this->db->from('country');
        $this->db->where('iCountryId', $iCountryId);
        $query = $this->db->get()->row_array();
        return $query['vCountryMobileCode'];
    }
    function edit_client($client) {
        $this->db->update("client", $client, array('iClientId' => $client['iClientId']));
        return $this->db->affected_rows();
    }
    function getAllFareDetails() {
        $this->db->select('');
        $this->db->from('faredetails');
        $this->db->order_by('iFareId', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_allstates_bycountry() {
        $this->db->select('iStateId,vState,iCountryId');
        $this->db->from('state');
        /*$this->db->where('iCountryId', $iCountryId);*/
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_cities($iStateId) {
        $this->db->select('iCityId,vCity');
        $this->db->from('city');
        $this->db->where('iStateId', $iStateId);
        $this->db->where('eStatus', 'Active');
        $query = $this->db->get();
        return $query->result_array();
    }
    function update($data, $iClientId) {
        $this->db->where('iClientId', $iClientId);
        $query = $this->db->update('client', $data);
        return $query;
    }
    function get_card() {
        $this->db->select('');
        $this->db->from('card_master');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_client_payment($iClientId) {
        $this->db->select('t.*,cm.vCardName,cm.vCardImage');
        $this->db->from('credit_card_information as t');
        $this->db->join('card_master as cm', 't.iCardTypeId=cm.iCardTypeId');
        $this->db->where('t.iClientId', $iClientId);
        $query = $this->db->get();
        return $query->result_array();
    }
    function getAllTripDetails($iClientId) {
        $this->db->select('t.*,d.vFirstName,d.vLastName');
        $this->db->from('trip_detail as t');
        $this->db->join('driver as d', 't.iDriverId = d.iDriverId');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->order_by('t.iTripId', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    function delete_trip_details($iTripId, $table) {
        $this->db->where('iTripId', $iTripId);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
    function getTripDeatilsByClientId($iClientId, $LIMITSTART, $LIMITNORECORD) {
        $this->db->select('t.*,d.vFirstName,d.vLastName,vc.vCompany,c.vCity,cci.vCreditcardNo,cm.vCardImage,cm.vCardName');
        $this->db->from('trip_detail as t');
        $this->db->join('credit_card_information as cci', 't.iCustomerCreditCardId=cci.iTransactionId');
        $this->db->join('card_master as cm', 'cci.iCardTypeId=cm.iCardTypeId');
        $this->db->join('trip_drivers as td', 't.iTripId=td.iTripId');
        $this->db->join('driver as d', 'td.iDriverId = d.iDriverId');
        $this->db->join('vehicle_companies as vc', 't.iVehicleCompanyId=vc.iVehicleCompanyId');
        $this->db->join('city as c', 't.iCityId=c.iCityId');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('cci.ePrimmary', 'Yes');
        $this->db->where('t.eDriverAssign', 'Yes');
        $this->db->where('t.eStatus', 'Complete');
        $this->db->where('t.ePaymentStatus', 'Completed');
        /*$this->db->order_by('t.iTripId','DESC');*/
        $this->db->limit($LIMITNORECORD, $LIMITSTART);
        $query = $this->db->get();
        return $query->result_array();
    }
    function getTripDeatilsByClientIdtotal($iClientId) {
        $this->db->select('t.*,d.vFirstName,d.vLastName,vc.vCompany,c.vCity,cci.vCreditcardNo,cm.vCardImage,cm.vCardName');
        $this->db->from('trip_detail as t');
        $this->db->join('credit_card_information as cci', 't.iCustomerCreditCardId=cci.iTransactionId');
        $this->db->join('card_master as cm', 'cci.iCardTypeId=cm.iCardTypeId');
        $this->db->join('trip_drivers as td', 't.iTripId=td.iTripId');
        $this->db->join('driver as d', 'td.iDriverId = d.iDriverId');
        $this->db->join('vehicle_companies as vc', 't.iVehicleCompanyId=vc.iVehicleCompanyId');
        $this->db->join('city as c', 't.iCityId=c.iCityId');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('cci.ePrimmary', 'Yes');
        $this->db->where('t.eDriverAssign', 'Yes');
        $this->db->where('t.eStatus', 'Complete');
        $this->db->where('t.ePaymentStatus', 'Completed');
        return $this->db->count_all_results();
    }
    function checkPaymentMethod($iClientId) {
        $this->db->select('t.ePaymentType');
        $this->db->from('trip_detail as t');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('t.eDriverAssign', 'Yes');
        $this->db->where('t.eStatus', 'Complete');
        $this->db->where('t.ePaymentStatus', 'Completed');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getTripDeatilsByClientIdtotalWithCash($iClientId) {
        $this->db->select('t.*,d.vFirstName,d.vLastName,vc.vCompany,c.vCity');
        $this->db->from('trip_detail as t');
        $this->db->join('trip_drivers as td', 't.iTripId=td.iTripId');
        $this->db->join('driver as d', 'td.iDriverId = d.iDriverId');
        $this->db->join('vehicle_companies as vc', 't.iVehicleCompanyId=vc.iVehicleCompanyId');
        $this->db->join('city as c', 't.iCityId=c.iCityId');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('t.eDriverAssign', 'Yes');
        $this->db->where('t.eStatus', 'Complete');
        $this->db->where('t.ePaymentStatus', 'Completed');
        return $this->db->count_all_results();
    }
    function getTripDeatilsByClientIdwithPaymentMethodCash($iClientId, $LIMITSTART, $LIMITNORECORD) {
        $this->db->select('t.*,d.vFirstName,d.vLastName,vc.vCompany,c.vCity');
        $this->db->from('trip_detail as t');
        $this->db->join('trip_drivers as td', 't.iTripId=td.iTripId');
        $this->db->join('driver as d', 'td.iDriverId = d.iDriverId');
        $this->db->join('vehicle_companies as vc', 't.iVehicleCompanyId=vc.iVehicleCompanyId');
        $this->db->join('city as c', 't.iCityId=c.iCityId');
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('t.eDriverAssign', 'Yes');
        $this->db->where('t.eStatus', 'Complete');
        $this->db->where('t.ePaymentStatus', 'Completed');
        $this->db->limit($LIMITNORECORD, $LIMITSTART);
        $query = $this->db->get();
        return $query->result_array();
    }
    function add_payment($data, $iClientId) {
        $query = $this->db->insert('credit_card_information', $data);
        $id = $this->db->insert_id();
        if ($id) {
            if ($data['ePrimmary'] == 'Yes') {
                $upd['ePrimmary'] = 'No';
                $this->db->where('iTransactionId !=', $id);
                $this->db->where('iClientId', $iClientId);
                $this->db->update('credit_card_information', $upd);
            }
        }
    }
    function update_payment($data, $iClientId) {
        /*echo "<pre>";print_r($data);exit;*/
        $this->db->update("credit_card_information", $data, array('iTransactionId' => $data['iTransactionId']));
        $effct = $this->db->affected_rows();
        if ($effct > 0) {
            if (in_array('Yes', $data)) {
                $upd['ePrimmary'] = 'No';
                $this->db->where('iTransactionId !=', $data['iTransactionId']);
                $this->db->where('iClientId', $iClientId);
                $this->db->update('credit_card_information', $upd);
            }
        }
        return $effct;
    }
    function trip_detail($tripid) {
        $this->db->select('tDestinationAddressLatLong,tPickUpAddressLatLong,fTotalMinute,iTripId,iClientId,iRideId,vPickupLocation,vDestinationLocation,fDistance,fQuoteFare,fBaseFare,fPerMileFare,fPerMinFare,iCityId,iVehicleCompanyId,dTripDate,dRideEndDate,iTransactionId,ePaymentStatus,eType,eStatus,ePaymentType,fFinalPayment,iCustomerCreditCardId,dNewsLetterPromocodeDiscount,dInvitePromoCodeDiscount,iInvitationCodeTotalDiscount,dSubtotalPayment,fRating,MinimumFare');
        $this->db->select("DATE_FORMAT(dTripDate,'%h:%i') AS dTripTime", FALSE);
        $this->db->select("DATE_FORMAT(dRideEndDate,'%h:%i') AS dTripEndTime", FALSE);
        $this->db->select("DATE_FORMAT(dTripDate,'%h:%i:%s') AS dTripDefTime", FALSE);
        $this->db->select("DATE_FORMAT(dTripDate,'%h:%i:%s') AS dTripStartTime", FALSE);
        $this->db->select("DATE_FORMAT(dRideEndDate,'%h:%i:%s') AS dTripDefEndTime", FALSE);
        $this->db->where('iTripId', $tripid);
        $que = $this->db->get('trip_detail');
        $result = $que->row_array();
        $this->db->select('');
        $this->db->where('iTripId', $result['iTripId']);
        $data = $this->db->get('trip_drivers');
        $result11 = $data->row_array();
        $this->db->select('');
        $this->db->where('iDriverId', $result11['iDriverId']);
        $data = $this->db->get('driver');
        $result2 = $data->row_array();
        $result['iDriverId'] = $result2;
        $this->db->select('');
        $this->db->where('iClientId', $result['iClientId']);
        $data1 = $this->db->get('client');
        $result3 = $data1->row_array();
        $result['iClientId'] = $result3;
        $this->db->select('vPlateNo,iModelId');
        $this->db->where('iDriverId', $result['iDriverId']['iDriverId']);
        $this->db->from('vehicle_attribute');
        $que9 = $this->db->get();
        $data9 = $que9->row_array();
        $result['vVehiclePlateNumber'] = $data9['vPlateNo'];
        $this->db->select('vModelName');
        $this->db->where('iModelId', $data9['iModelId']);
        $data2 = $this->db->get('vehicle_models');
        $result4 = $data2->row_array();
        $result['iVehicleCompanyId'] = $result4['vModelName'];
        return $result;
    }
    function transactionDetail($iTransactionId) {
        $this->db->select('cc.*,cm.*');
        $this->db->from('trip_detail as t');
        $this->db->join('credit_card_information as cc', 't.iCustomerCreditCardId=cc.iTransactionId');
        $this->db->join('card_master as cm', 'cc.iCardTypeId=cm.iCardTypeId');
        $this->db->where('t.iCustomerCreditCardId', $iTransactionId);
        $query = $this->db->get();
        return $query->row_array();
        /*$this->db->select('t.*,cc.*,cm.*');
        $this->db->from('transactions as t');
        $this->db->join('credit_card_information as cc','t.iTransactionId=cc.iTransactionId');
        $this->db->join('card_master as cm','cc.iCardTypeId=cm.iCardTypeId');
        $this->db->where('t.iTransactionId',$iTransactionId);
        $query = $this->db->get();
        return $query->row_array();*/
    }
    function getAllTripDetailsByClientIdWithCashAndCreditCard($iClientId, $paymentType) {
        $this->db->select('t.*,d.vFirstName,d.vLastName,vc.vCompany,c.vCity');
        $this->db->from('trip_detail as t');
        $this->db->join('trip_drivers as td', 't.iTripId=td.iTripId');
        $this->db->join('driver as d', 'td.iDriverId = d.iDriverId');
        $this->db->join('vehicle_companies as vc', 't.iVehicleCompanyId=vc.iVehicleCompanyId');
        $this->db->join('city as c', 't.iCityId=c.iCityId');
        /*if ($paymentType == 'Credit Card') {
        
        }*/
        $this->db->where('t.iClientId', $iClientId);
        $this->db->where('t.ePaymentType', $paymentType);
        $this->db->where('t.eDriverAssign', 'Yes');
        $this->db->where('t.eStatus', 'Complete');
        $this->db->where('t.ePaymentStatus', 'Completed');
        $this->db->order_by('t.iTripId', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getCreditCardInformationByPayment($iCustomerCreditCardId) {
        $this->db->select('cci.vCreditcardNo,cm.vCardImage,cm.vCardName');
        $this->db->from('credit_card_information as cci');
        $this->db->join('card_master as cm', 'cci.iCardTypeId=cm.iCardTypeId');
        $this->db->where('cci.iTransactionId', $iCustomerCreditCardId);
        $this->db->where('cci.ePrimmary', 'Yes');
        $query = $this->db->get();
        return $query->result_array();
    }
    function getAllCompletedTripsAjax($iClientId) {
        $this->db->select('');
        $this->db->from('trip_detail');
        $this->db->where('iClientId', $iClientId);
        $this->db->where('eStatus !=', 'Pending');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
    function getAllCompletedTripsCountAjax($start, $iClientId) {
        $this->db->select('');
        $this->db->from('trip_detail');
        $this->db->where('iClientId', $iClientId);
        $this->db->where('eStatus !=', 'Pending');
        $this->db->limit(5, $start);
        return $this->db->get()->result_array();
    }
    function checkRatingValue($iTripId) {
        $this->db->select('fRating');
        $this->db->from('trip_detail');
        $this->db->where('iTripId', $iTripId);
        return $this->db->get()->row_array();
    }
    function updateRatingValue($data) {
        $this->db->update("trip_detail", $data, array('iTripId' => $data['iTripId']));
        $effct = $this->db->affected_rows();
    }
    /*function addRatingValue($data){
    $query=$this->db->insert('trip_detail', $data, array('iTripId' => $data['iTripId']));
        return $this->db->insert_id();    	
    }*/
    function checkCreditExistorNot($creditCard) {
        $this->db->select('');
        $this->db->from('credit_card_information');
        $this->db->where('vCreditcardNo', $creditCard);
        $res = $this->db->get()->result_array();
        /*return $res;*/
        if (!empty($res)) {
            return 'yes';
        } else {
            return 'no';
        }
    }
    function getCreditCardInfoByiClientId($iClientId) {
        $this->db->select('iClientId,vCreditcardNo');
        $this->db->from('credit_card_information');
        $this->db->where('iClientId', $iClientId);
        $res = $this->db->get()->result_array();
        return $res;
    }
}
?>
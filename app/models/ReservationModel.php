<?php
class ReservationModel extends Model
{
    public function addReservation($data)
    {   
        $rv_type = $data['rv_type'];

        if($rv_type=='service'){
            // print_r($data['customer_id']);
            $this->insert('customerrvdetails', [

                'rvType' => $data['rv_type'],
                'spType' => $data['service_type'],
                'spName'=>$data['service_name'],
                'eventName' => $data['event_name'],
                'rvDate' => $data['rvdate'],
                'rvTime' => $data['rvtime'],
                'customer_id' => $data['customer_id'],
                'sp_id' => $data['svp_id'],
                'price' => $data['price'],
                'service_id' => $data['service_id'],
                'status'=> "pending",
                'payment' => "not-paid"
    
             ]);
        }
        else{
            $this->insert('customerrvdetails', [

                'rvType' => $data['rv_type'],
                'packageType' => $data['package_type'],
                'packageName' => $data['package_name'],
                'eventName' => $data['event_name'],
                'rvDate' => $data['rvdate'],
                'rvTime' => $data['rvtime'],
                'customer_id' => $data['customer_id'],
                'sp_id' => $data['spv_id_string'],
                'price' => $data['price'],
                'service_id' => $data['package_id'],
                'status'=> "pending",
                'payment' => "not-paid"
    
             ]);
        }
    
    }

    public function getReservationDetails()
    {
        $results = $this->getResultSet("customerrvdetails", "*", []);

        return $results;
    }

    public function getReservationDetailsByReservationID($id)
    {
        $results = $this->getSingle("customerrvdetails", "*", ['rv_id' => $id]);

        return $results;
    }

    public function getReservationDetailsByQuery($query)
    {
        $results = $this->customQuery($query);

        return $results;
    }

    public function getReservationsByCustomer($customerID)
    {
        $results = $this->getResultSet("customerrvdetails", "*", ['customer_id' => $customerID]);

        return $results;
    }

    public function editReservation($rvID, $data){

        $this->update('customerrvdetails', [

            'eventName' => $data['event_name'],
            'rvDate' => $data['rvdate'],
            'rvTime' => $data['rvtime']
            ], 
            
            ['rv_id' => $rvID]);

    }

    public function getNumberofReservationsByPaid(){

        $results = $this->getRowCount("customerrvdetails", ["payment" => "not-paid"]);
        return $results;
    }

    public function addEvent($data)
    {   
        $this->insert('calendar_dates', [
            'sp_user_id' => $data['sp_user_id'],
            'title' => $data['title'],
            'start'=>$data['start'],
            'end' => $data['end'],
            'rv_id' => $data['rv_id'],
            ]);
    }

    public function addPayment($data){
        $this->insert('payments', [
            'rv_id' => $data['rv_id'],
            'customer_id' => $data['customer_id'],
            'ad_price' => $data['ad_price'],
            'full_price' => $data['full_price'],
            'rem_price' => $data['full_price']
            ]);
    }

    public function updateRvDetails($data){
            
        $this->update('customerrvdetails', [
            'status' => $data['status'],
            'payment' => $data['payment']
            ], 
            
            ['rv_id' => $data['rv_id']]);
    
    }

    public function getPackageConfirmationDetails(){
        $results = $this->getResultSet("package_confirmation", "*", []);
        return $results;
    }
    

    public function updatePackageConfirmationDetails($data){

        switch($data['sp_user_type']){
            case 'Deco Company':
                $SQLstatement = "UPDATE package_confirmation SET no_of_confirmed_services = no_of_confirmed_services + 1, deco_confirmation =" .$data['sp_user_id']." WHERE rv_id = ".$data['rv_id'];
                break;
            case 'Band Manager':
                $SQLstatement = "UPDATE package_confirmation SET no_of_confirmed_services = no_of_confirmed_services + 1, band_confirmation =" .$data['sp_user_id']." WHERE rv_id = ".$data['rv_id'];
                break;
            case 'Photography Company':
                $SQLstatement = "UPDATE package_confirmation SET no_of_confirmed_services = no_of_confirmed_services + 1, photo_confirmation =" .$data['sp_user_id']." WHERE rv_id = ".$data['rv_id'];
                break;
        }
                
        $this->customQuery($SQLstatement);
    }

    public function updatePackageDeclineDetails($data){
        
        $this->update('package_confirmation', [
            'no_of_declined_services' => $data['no_of_declined_services']
            ], 
            
            ['rv_id' => $data['rv_id']]);
    }

    public function deleteEvent($eventData){
        $this->delete('calendar_dates', ['rv_id' => $eventData['rv_id']]);
    }

    public function deletePayment($rvid){
        $this->delete('payments', ['rv_id' => $rvid]);
    }

    public function deleteFromPackageConfirmation($rvid){
        $this->delete('package_confirmation', ['rv_id' => $rvid]);
    }

    public function getPendingPaymentDetailsByCustomerID($customerID){
        $results = $this->customQuery("SELECT * FROM payments WHERE customer_id = ".$customerID." AND fp_flag = 0");
        return $results;
    }

    public function getCompletedPaymentDetailsByCustomerID($customerID){
        $results = $this->getResultSet("payments", "*", ['customer_id' => $customerID,'fp_flag'=>1]);
        return $results;
    }

    public function getPaymentLogDetails(){
        $results = $this->getResultSet("payment_log", "*", []);
        return $results;
    }
    
}

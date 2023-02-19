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
            'end' => $data['end']
            ]);
    }

    public function addPayment($data){
        $this->insert('payments', [
            'rv_id' => $data['rv_id'],
            'customer_id' => $data['customer_id'],
            'ad_price' => $data['ad_price'],
            'full_price' => $data['full_price']
            ]);
    }

    public function updateRvDetails($data){
            
        $this->update('customerrvdetails', [
            'status' => $data['status'],
            'payment' => $data['payment']
            ], 
            
            ['rv_id' => $data['rv_id']]);
    
    }

    public function deleteEvent($eventData){
        $this->delete('calendar_dates', ['start' => $eventData['start'], 'end' => $eventData['end'], 'sp_user_id' => $eventData['sp_user_id'], 'title' => $eventData['title']]);
    }

    public function deletePayment($rvid){
        $this->delete('payments', ['rv_id' => $rvid]);
    }
    
}

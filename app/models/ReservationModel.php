<?php
class ReservationModel extends Model
{
    public function addReservation($data)
    {   
        $rv_type = $data['rv_type'];

        if($rv_type=='service'){
            $this->insert('customerrvdetails', [

                'rvType' => $data['rv_type'],
                'spType' => $data['service_type'],
                'spName'=>$data['service_name'],
                'eventName' => $data['event_name'],
                'rvDate' => $data['rvdate'],
                'rvTime' => $data['rvtime'],
                'customer_id' => $data['customer_id'],
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
    
}

<?php

class HotelModel extends Model
{
    public function addHotelService($data)
    {
        $this->insert('hotelservicedetails', [
	
            'service_type' => $data['event_name'],
            'hall_image' => $data['hotel_image'],
            'price' => $data['price'],
            'hall_name' => $data['hall_name'],
            'location' => $data['location'],
            'max_crowd' => $data['max_crowd'],
            'hall_type' => $data['hall_type'],
            'ac_status' => $data['ac_status'],
            'other_facilities' => $data['other_facilities'],
            'service_provider_id' => $data['service_provider_id']

         ]);
    }

    public function getHotelServiceDetails()
    {
        $results = $this->getResultSet("hotelservicedetails", "*", []);

        return $results;
    }

    public function getHotelServiceDetailsByServiceID($id)
    {
        $results = $this->getSingle("hotelservicedetails", "*", ['service_id' => $id]);

        return $results;
    }

    public function getServicesByServiceProvider($serviceproviderID)
    {
        $results = $this->getResultSet("hotelservicedetails", "*", ['service_provider_id' => $serviceproviderID]);

        return $results;
    }

    public function activate_deactivate($type, $status, $id)
    {
        if($type == 'activate'){
            if($this->update('hotelservicedetails', ['active' => $status], ['service_id' => $id]))
                return true;
            else
                return false;
        }
        else{
            if($this->update('hotelservicedetails', ['active' => $status], ['service_id' => $id]))
                return true;
            else
                return false;
        }
    }
    
    public function editHotelServicebyID($serviceID,$data)
    {

        $this->update('hotelservicedetails', [

            'service_type' => $data['event_name'],
            'price' => $data['price'],
            'hall_name' => $data['hall_name'],
            'location' => $data['location'],
            'max_crowd' => $data['max_crowd'],
            'hall_type' => $data['hall_type'],
            'ac_status' => $data['ac_status'],
            'other_facilities' => $data['other_facilities'],
            
         ], ['service_id' => $serviceID]);
    }

    public function getChatUsers($unique_id){
        $result = $this->getSingle("chat_users", "*", ['unique_id' => $unique_id]);
        return $result;
     }
  
     public function getUserByUserId($user_id){
        $result = $this->getSingle("chat_users", "*", ['unique_id' => $user_id]);
        return $result;
     }

}

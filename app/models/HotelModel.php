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
            'other_facilities' => $data['other_facilities']

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
    

}

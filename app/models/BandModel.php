<?php
class BandModel extends Model
{
    public function addBandService($data)
    {
        $this->insert('bandservicedetails', [

            'service_name' => $data['name'],
            'other_band_type' => $data['other_band'],
            'no_of_players' => $data['num_players'],
            'price'=>$data['price'],
            'band_type' => $data['band'],
            'service_provider_id' => $data['service_provider_id'],
            'duration' => $data['duration']
         ]);
    }

    public function getBandServiceDetails()
    {
        $results = $this->getResultSet("bandservicedetails", "*", []);

        return $results;
    }

    public function getBandServiceDetailsByServiceID($id)
    {
        $results = $this->getSingle("bandservicedetails", "*", ['service_id' => $id]);

        return $results;
    }

    public function getServicesByServiceProvider($serviceproviderID)
    {
        $results = $this->getResultSet("bandservicedetails", "*", ['service_provider_id' => $serviceproviderID]);

        return $results;
    }

    public function editBandServicebyID($serviceID,$data){

        $this->update('bandservicedetails', [

            'service_name' => $data['name'],
            'other_band_type' => $data['other_band'],
            'no_of_players' => $data['num_players'],
            'price'=>$data['price'],
            'band_type' => $data['band'],
            'duration' => $data['duration'],

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
    
    
    public function activate_deactivate($type, $status, $id)
    {
        if($type == 'activate'){
            if($this->update('bandservicedetails', ['active' => $status], ['service_id' => $id]))
                return true;
            else
                return false;
        }
        else{
            if($this->update('bandservicedetails', ['active' => $status], ['service_id' => $id]))
                return true;
            else
                return false;
        }
    }

    public function getRandomServicesFromBand($limit){

        $resultSet = array();

        foreach ($limit as $number) {
            
            $results = $this->getResultSet("bandservicedetails", "*", ['service_id' => $number]);
            array_push($resultSet, $results);
        }

      return $resultSet;
    }

    public function getNumberofServices(){

        $results = $this->getRowCount("bandservicedetails", []);
        return $results;
      }
    
    public function getPriceFromServiceID($id){
        $results = $this->getSingle("bandservicedetails", ["price"], ['service_id' => $id]);
        return $results;
    }

}

<?php
class PhotographyModel extends Model
{
    public function addPhotographyService($data)
    {
        $this->insert('photographyservicedetails', [

            'service_name' => $data['name'],
            'other_photography' => $data['other_photography'],
            // 'num_members' => $data['num_members'],
            'price'=>$data['price'],
            'photography_features' => $data['photography'],
            'service_provider_id' => $data['service_provider_id']

         ]);
    }

    public function getPhotographyServiceDetails()
    {
        $results = $this->getResultSet("photographyservicedetails", "*", []);

        return $results;
    }

    public function getPhotographyServiceDetailsByServiceID($id)
    {
        $results = $this->getSingle("photographyservicedetails", "*", ['service_id' => $id]);

        return $results;
    }

    public function getServicesByServiceProvider($serviceproviderID)
    {
        $results = $this->getResultSet("photographyservicedetails", "*", ['service_provider_id' => $serviceproviderID]);

        return $results;
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

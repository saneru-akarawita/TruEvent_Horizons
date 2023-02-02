<?php
class DecoModel extends Model
{
    public function addDecoService($data)
    {
        $this->insert('decoservicedetails', [

            'service_name' => $data['name'],
            'other_decoration' => $data['other_deco'],
            'theme' => $data['theme'],
            'price'=>$data['price'],
            'decoration_item' => $data['decoration'],
            'service_provider_id' => $data['service_provider_id']

         ]);
    }

    public function getDecoServiceDetails()
    {
        $results = $this->getResultSet("decoservicedetails", "*", []);

        return $results;
    }

    public function getDecoServiceDetailsByServiceID($id)
    {
        $results = $this->getSingle("decoservicedetails", "*", ['service_id' => $id]);

        return $results;
    }

    public function getServicesByServiceProvider($serviceproviderID)
    {
        $results = $this->getResultSet("decoservicedetails", "*", ['service_provider_id' => $serviceproviderID]);

        return $results;
    }

    public function activate_deactivate($type, $status, $id)
    {
        if($type == 'activate'){
            if($this->update('decoservicedetails', ['active' => $status], ['service_id' => $id]))
                return true;
            else
                return false;
        }
        else{
            if($this->update('decoservicedetails', ['active' => $status], ['service_id' => $id]))
                return true;
            else
                return false;
        }
    }

    public function editDecoServicebyID($serviceID,$data){

        $this->update('decoservicedetails', [

            'service_name' => $data['name'],
            'other_decoration' => $data['other_deco'],
            'theme' => $data['theme'],
            'price'=>$data['price'],
            'decoration_item' => $data['decoration']

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

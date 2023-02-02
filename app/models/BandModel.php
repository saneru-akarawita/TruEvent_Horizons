<?php
class BandModel extends Model
{
    public function addBandService($data)
    {
        $this->insert('bandservicedetails', [

            'service_name' => $data['name'],
            'other_band' => $data['other_band'],
            'num_players' => $data['num_players'],
            'price'=>$data['price'],
            'music_item' => $data['band'],
            'service_provider_id' => $data['service_provider_id']

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
    
    
    public function activate_deactivate($type, $status, $id)
    {
        if($type == 'activate'){
            if($this->update('bandservicedetails', ['active' => $status], ['service_id' => $id]))
                return true;
            else
                return false;
        }
        else{
            if($this->update('bandsservicedetails', ['active' => $status], ['service_id' => $id]))
                return true;
            else
                return false;
        }
    }

}

<?php
class DecoModel extends Model
{
    public function addDecoService($data)
    {
        $this->insert('decoservicedetails', [

            'service_name' => $data['name'],
            'occasion' => $data['occasion'],
            'theme' => $data['theme'],
            'price'=>$data['price'],
            'description' => $data['description'],
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
    

}

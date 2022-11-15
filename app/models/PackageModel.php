<?php
class PackageModel extends Model
{
    public function addPackage($data)
    {
        $this->insert('adminpackagedetails', [
            'package_code' => $data['pcode'],
            'package_name' => $data['name'],
            'price' => $data['price'],
            'package_type'=>$data['package_type'],
            'band_choice' => $data['bands'],
            'deco_choice' => $data['decorations'],
            'photo_choice' => $data['photography'],
         ]);
    }

    public function getPackageDetails()
    {
        $results = $this->getResultSet("adminpackagedetails", "*", []);

        return $results;
    }

    public function getPackageDetailsByPackageID($id)
    {
        $results = $this->getSingle("adminpackagedetails", "*", ['package_id' => $id]);

        return $results;
    }
    

}

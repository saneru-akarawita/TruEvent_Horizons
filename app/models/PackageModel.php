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
            'sp_id_string' => $data['sp_id_string'],
            'band_sv_id' => $data['band_sv_id'],
            'deco_sv_id' => $data['deco_sv_id'],
            'photo_sv_id' => $data['photo_sv_id']
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
    
    public function activate_deactivate($type, $status, $id)
    {
        if($type == 'activate'){
            if($this->update('adminpackagedetails', ['active' => $status], ['package_id' => $id]))
                return true;
            else
                return false;
        }
        else{
            if($this->update('adminpackagedetails', ['active' => $status], ['package_id' => $id]))
                return true;
            else
                return false;
        }
    }
    
    public function editPackagebByID($packageID,$data){

        $this->update('adminpackagedetails', [

            'package_code' => $data['pcode'],
            'package_name' => $data['name'],
            'price' => $data['price'],
            'package_type'=>$data['package_type'],
            'band_choice' => $data['bands'],
            'deco_choice' => $data['decorations'],
            'photo_choice' => $data['photography'],
            'sp_id_string' => $data['sp_id_string'],
            'band_sv_id' => $data['band_sv_id'],
            'deco_sv_id' => $data['deco_sv_id'],
            'photo_sv_id' => $data['photo_sv_id']

         ], ['package_id' => $packageID]);
    }

    public function getPriceFromPackageID($id){
        $results = $this->getSingle("adminpackagedetails", ["price"], ['package_id' => $id]);
        return $results;
    }
    

}

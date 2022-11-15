<?php
class PackageModel extends Model
{
    public function addPackage($data)
    {
        $this->insert('adminpackagedetails', [
            'package_code' => $data['pcode'],
            'package_name' => $data['name'],
            'price' => $data['price'],
            'band_choice' => $data['bands'],
            'deco_choice' => $data['decorations'],
            'photo_choice' => $data['photography'],
         ]);
    }

}

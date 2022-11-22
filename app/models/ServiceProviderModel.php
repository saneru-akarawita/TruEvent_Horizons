<?php
class ServiceProviderModel extends Model
{
   public function registerServiceProvider($data)
   {

      $this->insert('serviceprovideruser', [
         'company_name' => $data['company_name'],
         'business_id' => $data['business_id'],
         'email' => $data['email'],
         'contact_no' => $data['contactno'],
         'district' => $data['district'],
         'sp_category' => $data['service_type'],
         'travel_flag' => $data['travel_flag'],
         'account_name' => $data['accname'],
         'account_no' => $data['accnumber'],
         'bank' => $data['bank'],
         'branch' => $data['branch']
      ]);
      
   }

   public function checkServiceProviderExists($email)
   {
      $result = $this->getRowCount("serviceprovideruser", ['email' => $email]);
      return $result;
   }

   public function getServiceProviderUserData($email)
   {
      $results = $this->getSingle("serviceprovideruser", "*", ['email' => $email]);

      return [$results->service_provider_id, $results->company_name, $results->sp_category];
   }


}

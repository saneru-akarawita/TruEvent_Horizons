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

   public function getServiceProviderDetails()
   {
      $results = $this->getResultSet("serviceprovideruser", "*", []);
      return $results;
   }

   public function getServiceProviderDetailsByID($id)
   {
      $results = $this->getSingle("serviceprovideruser", "*", ['service_provider_id' => $id]);
      return $results;
   }

   public function getNumberofServiceProviders(){

      $results = $this->getRowCount("serviceprovideruser", []);
      return $results;
    }


    public function getTotalIncomeBasedOnSPIDForPackage($startDate, $endDate, $userID, $userType){
      $sql = "SELECT * FROM customerrvdetails_with_prices WHERE sp_id LIKE '%".$userID."%' AND payment = 'paid' and rvDate BETWEEN '".$startDate."' AND '".$endDate."';";
      $results = $this->customQuery($sql);
      $total = 0; // Initialize the total to 0
  
      foreach ($results as $row) {
          if($userType == 6){
              $total += $row->price_band; // Add the price of each row to the total
          }else if($userType == 5){
              $total += $row->price_deco; // Add the price of each row to the total
          }else if($userType == 7){
              $total += $row->price_photo; // Add the price of each row to the total
          }  
      }
      
      return $total; // Return the final total
   }
  
   public function getTotalIncomeBasedOnSPIDForService($startDate, $endDate, $userID){
         $sql = "SELECT * FROM customerrvdetails WHERE sp_id =".$userID." AND rvType = 'service' AND payment = 'paid' and rvDate BETWEEN '".$startDate."' AND '".$endDate."';";
         $results = $this->customQuery($sql);
         $total = 0; // Initialize the total to 0
   
         foreach ($results as $row) {
            $total += $row->price; // Add the price of each row to the total
         }
         
         return $total; // Return the final total
   }
  
   //year and month by month total income or price for SP
   public function getTotalIncomeBasedOnSPIDForPackageMonthly($startDate, $endDate, $userID, $userType){
         $sql = "SELECT * FROM customerrvdetails_with_prices WHERE sp_id LIKE '%".$userID."%' AND payment = 'paid' AND rvDate BETWEEN '".$startDate."' AND '".$endDate."';";
         $results = $this->customQuery($sql);
         $totals = array(); // Initialize the totals array
         $start = new DateTime($startDate);
         $end = new DateTime($endDate);
         
         while($start <= $end){
            $month = $start->format('Y-m');
            $totals[$month] = 0; // Initialize the total for this month to 0
            $start->modify('+1 month');
         }
   
         foreach ($results as $row) {
            $month = date('Y-m', strtotime($row->rvDate));
            if($userType == 6){
               $totals[$month] += $row->price_band; // Add the price of each row to the total for this month
            }else if($userType == 5){
               $totals[$month] += $row->price_deco; // Add the price of each row to the total for this month
            }else if($userType == 7){
               $totals[$month] += $row->price_photo; // Add the price of each row to the total for this month
            }  
         }
         
         return $totals; // Return the final total array
   }
  
   public function getTotalIncomeBasedOnSPIDForServiceMonthly($startDate, $endDate, $userID){
         $sql = "SELECT * FROM customerrvdetails WHERE sp_id =".$userID." AND rvType = 'service' AND payment = 'paid' AND rvDate BETWEEN '".$startDate."' AND '".$endDate."';";
         $results = $this->customQuery($sql);
         $totals = array(); // Initialize the totals array
         $start = new DateTime($startDate);
         $end = new DateTime($endDate);
         
         while($start <= $end){
            $month = $start->format('Y-m');
            $totals[$month] = 0; // Initialize the total for this month to 0
            $start->modify('+1 month');
         }
   
         foreach ($results as $row) {
            $month = date('Y-m', strtotime($row->rvDate));
            $totals[$month] += $row->price; // Add the price of each row to the total for this month
         }
         
         return $totals; // Return the final total array
   }

}

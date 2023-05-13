<?php
class ReservationModel extends Model
{
    public function addReservation($data)
    {   
        $rv_type = $data['rv_type'];
        if($data['crowdcount']!=null){
            $price = $data['price']*$data['crowdcount'];
        }else{
            $price = $data['price'];
        }

        if($rv_type=='service'){
            // print_r($data['customer_id']);
            $this->insert('customerrvdetails', [

                'rvType' => $data['rv_type'],
                'spType' => $data['service_type'],
                'spName'=>$data['service_name'],
                'eventName' => $data['event_name'],
                'rvDate' => $data['rvdate'],
                'rvTime' => $data['rvtime'],
                'customer_id' => $data['customer_id'],
                'sp_id' => $data['svp_id'],
                'price' => $price,
                'no_of_people' => $data['crowdcount'],
                'service_id' => $data['service_id'],
                'status'=> "pending",
                'payment' => "not-paid"
    
             ]);
        }
        else{
            $this->insert('customerrvdetails', [

                'rvType' => $data['rv_type'],
                'packageType' => $data['package_type'],
                'packageName' => $data['package_name'],
                'eventName' => $data['event_name'],
                'rvDate' => $data['rvdate'],
                'rvTime' => $data['rvtime'],
                'customer_id' => $data['customer_id'],
                'sp_id' => $data['spv_id_string'],
                'price' => $data['price'],
                'service_id' => $data['package_id'],
                'status'=> "pending",
                'payment' => "not-paid"
    
             ]);
        }
    
    }

    public function getReservationDetails()
    {
        $results = $this->getResultSet("customerrvdetails", "*", []);

        return $results;
    }

    public function getReservationDetailsByReservationID($id)
    {
        $results = $this->getSingle("customerrvdetails", "*", ['rv_id' => $id]);

        return $results;
    }

    public function getReservationDetailsByQuery($query)
    {
        $results = $this->customQuery($query);

        return $results;
    }

    public function getReservationsByCustomer($customerID)
    {
        $results = $this->getResultSet("customerrvdetails", "*", ['customer_id' => $customerID]);

        return $results;
    }

    public function getReservationsByCustomerOrdered($customerID)
    {
        $results = $this->customQuery("select * from customerrvdetails where customer_id = $customerID order by rvDate asc");

        return $results;
    }

    public function editReservation($rvID, $data){

        $this->update('customerrvdetails', [

            'eventName' => $data['event_name'],
            'rvDate' => $data['rvdate'],
            'rvTime' => $data['rvtime']
            ], 
            
            ['rv_id' => $rvID]);

    }

    public function getNumberofReservationsByPaid(){

        $results = $this->getRowCount("customerrvdetails", ["payment" => "not-paid"]);
        return $results;
    }

    public function addEvent($data)
    {   
        $this->insert('calendar_dates', [
            'sp_user_id' => $data['sp_user_id'],
            'title' => $data['title'],
            'start'=>$data['start'],
            'end' => $data['end'],
            'rv_id' => $data['rv_id']
            ]);
    }

    public function addPayment($data){
        $this->insert('payments', [
            'rv_id' => $data['rv_id'],
            'customer_id' => $data['customer_id'],
            'ad_price' => $data['ad_price'],
            'full_price' => $data['full_price'],
            'rem_price' => $data['full_price']
            ]);
    }

    public function updateRvDetails($data){
            
        $this->update('customerrvdetails', [
            'status' => $data['status'],
            'payment' => $data['payment']
            ], 
            
            ['rv_id' => $data['rv_id']]);
    
    }

    public function getPackageConfirmationDetails(){
        $results = $this->getResultSet("package_confirmation", "*", []);
        return $results;
    }
    

    public function updatePackageConfirmationDetails($data){

        switch($data['sp_user_type']){
            case 'Deco Company':
                $SQLstatement = "UPDATE package_confirmation SET no_of_confirmed_services = no_of_confirmed_services + 1, deco_confirmation =" .$data['sp_user_id']." WHERE rv_id = ".$data['rv_id'];
                break;
            case 'Band Manager':
                $SQLstatement = "UPDATE package_confirmation SET no_of_confirmed_services = no_of_confirmed_services + 1, band_confirmation =" .$data['sp_user_id']." WHERE rv_id = ".$data['rv_id'];
                break;
            case 'Photography Company':
                $SQLstatement = "UPDATE package_confirmation SET no_of_confirmed_services = no_of_confirmed_services + 1, photo_confirmation =" .$data['sp_user_id']." WHERE rv_id = ".$data['rv_id'];
                break;
        }
                
        $this->customQuery($SQLstatement);
    }

    public function updatePackageDeclineDetails($data){
        
        $this->update('package_confirmation', [
            'no_of_declined_services' => $data['no_of_declined_services']
            ], 
            
            ['rv_id' => $data['rv_id']]);
    }

    public function deleteEvent($eventData){
        $this->delete('calendar_dates', ['rv_id' => $eventData['rv_id']]);
    }

    public function deletePayment($rvid){
        $this->delete('payments', ['rv_id' => $rvid]);
    }

    public function deleteFromPackageConfirmation($rvid){
        $this->delete('package_confirmation', ['rv_id' => $rvid]);
    }

    public function getPendingPaymentDetailsByCustomerID($customerID){
        $results = $this->customQuery("SELECT * FROM payments WHERE customer_id = ".$customerID." AND fp_flag = 0");
        return $results;
    }

    public function getCompletedPaymentDetailsByCustomerID($customerID){
        $results = $this->getResultSet("payments", "*", ['customer_id' => $customerID,'fp_flag'=>1]);
        return $results;
    }

    public function getPaymentLogDetails(){
        $results = $this->getResultSet("payment_log", "*", []);
        return $results;
    }
    
    public function getReservationIncomeByDateForHotelService($start_date, $end_date, $userID){
        $results = $this->customQuery("SELECT SUM(price) AS totalPrice FROM customerrvdetails WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND payment = 'paid' AND rvType = 'service' AND sp_id = '".$userID."'"); 
        return $results;
    }

    public function getNoOfReservationsByDateForHotelService($start_date, $end_date, $user_id){
        $results = $this->customQuery(
            "SELECT DATE_FORMAT(rvDate,'%b') AS Month , COUNT(*) AS TotalReservations
            FROM customerrvdetails
            WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND sp_id = '".$user_id."' GROUP BY YEAR(rvDate), MONTH(rvDate)" );
         return $results;
    }



       public function getReservationDetailsByDateForService($start_date, $end_date, $userID){
        $results = $this->customQuery("SELECT * FROM customerrvdetails WHERE sp_id LIKE '%".$userID."%' AND rvDate BETWEEN '".$start_date."' AND '".$end_date."'");
        return $results;
    }

    public function getNoOfReservationsByDateForService($start_date, $end_date, $userID){
        $results = $this->customQuery(
            "SELECT DATE_FORMAT(rvDate,'%b') AS Month , COUNT(*) AS TotalReservationsofService
            FROM customerrvdetails
            WHERE sp_id LIKE '%".$userID."%' AND rvType='Service' AND rvDate BETWEEN '".$start_date."' AND '".$end_date."' GROUP BY YEAR(rvDate), MONTH(rvDate)" );
         return $results;
    }

    public function getNoOfReservationsByDateForPackages($start_date, $end_date, $userID){
        $results = $this->customQuery(
            "SELECT DATE_FORMAT(rvDate,'%b') AS Month , COUNT(*) AS TotalReservationsofPackages
            FROM customerrvdetails
            WHERE sp_id LIKE '%".$userID."%' AND rvType='Package' AND rvDate BETWEEN '".$start_date."' AND '".$end_date."' GROUP BY YEAR(rvDate), MONTH(rvDate)" );
         return $results;
    }

    public function getIncomeByDateForService($start_date, $end_date, $user_id){
        $results = $this->customQuery(
            "SELECT DATE_FORMAT(rvDate,'%b') AS Month ,SUM(price) AS totalPricePerMonth
            FROM customerrvdetails
            WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND sp_id = '".$user_id."' AND payment = 'paid' GROUP BY YEAR(rvDate), MONTH(rvDate)" );
         return $results;
    }

    public function getReservationDetailsForSelectedPackageByDate($start_date, $end_date){
        $results = $this->customQuery(
            "SELECT * FROM customerrvdetails WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND rvType = 'package'" );
         return $results;
    }

    public function getReservationIncomeByDateForPackage($start_date, $end_date){
        $results = $this->customQuery(
            "SELECT SUM(price) AS totalincome FROM customerrvdetails WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND rvType = 'package' AND payment = 'paid'" );
         return $results;
    }

    public function getNoOfReservationsByDateForPackage($start_date, $end_date){
        $results = $this->customQuery(
            "SELECT DATE_FORMAT(rvDate,'%b') AS Month , COUNT(*) AS TotalReservationsPackage
            FROM customerrvdetails
            WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND rvType = 'package' GROUP BY YEAR(rvDate), MONTH(rvDate)" );
         return $results;
    }

    public function getIncomeByDateForPackage($start_date, $end_date){
        $results = $this->customQuery(
            "SELECT DATE_FORMAT(rvDate,'%b') AS Month ,SUM(price) AS totalPricePerMonthPackage
            FROM customerrvdetails
            WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND rvType = 'package' AND payment = 'paid' GROUP BY YEAR(rvDate), MONTH(rvDate)" );
         return $results;
    }


    public function getReservationDetailsForSelectedServiceByDate($start_date, $end_date,$service_type){
        $results = $this->customQuery(
            "SELECT * FROM customerrvdetails WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND spType = '".$service_type."'" );
         return $results;
    }

    public function getReservationIncomeByDateForSelectedService($start_date, $end_date,$service_type){
        $results = $this->customQuery(
            "SELECT SUM(price) AS totalPriceSelectedService FROM customerrvdetails WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND spType = '".$service_type."' AND payment = 'paid'" );
         return $results;
    }

    public function getNoOfReservationsByDateForSelectedService($start_date, $end_date,$service_type){
        $results = $this->customQuery(
            "SELECT DATE_FORMAT(rvDate,'%b') AS Month , COUNT(*) AS TotalReservationsSelectedService
            FROM customerrvdetails
            WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND spType = '".$service_type."' GROUP BY YEAR(rvDate), MONTH(rvDate)" );
         return $results;
    }

    public function getIncomeByDateForSelectedService($start_date, $end_date,$service_type){
        $results = $this->customQuery(
            "SELECT DATE_FORMAT(rvDate,'%b') AS Month ,SUM(price) AS totalPricePerMonthSelectedService
            FROM customerrvdetails
            WHERE rvDate BETWEEN '".$start_date."' AND '".$end_date."' AND spType = '".$service_type."' AND payment = 'paid' GROUP BY YEAR(rvDate), MONTH(rvDate)" );
         return $results;
    }

    public function getReservationDetailsPackage()
    {
        $results = $this->getResultSet("customerrvdetails_with_prices", "*", []);

        return $results;
    }
    

    public function getPhotoPrice($rvID){
        $results = $this->customQuery("SELECT price_photo FROM customerrvdetails_with_prices WHERE rv_id = '".$rvID."' ");
        return $results;
    }

    public function getDecoPrice($rvID){
        $results = $this->customQuery("SELECT price_deco FROM customerrvdetails_with_prices WHERE rv_id = '".$rvID."' ");
        return $results;
    }

    public function getBandPrice($rvID){
        $results = $this->customQuery("SELECT price_band FROM customerrvdetails_with_prices WHERE rv_id = '".$rvID."' ");
        return $results;
    }

    public function getNumberOfServicesMonthly() {
        $months = [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12
        ];
        
        $results = $this->customQuery("SELECT MONTH(rvDate) AS month, COUNT(*) AS totalServices FROM customerrvdetails WHERE rvType = 'service' GROUP BY month");
        
        $reservations = [];
        
        foreach ($months as $month) {
            $reservations[$month-1] = 0;
        }
        
        foreach ($results as $row) {
            $month = $row->month;
            $reservations[$month-1] = $row->totalServices;
        }
        
        return $reservations;
    }

    public function getNumberOfPackagesMonthly(){
        $months = [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12
        ];

        $results = $this->customQuery("SELECT MONTH(rvDate) AS month, COUNT(*) AS totalPackages FROM customerrvdetails WHERE rvType = 'package' GROUP BY month");
        
        
        $reservations = [];
        
        foreach ($months as $month) {
            $reservations[$month-1] = 0;
        }
        

        foreach ($results as $row) {
            $month = $row->month;
            $reservations[$month-1] = $row->totalPackages;
        }
        
        return $reservations;
    }
}


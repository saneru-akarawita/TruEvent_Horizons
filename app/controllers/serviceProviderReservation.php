<?php

class serviceProviderReservation extends Controller
{
    public function __construct()
   {
      Session::validateSession([4,5,6,7]);
      $this->reservationModel = $this->model('ReservationModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->adminModel = $this->model('AdminModel');
      $this->photographyModel = $this->model('PhotographyModel');
      $this->userModel = $this->model('UserModel');
      $this->hotelModel = $this->model('HotelModel');
      $this->decoModel = $this->model('DecoModel');
      $this->bandModel = $this->model('BandModel');
   }

   public function confirmReservation(){
    
    if(isset($_GET['rv_id']) && isset($_GET['cus_id'])){
        $rv_id = $_GET['rv_id'];
        $cus_id = $_GET['cus_id'];
        
        $reservationDetails = $this->reservationModel->getReservationDetailsByReservationID($rv_id);
        $customerDetails = $this->customerModel->getCustomerDetailsByID($cus_id);

        $calendarData = [
            'sp_user_id' => $reservationDetails->sp_id,
            'title' => $reservationDetails->eventName,
            'start' => $reservationDetails->rvDate,
            'end' => $reservationDetails->rvDate,
            'rv_id' => $rv_id
        ];

        $paymentData = [
            'rv_id' => $rv_id,
            'customer_id' => $cus_id,
            'ad_price' => ($reservationDetails->price)/4,
            'full_price' => $reservationDetails->price    
        ];
        
        $rvData = [
            'rv_id' => $rv_id,
            'status' => 'confirm',
            'payment' => 'not-paid'
        ];

        $email = $customerDetails->email;

        $emailData = [
            'customer_name' => $customerDetails->fname." ".$customerDetails->lname,
            'event_name' => $reservationDetails->eventName,
        ];

        $this->reservationModel->beginTransaction();
        $this->reservationModel->addEvent($calendarData);
        $this->reservationModel->addPayment($paymentData);
        $this->reservationModel ->updateRvDetails($rvData);
        $this->reservationModel->commit();

        EMAIL::sendReservationConfirmToCustomer($email,$emailData);

        switch(Session::getUser("typeText")){
            case 'Hotel Manager':
                redirect('hotelDashboard/reservationlog');
                break;
            case 'Deco Company':
                redirect('decoDashboard/reservationlog');
                break;
            case 'Band Manager':
                redirect('bandDashboard/reservationlog');
                break;
            case 'Photography Company':
                redirect('photographyDashboard/reservationlog');
                break;
        }
    }

   }

   public function cancelReservation(){

    if(isset($_GET['rv_id']) && isset($_GET['cus_id'])){
        $rv_id = $_GET['rv_id'];
        $cus_id = $_GET['cus_id'];

        $reservationDetails = $this->reservationModel->getReservationDetailsByReservationID($rv_id);
        $customerDetails = $this->customerModel->getCustomerDetailsByID($cus_id);

        $email = $customerDetails->email;

        $emailData = [
            'customer_name' => $customerDetails->fname." ".$customerDetails->lname,
            'event_name' => $reservationDetails->eventName,
        ];

        $rvData = [
            'rv_id' => $rv_id,
            'status' => 'decline',
            'payment' => 'not-paid'
        ];
        
        $this->reservationModel ->updateRvDetails($rvData);  

        EMAIL::sendReservationCancelToCustomer($email,$emailData);

        switch(Session::getUser("typeText")){
            case 'Hotel Manager':
                redirect('hotelDashboard/reservationlog');
                break;
            case 'Deco Company':
                redirect('decoDashboard/reservationlog');
                break;
            case 'Band Manager':
                redirect('bandDashboard/reservationlog');
                break;
            case 'Photography Company':
                redirect('photographyDashboard/reservationlog');
                break;
        }
    }

   }

   //packages confirm and cancel

   public function confirmReservationPackage(){
    
    if(isset($_GET['rv_id']) && isset($_GET['cus_id'])){
        $rv_id = $_GET['rv_id'];
        $cus_id = $_GET['cus_id'];
        
        $reservationDetails = $this->reservationModel->getReservationDetailsByReservationID($rv_id);
        $customerDetails = $this->customerModel->getCustomerDetailsByID($cus_id);

        $calendarData = [
            'sp_user_id' => Session::getUser("id"),
            'title' => $reservationDetails->eventName,
            'start' => $reservationDetails->rvDate,
            'end' => $reservationDetails->rvDate,
            'rv_id' => $rv_id
        ];

        $paymentData = [
            'rv_id' => $rv_id,
            'customer_id' => $cus_id,
            'ad_price' => ($reservationDetails->price)/4,
            'full_price' => $reservationDetails->price    
        ];
        
        $packageConfirmationData = [
            'rv_id' => $rv_id,
            'no_of_confirmed_services' =>1,
            'sp_user_id' => Session::getUser("id"),
            'sp_user_type' => Session::getUser("typeText")
        ];

        $email = $customerDetails->email;

        $emailData = [
            'customer_name' => $customerDetails->fname." ".$customerDetails->lname,
            'event_name' => $reservationDetails->eventName,
        ];

        $this->reservationModel->beginTransaction();
        $this->reservationModel->addEvent($calendarData);
        $this->reservationModel ->updatePackageConfirmationDetails($packageConfirmationData);
        $this->reservationModel->commit();

        //if(reservation confirm nm price and email)
        $newreservationDetails = $this->reservationModel->getReservationDetailsByReservationID($rv_id);
        if($newreservationDetails->status =="confirm"){
            $this->reservationModel->addPayment($paymentData);
            EMAIL::sendReservationConfirmToCustomer($email,$emailData);
        }

        switch(Session::getUser("typeText")){
            case 'Hotel Manager':
                redirect('hotelDashboard/reservationlog');
                break;
            case 'Deco Company':
                redirect('decoDashboard/reservationlog');
                break;
            case 'Band Manager':
                redirect('bandDashboard/reservationlog');
                break;
            case 'Photography Company':
                redirect('photographyDashboard/reservationlog');
                break;
        }
    }

   }

   public function cancelReservationPackage(){

    if(isset($_GET['rv_id']) && isset($_GET['cus_id'])){
        $rv_id = $_GET['rv_id'];
        $cus_id = $_GET['cus_id'];

        $reservationDetails = $this->reservationModel->getReservationDetailsByReservationID($rv_id);
        $customerDetails = $this->customerModel->getCustomerDetailsByID($cus_id);

        $email = $customerDetails->email;

        $emailData = [
            'customer_name' => $customerDetails->fname." ".$customerDetails->lname,
            'event_name' => $reservationDetails->eventName,
        ];

        $eventData = [
            "sp_user_id" => $reservationDetails->sp_id,
            "title" => $reservationDetails->eventName,
            "start" => $reservationDetails->rvDate,
            "end" => $reservationDetails->rvDate,
            "rv_id" => $rv_id,
         ];

        $packageDeclineData = [
            'rv_id' => $rv_id,
            'no_of_declined_services' =>1,
        ];
        
        $this->reservationModel->beginTransaction();
        $this->reservationModel ->updatePackageDeclineDetails($packageDeclineData);
        $this->reservationModel->deleteEvent($eventData);
        $this->reservationModel->commit();
        EMAIL::sendReservationCancelToCustomer($email,$emailData);

        switch(Session::getUser("typeText")){
            case 'Hotel Manager':
                redirect('hotelDashboard/reservationlog');
                break;
            case 'Deco Company':
                redirect('decoDashboard/reservationlog');
                break;
            case 'Band Manager':
                redirect('bandDashboard/reservationlog');
                break;
            case 'Photography Company':
                redirect('photographyDashboard/reservationlog');
                break;
        }
    }

   }

}


?>
<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class CustomerDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([3]);
      $this->decoModel = $this->model('DecoModel');
      $this->hotelModel = $this->model('HotelModel');
      $this->userModel = $this->model('userModel');
      $this->serviceProviderModel = $this->model('ServiceProviderModel');
      $this->customerModel = $this->model('CustomerModel');
   }

   public function home()
   {
      $this->view('customer/customer-home');
   }
   public function addreservation()
   {
      redirect('CustomerReservation/addReservation');
   }

    public function viewreservationlog()
   {
      redirect('CustomerReservation/viewReservationLog');
   }

   public function viewpackages()
   {
      redirect('Packages/viewAllPackages');
   }

   public function viewservices()
   {
      $result1 = $this->serviceProviderModel->getServiceProviderDetails();
      $result2 = $this->decoModel->getDecoServiceDetails();
      $result3 = $this->hotelModel->getHotelServiceDetails();
      
      $result = array($result1, $result2, $result3);
      $this->view('customer/services',  $result);
   }

   public function profileSettings()
   {
      Session::validateSession([3]);
      $result = $this->userModel->getUser(Session::getUser("email"));
      $profile_id = Session::getUser("id");
      $profiledata = $this->customerModel->getCustomerDetailsByID($profile_id);
      $hashedPassword = $result->password;

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'email' => $result->email,
            'currentPassword' => trim($_POST['currentpw']),
            'newPassword1' => trim($_POST['newpw']),
            'newPassword2' => trim($_POST['confirmnewpw']),
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => ''
         ];

         $data['currentPassword_error'] = emptyCheck($data['currentPassword']);
         $data['newPassword_error'] = emptyCheck($data['newPassword1']);
         $data['confirmPassword_error'] = emptyCheck($data['newPassword2']);

         $resArr = array($data,$profiledata);

         if (!empty($data['currentPassword_error']) || !empty($data['newPassword_error']) || !empty($data['confirmPassword_error'])) //have errors
         {
            $this->view('customer/cust_profileSettings', $resArr);
         }

         else //no errors
         {
            if (password_verify($data['currentPassword'], $hashedPassword))
            {
               if ($data['newPassword1'] != $data['newPassword2'])
               {
                  $data['confirmPassword_error'] = "New Passwords dont't match";
                  $resArr = array($data,$profiledata);
                  $this->view('customer/cust_profileSettings', $resArr);
               }
               if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
               {
                  $this->userModel->updatePassword($data['email'], $data['newPassword1']);
                  Toast::setToast(1, "Password changed successfully", "");
                  $this->view('customer/cust_profileSettings', $resArr);
               }
            }
            else
            {
               $data['currentPassword_error'] = "Incorrect password";
               $resArr = array($data,$profiledata);
               $this->view('customer/cust_profileSettings', $resArr);
            }

            $this->view('customer/cust_profileSettings', $resArr);
         }
      }
      else
      {
         $data = [
            'email' => $result->email,
            'currentPassword' => '',
            'newPassword1' => '',
            'newPassword2' => '',
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => ''
         ];

         $resArr = array($data,$profiledata);
         $this->view('customer/cust_profileSettings', $resArr);
      }
   }

   public function provideFeedback()
   {
      $this->view('customer/customer_feedback','');
   }

   public function addAccountDetails()
   {
      $this->view('customer/add-account-details', '');
   }

   public function advancePaymentSuccess()
   {
      $this->view('customer/advance-payment-success', '');
   }

   public function chat()
   {
      $this->view('customer/chat', '');
   }

   public function makeAdvancePayment()
   {
      $this->view('customer/make-advance-payment', '');
   }

   public function makeFullPayment()
   {
      $this->view('customer/make-full-payment', '');
   }

   public function totalPaymentSuccess()
   {
      $this->view('customer/total-payment-success', '');
   }

   public function logout()
   {
      redirect('User/signout');
   }

}

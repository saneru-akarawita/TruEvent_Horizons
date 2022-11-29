<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class AdminDashboard extends Controller
{
   public function __construct()
   {
      //Session::validateSession([2]);
   }

   public function home()
   {
      $this->view('admin/admin-home');
   }
   public function addpackages()
   {
      redirect('Packages/addNewPackage');
   }
   public function viewpackages()
   {
      redirect('Packages/viewAllPackages');
   }

   public function profileSettings()
   {
      // $customerID = Session::getUser("id");
      // $profileData = $this->customerModel->getCustomerDetailsByCusID($customerID)[0];
      // if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'FILES')
      // {
      //    if (!$_FILES['custimage']['name'])
      //    {
      //       $img_upload_path = $profileData->imgPath;
      //    }
      //    else
      //    {
      //       $img_name = " ";
      //       $new_img_name =  " ";
      //       $img_name = $_FILES['custimage']['name'];
      //       $img_size = $_FILES['custimage']['size'];
      //       $tmp_name = $_FILES['custimage']['tmp_name'];
      //       $error = $_FILES['custimage']['error'];
      //       $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
      //       $img_ex_lc = strtolower($img_extension);
      //       $allowed_extensions = array("jpg", "jpeg", "png");
      //       if ($error == 0)
      //       {
      //          if (in_array($img_ex_lc, $allowed_extensions))
      //          {
      //             $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
      //             $img_upload_path = '../public/imgs/customerImgs/' . $new_img_name;
      //             move_uploaded_file($tmp_name, $img_upload_path);
      //          }
      //       }
      //    }





      //    $data = [

      //       'fName' => isset($_POST['fName']) ? trim($_POST['fName']) : '',
      //       'lName' =>  isset($_POST['lName']) ? trim($_POST['lName']) : '',
      //       'gender' => isset($_POST['gender']) ? trim($_POST['gender']) : '',
      //       'imgPath' => isset($new_img_name) ? $new_img_name : '',
      //       'mobileNo' => isset($_POST['mobileNo']) ? trim($_POST['mobileNo']) : '',
      //       'fNameError' => '',
      //       'lNameError' => '',
      //       'contactNoError' => '',
      //       'haveError' => 0,
      //       'oldProfImg' => isset($new_img_name) ? $new_img_name : $profileData->imgPath

      //    ];

      //    $data['fNameError'] = emptyCheck($data['fName']);
      //    $data['lNameError'] = emptyCheck($data['lName']);
      //    $data['contactNoError'] = emptyCheck($data['mobileNo']);
      //    // print_r($data);
      //    if (empty($data['contactNoError']))
      //    {
      //       $data['contactNoError'] = validateMobileNo($data['mobileNo']);
      //       if ($data['mobileNo'] != Session::getUser("mobileNo"))
      //       {
      //          $mobileNoAlreadyRegisterd = $this->UserModel->checkLoginExists($data['mobileNo']);
      //       }
      //       else
      //       {
      //          $mobileNoAlreadyRegisterd = 'false';
      //       }

      //       if ($mobileNoAlreadyRegisterd == 'true')
      //       {
      //          $data['contactNoError'] = 'Mobile number already registered.';
      //          $data['haveError'] = 1;
      //       }
      //    }
      //    // die();
      //    if (empty($data['fNameError']) && empty($data['lNameError']) && empty($data['contactNoError']))
      //    {
      //       if (!$data['imgPath'])
      //       {
      //          $data['imgPath'] = $profileData->imgPath;
      //       }


      //       $this->customerModel->beginTransaction();
      //       $this->customerModel->updateCustomerInfo($data, Session::getUser("id"));
      //       $this->customerModel->updateUserTableMobileNo($data['mobileNo'], Session::getUser("mobileNo"));
      //       if ($data['mobileNo'] != Session::getUser("mobileNo"))
      //       {
      //          $this->customerModel->deleteOtpRecords(Session::getUser("mobileNo"));
      //       }
      //       $this->customerModel->commit();


      //       Toast::setToast(1, "Profile details successfully updated.", "");
      //    }
      //    else
      //    {
      //       $data['haveError'] = 1;
      //    }

      //    $this->view('customer/cust_profileSettings', $data);
      // }
      // else
      // {
      //    $data = [

      //       'fName' => $profileData->fName,
      //       'lName' => $profileData->lName,
      //       'gender' => $profileData->gender,
      //       'imgPath' => '',
      //       'mobileNo' => $profileData->mobileNo,
      //       'fNameError' => '',
      //       'lNameError' => '',
      //       'haveError' => 0,
      //       'contactNoError' => '',
      //       'oldProfImg' => $profileData->imgPath

      //    ];

         $this->view('admin/admin_profileSettings', $data=[]);
      //}
   }

   public function reviewComplaints(){
      $this->view('admin/reviewComplaints');
   }

   public function logout()
   {
      redirect('User/signout');
   }

}

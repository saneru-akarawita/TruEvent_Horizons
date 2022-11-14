<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class MangDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([3]);
      $this->serviceModel = $this->model('ServiceModel');
      $this->staffModel = $this->model('StaffModel');
      $this->leaveModel = $this->model('LeaveModel');
      $this->reservationModel = $this->model('reservationModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->leaveModel = $this->model('LeaveModel');
   }
   public function home()
   {
      redirect('MangDashboard/overview');
   }
   public function overview()
   {
      Session::validateSession([3]);

      $totalIncome = $this->reservationModel->getTotalIncomeForMangOverview();
      $upcommingReservations = $this->reservationModel->getUpcommingReservationsNoForMangOverview();
      $availableServices = $this->serviceModel->getAvailableServiceCount();
      $availableServiceProviders = $this->serviceModel->getAvailableServiceProvidersCount();
      $activeCustomers = $this->customerModel->getActiveCustomerCount();
      $activeReceptionists = $this->staffModel->getReceptionistCount();
      $activeManagers = $this->staffModel->getManagerCount();
      $pendingLeaveRequests = $this->leaveModel->getPendingLeaveRequestCount();
      // $totalIncomeForChart = $this->reservationModel->getMonthlyIncomeAndTotalReservationsForMangOverviewCharts();

      $mangOverviewDetails = [
         'totalIncome' => $totalIncome,
         'upcommingReservations' => $upcommingReservations,
         'availableServices' => $availableServices,
         'availableServiceProviders' => $availableServiceProviders,
         'activeCustomers' => $activeCustomers,
         'activeReceptionists' => $activeReceptionists,
         'activeManagers' => $activeManagers,
         'pendingLeaveRequests' => count($pendingLeaveRequests),
         // 'totalIncomeForChart' => $totalIncomeForChart,
      ];

      $this->view('manager/mang_overview',  $mangOverviewDetails);
   }
   public function overviewChart1()
   {
      $totalIncomeForChart = $this->reservationModel->getMonthlyIncomeAndTotalReservationsForMangOverviewCharts();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($totalIncomeForChart));
   }
   public function overviewChart2()
   {
      $totalReservationsForChart = $this->reservationModel->getMonthlyIncomeAndTotalReservationsForMangOverviewCharts();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($totalReservationsForChart));
   }

   public function reservations()
   {
      // Session::validateSession([3]);
      $this->view('manager/mang_reservations');
   }

   public function customers()
   {
      // Session::validateSession([3]);
      $this->view('manager/mang_customers');
   }
   public function staffMembers()
   {
      // Session::validateSession([3]);
      $staffDetails = $this->staffModel->getAllStaffDetails();

      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('manager/mang_staffMembers', $GetStaffArray);
   }
   public function resources()
   {
      // Session::validateSession([3]);
      $resourceDetails = $this->serviceModel->getResourceDetails();

      $data = [
         'resource' => $resourceDetails
      ];
      $this->view('manager/mang_resources', $data);
   }
   public function leaveRequests($sProvID = "all", $leaveDate = "all", $resSProvID = "all", $leaveType = "all", $lStatus = "all")
   {
      Session::validateSession([3]);
      $leaveDetails = $this->leaveModel->getAllLeaveRequests($sProvID, $leaveDate, $resSProvID, $leaveType, $lStatus);
      $evidanceLimit = $this->leaveModel->getEvidenceLimit();
      $serProvsDetails = $this->serviceModel->getServiceProviderDetails();
      $managersDetails = $this->serviceModel->getAllManagersDetails();


      $allLeaveTableDetails = [
         'leaveDetails' => $leaveDetails,
         'selectedsProvID' => $sProvID,
         'selectedleaveDate' => $leaveDate,
         'selectedresSProvID' => $resSProvID,
         'selectedleaveType' => $leaveType,
         'selectedlStatus' => $lStatus,
         'serProvsDetails' => $serProvsDetails,
         'managersDetails' => $managersDetails
      ];

      date_default_timezone_set("Asia/Colombo");
      $today = date('Y-m-d');

      foreach ($leaveDetails as $MLDetails)
      {
         $date1 = date_create($today);
         $date2 = date_create($MLDetails->leaveDate);
         $diff = date_diff($date2, $date1);
         $diff2 = $diff->format("%R%a days");
         print_r($diff->days);
         if ($MLDetails->status == 2)
         {
            if ($MLDetails->leaveType == 2)
            {
               if ($MLDetails->leaveDate < $today && $diff->days >= $evidanceLimit)
               {
                  $this->leaveModel->changeMedicalToCasual($MLDetails->staffID, $MLDetails->leaveDate);
               }
            }
            if ($MLDetails->leaveType == 1)
            {
               if ($MLDetails->leaveDate < $today)
               {
                  $this->leaveModel->changeCasualPendingToRemove($MLDetails->staffID, $MLDetails->leaveDate);
               }
            }
         }
      }

      $this->view('manager/mang_subLeaveRequests',  $allLeaveTableDetails);
   }
   public function takeLeave($leaveType = "all", $leaveDate = "all", $markedDate = "all")
   {
      Session::validateSession([3]);

      $mangCasualLeaveLimit = $this->leaveModel->getmangCasualLeaveLimit();
      $mangMedicalLeaveLimit = $this->leaveModel->getmangMedicalLeaveLimit();

      $mangCasualLeaveCount = $this->leaveModel->getMangCurrentMonthLeaveCount(Session::getUser("id"), 1);
      $mangMedicalLeaveCount = $this->leaveModel->getMangCurrentMonthLeaveCount(Session::getUser("id"), 2);

      $remainingCasual = $mangCasualLeaveLimit - $mangCasualLeaveCount;
      $remainingMedical = $mangMedicalLeaveLimit - $mangMedicalLeaveCount;

      $managerLeaveDetails = $this->leaveModel->getAllManagerLeaves($leaveType, $leaveDate, $markedDate);

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'managerLeaveDetails' => $managerLeaveDetails,
            'date' => trim($_POST['mangDate']),
            'leavetype' => isset($_POST['mangLeaveType']) ? trim($_POST['mangLeaveType']) : '',
            'reason' => trim($_POST['mangLeaveReason']),
            'date_error' => '',
            'type_error' => '',
            'reason_error' => '',
            'dateValidationError' => '',
            'staffID' => Session::getUser("id"),
            'haveErrors' => 0,
            'haveErrors2' => 0,
            'dateValidationMsg' => '',
            'remainingCasual' => $remainingCasual,
            'remainingMedical' => $remainingMedical,

            'selectedLeaveType' => $leaveType,
            'selectedLeaveDate' => $leaveDate,
            'selectedmarkedDate' => $markedDate,
         ];


         if ($_POST['action'] == "addleave")
         {
            $data['date_error'] = emptyCheck($data['date']);
            $data['reason_error'] = emptyCheck($data['reason']);
            $data['type_error'] = emptyCheck($data['leavetype']);

            if (empty($data['date_error']) && empty($data['reason_error']) && empty($data['type_error']))
            {
               $this->leaveModel->addMangLeave($data);
               Toast::setToast(1, "Leave Added Successfully!!!", "");
               redirect('MangDashboard/takeLeave');
            }
            else
            {
               $data['haveErrors'] = 1;
               $this->view('manager/mang_subTakeLeave', $data);
            }
         }
         else if ($_POST['action'] == "cancel")
         {
            $data['haveErrors'] = 0;
            redirect('MangDashboard/takeLeave');
         }
         else
         {
            die("something went wrong");
         }
      }
      else
      {
         $data = [
            'managerLeaveDetails' => $managerLeaveDetails,
            'date' => '',
            'leavetype' => '',
            'reason' => '',
            'date_error' => '',
            'reason_error' => '',
            'type_error' => '',
            'dateValidationError' => '',
            'staffID' => Session::getUser("id"),
            'haveErrors' => 0,
            'haveErrors2' => 0,
            'dateValidationMsg' => '',
            'typeValidationMsg' => '',
            'remainingCasual' => $remainingCasual,
            'remainingMedical' => $remainingMedical,


            'selectedLeaveType' => $leaveType,
            'selectedLeaveDate' => $leaveDate,
            'selectedmarkedDate' => $markedDate,
         ];

         $this->view('manager/mang_subTakeLeave', $data);
      }
   }
   public function getOneMangLeaveDetails($leaveID)
   {
      $userID = Session::getUser("id");

      $managerOneLeaveDetails = $this->leaveModel->getOneManagerLeave($leaveID, $userID);

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($managerOneLeaveDetails));
   }
   public function updateTakenLeave($leaveID)
   {
      Session::validateSession([3]);
      $userID = Session::getUser("id");
      $mangCasualLeaveLimit = $this->leaveModel->getmangCasualLeaveLimit();
      $mangMedicalLeaveLimit = $this->leaveModel->getmangMedicalLeaveLimit();

      $mangCasualLeaveCount = $this->leaveModel->getMangCurrentMonthLeaveCount(Session::getUser("id"), 1);
      $mangMedicalLeaveCount = $this->leaveModel->getMangCurrentMonthLeaveCount(Session::getUser("id"), 2);

      $remainingCasual = $mangCasualLeaveLimit - $mangCasualLeaveCount;
      $remainingMedical = $mangMedicalLeaveLimit - $mangMedicalLeaveCount;

      $managerLeaveDetails = $this->leaveModel->getAllManagerLeaves($a = null, $b = null, $c = null,);

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'managerLeaveDetails' => $managerLeaveDetails,
            'date' => trim($_POST['mangDate']),
            'leavetype' => isset($_POST['mangLeaveType2']) ? trim($_POST['mangLeaveType2']) : '',
            'reason' => trim($_POST['mangLeaveReason']),
            'date_error' => '',
            'type_error' => '',
            'reason_error' => '',
            'dateValidationError' => '',
            'staffID' => Session::getUser("id"),
            'haveErrors2' => 0,
            'dateValidationMsg' => '',
            'remainingCasual' => $remainingCasual,
            'remainingMedical' => $remainingMedical,

         ];

         if ($_POST['action'] == "updateleave")
         {
            $data['date_error'] = emptyCheck($data['date']);
            $data['reason_error'] = emptyCheck($data['reason']);
            $data['type_error'] = emptyCheck($data['leavetype']);

            if (empty($data['date_error']) && empty($data['reason_error']) && empty($data['type_error']))
            {
               $this->leaveModel->updateMangLeave($data, $userID, $leaveID);
               Toast::setToast(1, "Leave Updated Successfully!!!", "");
               redirect('MangDashboard/takeLeave');
            }
            else
            {
               $data['haveErrors2'] = 1;
               $this->view('manager/mang_subTakeLeave', $data);
            }
         }
         else if ($_POST['action'] == "cancel")
         {
            $data['haveErrors2'] = 0;
            redirect('MangDashboard/takeLeave');
         }
         else
         {
            die("something went wrong");
         }
      }
      else
      {
         $data = [
            'managerLeaveDetails' => $managerLeaveDetails,
            'date' => '',
            'leavetype' => '',
            'reason' => '',
            'date_error' => '',
            'reason_error' => '',
            'type_error' => '',
            'dateValidationError' => '',
            'staffID' => Session::getUser("id"),
            'haveErrors2' => 0,
            'dateValidationMsg' => '',
            'typeValidationMsg' => '',
            'remainingCasual' => $remainingCasual,
            'remainingMedical' => $remainingMedical,

         ];
         $this->view('manager/mang_subTakeLeave', $data);
      }
   }
   public function deleteLeave($leaveDate)
   {
      $staffID = Session::getUser("id");
      $this->leaveModel->deleteMangLeave($leaveDate, $staffID);
      Toast::setToast(1, "Leave Deleted Successfully!!!", "");
      redirect('MangDashboard/takeLeave');
   }
   public function approveLeaveRequestsFromTabel($staffID, $leaveDate, $responce)
   {
      // print_r($staffID);
      // print_r($leaveDate);

      // die('hhhs');

      $this->leaveModel->addLeaveResponce($responce, $staffID, $leaveDate);
      redirect('MangDashboard/leaveRequests');
   }
   public function approveRejectLeaveRequests($staffID, $leaveDate, $responce)
   {
      if ($responce == 1)
      {
         $results = $this->leaveModel->addLeaveResponce($responce, $staffID, $leaveDate);
      }
      elseif ($responce == 0)
      {
         $results = $this->leaveModel->addLeaveResponce($responce, $staffID, $leaveDate);
      }
      if ($results)
         Toast::setToast(1, "Responded successfully", "");
      else
         Toast::setToast(0, "Responding failed", "");

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($results));
   }
}

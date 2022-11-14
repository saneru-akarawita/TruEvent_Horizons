<?php
class Services extends Controller
{
   public function __construct()
   {
      $this->ServiceModel = $this->model('ServiceModel');
      $this->ReservationModel = $this->model('reservationModel');
      $this->CustomerModel = $this->model('CustomerModel');
   }

   public function viewAllServices($sID = "all", $sType = "all", $sStatus = "all")
   {
      Session::validateSession([2, 3, 4]);

      $serviceNames = $this->ServiceModel->getServiceDetails();
      $serviceTypes = $this->ServiceModel->getServiceTypeDetails();
      $sDetails = $this->ServiceModel->getServiceDetailsWithFilters($sID, $sType, $sStatus);

      $GetServicesArray = [
         'services' => $sDetails,
         'selectedSID' => $sID,
         'selectedType' => $sType,
         'selectedStatus' => $sStatus,
         'sNameList' => $serviceNames,
         'sTypeList' => $serviceTypes,
      ];

      $this->view('common/allServicesTable',  $GetServicesArray);
   }

   public function addNewService()
   {
      $slotNo = 0;
      $sProvGetArray = $this->getServiceProvider();
      $sTypeGetArray = $this->getServiceType();
      $sResGetArray = $this->getResource();

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'name' => trim($_POST['sName']),

            'customerCategory' => isset($_POST['serviceCusCategory']) ? trim($_POST['serviceCusCategory']) : '',

            'sSelectedType' => isset($_POST['serviceType']) ? trim($_POST['serviceType']) : '',
            'sNewType' => trim($_POST['sNewType']),
            'sSelectedProv' => isset($_POST['serProvCheckbox']) ? $_POST['serProvCheckbox'] : '',
            'price' => trim($_POST['sPrice']),

            'slot1Duration' => isset($_POST['slot1Duration']) ? trim($_POST['slot1Duration']) : '',
            'slot2Duration' => isset($_POST['slot2Duration']) ? trim($_POST['slot2Duration']) : '',
            'slot3Duration' => isset($_POST['slot3Duration']) ? trim($_POST['slot3Duration']) : '',
            'interval1Duration' => isset($_POST['interval1Duration']) ? trim($_POST['interval1Duration']) : '',
            'interval2Duration' => isset($_POST['interval2Duration']) ? trim($_POST['interval2Duration']) : '',

            'sSelectedResCount1' => isset($_POST['resourceCount1']) ? ($_POST['resourceCount1']) : [],
            'sSelectedResCount2' => isset($_POST['resourceCount2']) ? ($_POST['resourceCount2']) : [],
            'sSelectedResCount3' => isset($_POST['resourceCount3']) ? ($_POST['resourceCount3']) : [],

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],

            'sName_error' => '',
            'sSelectedCusCategory_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',

            'sSlot1Duration_error' => '',
            'sSlot2Duration_error' => '',
            'sSlot3Duration_error' => '',
            'interval1Duration_error' => '',
            'interval2Duration_error' => '',

            'sSelectedResCount1_error' => '',
            'sSelectedResCount2_error' => '',
            'sSelectedResCount3_error' => '',

         ];

         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;

         if ($_POST['action'] == "addService")
         {

            if (empty($data['name']))
            {
               $data['sName_error'] = "Please enter service name";
            }
            if (empty($data['customerCategory']))
            {
               $data['sSelectedCusCategory_error'] = "Please select customer category";
            }
            if (empty($data['sSelectedType']) && empty($data['sNewType']))
            {
               $data['sSelectedAllType_error'] = "Please select or enter service type";
            }
            if (!empty($data['sSelectedType']) && !empty($data['sNewType']))
            {
               $data['sSelectedAllType_error'] = "Please clear one from selected or entered service type";
            }
            if (empty($data['sSelectedProv']))
            {
               $data['sSelectedSProve_error'] = "Please select service provider";
            }
            if (empty($data['price']))
            {
               $data['sPrice_error'] = "Please enter service price";
            }
            elseif (!is_numeric($data['price']))
            {
               $data['sPrice_error'] = "Please enter a numeric value for price";
            }
            elseif ($data['price'] < 0)
            {
               $data['sPrice_error'] = "Please enter a valid price";
            }
            if (empty($data['slot1Duration']))
            {
               $data['sSlot1Duration_error'] = "Please enter slot duration";
            }

            if (!empty($data['slot3Duration']) || !empty($data['sSelectedResCount3']) || !empty($data['interval2Duration']))
            {
               for ($i = 2; $i < 4; $i++)
               {
                  if (empty($data['slot' . ($i) . 'Duration']))
                  {
                     $data['sSlot' . ($i) . 'Duration_error'] = "Please enter slot duration";
                  }
                  if (empty($data['interval' . ($i - 1) . 'Duration']))
                  {
                     $data['interval' . ($i - 1) . 'Duration_error'] = "Please enter interval duration";
                  }
               }
            }
            elseif (!empty($data['slot2Duration']) || !empty($data['sSelectedResCount2']) || !empty($data['interval1Duration']))
            {
               for ($i = 2; $i < 3; $i++)
               {
                  if (empty($data['slot' . ($i) . 'Duration']))
                  {
                     $data['sSlot' . ($i) . 'Duration_error'] = "Please enter slot duration";
                  }
                  if (empty($data['interval' . ($i - 1) . 'Duration']))
                  {
                     $data['interval' . ($i - 1) . 'Duration_error'] = "Please enter interval duration";
                  }
               }
            }

            if (empty($data['sName_error']) && empty($data['sSelectedCusCategory_error']) && empty($data['sPrice_error']) && empty($data['sSelectedAllType_error']) && empty($data['sSelectedSProve_error']) && empty($data['sSlot1Duration_error']) && empty($data['sSlot2Duration_error']) && empty($data['sSlot3Duration_error']) && empty($data['interval1Duration_error']) && empty($data['interval2Duration_error']))
            {
               if ($data['slot2Duration'] != NULL && $data['slot3Duration'] == NULL)
               {
                  $slotNo = 1;
               }
               elseif ($data['slot2Duration'] != NULL && $data['slot3Duration'] != NULL)
               {
                  $slotNo = 2;
               }

               $this->ServiceModel->beginTransaction();
               $this->ServiceModel->addService($data, $slotNo);
               $this->ServiceModel->addServiceProvider($data);
               $this->ServiceModel->addTimeSlot($data, $slotNo);
               $this->ServiceModel->addIntervalTimeSlot($data, $slotNo);
               $this->ServiceModel->addResourcesToService($data, $slotNo);
               $this->ServiceModel->commit();

               Toast::setToast(1, "Service Added Successfully!!!", "");

               redirect('Services/viewAllServices');
            }
            else
            {
               $this->view('manager/mang_serviceAdd', $data);
            }
         }
         else
         {
            die("Something went wrong");
         }
      }
      else
      {

         $data = [
            'name' => '',
            'customerCategory' => '',
            'sSelectedType' => '',
            'sNewType' => '',
            'price' => '',
            'sSelectedProv' => [],

            'slot1Duration' => '',
            'slot2Duration' => '',
            'slot3Duration' => '',
            'interval1Duration' => '',
            'interval2Duration' => '',

            'sSelectedResourse' => '',
            'sSelectedResCount1' => '',
            'sSelectedResCount2' => '',
            'sSelectedResCount3' => '',

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],

            'sName_error' => '',
            'sSelectedCusCategory_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',
            'sSlot1Duration_error' => '',
            'sSelectedResCount1_error' => '',
         ];


         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;

         $this->view('manager/mang_serviceAdd', $data);
      }
   }

   public function getServiceProvider()
   {
      $sProv = $this->ServiceModel->getServiceProviderDetails();
      return $sProv;
   }

   public function getServiceProvidersByService($serviceID)
   {
      Session::validateSession([6]);
      $serviceProvidersList = $this->ServiceModel->getServiceProvidersByService($serviceID);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceProvidersList));

      // return json_encode($serviceProvidersList, JSON_NUMERIC_CHECK);
   }

   public function getServiceDurationCategoryPrice($serviceID)
   {
      Session::validateSession([4, 6]);

      $gender = ['', 'Male', 'Female', 'Male & Female'];

      $data =  $this->ServiceModel->getServiceDurationCategoryPrice($serviceID);
      $serviceDuration = $data->totalDuration;
      // $serviceDuration = DateTimeExtended::minsToDuration($serviceDuration);
      $custCategory = $gender[$data->customerCategory];
      $price = $data->price;

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode([$serviceDuration, $custCategory, $price]));
   }

   public function getServiceType()
   {
      $sType = $this->ServiceModel->getServiceTypeDetails();
      return $sType;
   }

   public function getResource()
   {
      $sResource = $this->ServiceModel->getResourceDetails();
      return $sResource;
   }

   public function getResourceForSlots()
   {
      $sResource = $this->ServiceModel->getResourceDetails();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($sResource));
   }

   public function passResourcesToSlot($sResGetArray)
   {
      $_SESSION = $sResGetArray;
      $sizeOfSession = sizeof($_SESSION);

      die("hi");
   }
   public function getReservationListOfCheckedSPRovList($details1, $details2)
   {
      $serProvDetails = $this->ReservationModel->getUpcommingReservationsForSerProv($details1, $details2);

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serProvDetails));
   }
   public function getReservationListOfSelectedService($serviceID)
   {
      $serviceDetails = $this->ReservationModel->getUpcommingReservationsForService($serviceID);

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceDetails));
   }
   public function viewService($serviceID)
   {
      $sNoofSlots = $this->ServiceModel->getNoofSlots($serviceID);
      $sOneDetails = $this->ServiceModel->getOneServiceDetail($serviceID);
      $sSprovDetails = $this->ServiceModel->getOneServicesSProvDetail($serviceID);

      for ($i = 1; $i < 4; $i++)
      {
         $slotNo = $i;
         ${'sSlot' . $i . 'Duration'} = $this->ServiceModel->getSlotDuration($serviceID, $slotNo);
         ${'sAllocatedResDetailsSlot' . $i} = $this->ServiceModel->getAllocatedResourceDetailsofSlot($serviceID, $slotNo);
      }
      for ($i = 1; $i < 3; $i++)
      {
         $slotNo = $i + 1;
         ${'sInterval' . ($i) . 'Duration'} = $this->ServiceModel->getIntervalDuration($serviceID, $slotNo);
      }

      $GetOneServicesArray = [
         'noofSlots' => $sNoofSlots,
         'services' => $sOneDetails,
         'sProv' => $sSprovDetails,

         'sSlot1Duration' => $sSlot1Duration,
         'sSlot2Duration' => $sSlot2Duration,
         'sSlot3Duration' => $sSlot3Duration,

         'sInterval1Duration' => $sInterval1Duration,
         'sInterval2Duration' => $sInterval2Duration,

         'sResS1' => $sAllocatedResDetailsSlot1,
         'sResS2' => $sAllocatedResDetailsSlot2,
         'sResS3' => $sAllocatedResDetailsSlot3,

      ];

      $this->view('manager/mang_serviceView', $GetOneServicesArray);
   }

   public function updateService($serviceID)
   {
      $serviceDetails = $this->ServiceModel->getOneServiceDetail($serviceID);
      $serProvDetails = $this->ServiceModel->getOneServicesSProvDetail($serviceID);

      $noofSlots = $this->ServiceModel->getNoofSlots($serviceID);

      for ($i = 1; $i < 4; $i++)
      {
         $slotNo = $i;
         ${'slot' . $i . 'Details'} = $this->ServiceModel->getSlotDuration($serviceID, $slotNo);
         ${'resDetailsSlot' . $i} = $this->ServiceModel->getAllocatedResourceDetailsofSlot($serviceID, $slotNo);
      }
      for ($i = 1; $i < 3; $i++)
      {
         $slotNo = $i + 1;
         ${'interval' . ($i) . 'Details'} = $this->ServiceModel->getIntervalDuration($serviceID, $slotNo);
      }

      $sProvGetArray = $this->getServiceProvider();
      $sTypeGetArray = $this->getServiceType();
      $sResGetArray = $this->getResource();

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'name' => trim($_POST['sName']),

            'customerCategory' => isset($_POST['serviceCusCategory']) ? trim($_POST['serviceCusCategory']) : '',

            'sSelectedType' => isset($_POST['serviceType']) ? trim($_POST['serviceType']) : '',
            'sNewType' => trim($_POST['sNewType']),
            'sSelectedProv' => isset($_POST['serProvCheckbox']) ? $_POST['serProvCheckbox'] : '',
            'price' => trim($_POST['sPrice']),

            'slot1Duration' => isset($_POST['slot1Duration']) ? trim($_POST['slot1Duration']) : '',
            'slot2Duration' => isset($_POST['slot2Duration']) ? trim($_POST['slot2Duration']) : '',
            'slot3Duration' => isset($_POST['slot3Duration']) ? trim($_POST['slot3Duration']) : '',
            'interval1Duration' => isset($_POST['interval1Duration']) ? trim($_POST['interval1Duration']) : '',
            'interval2Duration' => isset($_POST['interval2Duration']) ? trim($_POST['interval2Duration']) : '',

            'sSelectedResCount1' => isset($_POST['resourceCount1']) ? ($_POST['resourceCount1']) : [],
            'sSelectedResCount2' => isset($_POST['resourceCount2']) ? ($_POST['resourceCount2']) : [],
            'sSelectedResCount3' => isset($_POST['resourceCount3']) ? ($_POST['resourceCount3']) : [],

            'serviceDetails' => $serviceDetails[0],
            'serProvDetails' => $serProvDetails,
            'noofSlots' => $noofSlots,
            'resDetailsSlot1' => $resDetailsSlot1,
            'resDetailsSlot2' => $resDetailsSlot2,
            'resDetailsSlot3' => $resDetailsSlot3,

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],

            'sName_error' => '',
            'sSelectedCusCategory_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',

            'sSlot1Duration_error' => '',
            'sSlot2Duration_error' => '',
            'sSlot3Duration_error' => '',
            'interval1Duration_error' => '',
            'interval2Duration_error' => '',

            'sSelectedResCount1_error' => '',
            'sSelectedResCount2_error' => '',
            'sSelectedResCount3_error' => '',

         ];

         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;

         if ($_POST['action'] == "updateService")
         {
            if (empty($data['name']))
            {
               $data['sName_error'] = "Please enter service name";
            }
            if (empty($data['customerCategory']))
            {
               $data['sSelectedCusCategory_error'] = "Please select customer category";
            }
            if (empty($data['sSelectedType']) && empty($data['sNewType']))
            {
               $data['sSelectedAllType_error'] = "Please select or enter service type";
            }
            if (!empty($data['sSelectedType']) && !empty($data['sNewType']))
            {
               $data['sSelectedAllType_error'] = "Please clear one from selected or entered service type";
            }
            if (empty($data['sSelectedProv']))
            {
               $data['sSelectedSProve_error'] = "Please select service provider";
            }
            if (empty($data['price']))
            {
               $data['sPrice_error'] = "Please enter service price";
            }
            elseif (!is_numeric($data['price']))
            {
               $data['sPrice_error'] = "Please enter a numeric value for price";
            }
            elseif ($data['price'] < 0)
            {
               $data['sPrice_error'] = "Please enter a valid price";
            }
            if (empty($data['slot1Duration']))
            {
               $data['sSlot1Duration_error'] = "Please enter slot duration";
            }

            if (!empty($data['slot3Duration']) || !empty($data['sSelectedResCount3']) || !empty($data['interval2Duration']))
            {
               for ($i = 2; $i < 4; $i++)
               {
                  if (empty($data['slot' . ($i) . 'Duration']))
                  {
                     $data['sSlot' . ($i) . 'Duration_error'] = "Please enter slot duration";
                  }
                  if (empty($data['interval' . ($i - 1) . 'Duration']))
                  {
                     $data['interval' . ($i - 1) . 'Duration_error'] = "Please enter interval duration";
                  }
               }
            }
            elseif (!empty($data['slot2Duration']) || !empty($data['sSelectedResCount2']) || !empty($data['interval1Duration']))
            {
               for ($i = 2; $i < 3; $i++)
               {
                  if (empty($data['slot' . ($i) . 'Duration']))
                  {
                     $data['sSlot' . ($i) . 'Duration_error'] = "Please enter slot duration";
                  }
                  if (empty($data['interval' . ($i - 1) . 'Duration']))
                  {
                     $data['interval' . ($i - 1) . 'Duration_error'] = "Please enter interval duration";
                  }
               }
            }

            if (empty($data['sName_error']) && empty($data['sSelectedCusCategory_error']) && empty($data['sPrice_error']) && empty($data['sSelectedAllType_error']) && empty($data['sSelectedSProve_error']) && empty($data['sSlot1Duration_error']) && empty($data['sSlot2Duration_error']) && empty($data['sSlot3Duration_error']) && empty($data['interval1Duration_error']) && empty($data['interval2Duration_error']))
            {
               $slotNo = 0;

               if ($data['slot2Duration'] != NULL && $data['slot3Duration'] == NULL)
               {
                  $slotNo = 1;
               }
               elseif ($data['slot2Duration'] != NULL && $data['slot3Duration'] != NULL)
               {
                  $slotNo = 2;
               }

               if ($data['price'] != $serviceDetails[0]->price || $data['slot1Duration'] != $slot1Details ||  $data['slot2Duration'] != $slot2Details || $data['slot3Duration'] != $slot3Details || $data['interval1Duration'] != $interval1Details || $data['interval2Duration'] != $interval2Details)
               {
                  $this->ServiceModel->beginTransaction();
                  $this->ServiceModel->changeServiceStatus($serviceID, 0);
                  $this->ServiceModel->addService($data, $slotNo);
                  $this->ServiceModel->addServiceProvider($data);
                  $this->ServiceModel->addTimeSlot($data, $slotNo);
                  $this->ServiceModel->addIntervalTimeSlot($data, $slotNo);
                  $this->ServiceModel->addResourcesToService($data, $slotNo);
                  $this->ServiceModel->commit();
               }
               else
               {
                  $this->ServiceModel->beginTransaction();
                  $this->ServiceModel->updateService($serviceID, $data, $slotNo);
                  $this->ServiceModel->updateServiceProviders($serviceID, $data, $serProvDetails);
                  $this->ServiceModel->addNewSlotsFromUpdate($serviceID, $data, $slotNo);
                  $this->ServiceModel->updateAllocatedResources($serviceID, $data, $slotNo, $resDetailsSlot1, $resDetailsSlot2, $resDetailsSlot3);
                  $this->ServiceModel->updateIntervals($serviceID, $data, $slotNo);
                  $this->ServiceModel->updateTimeslots($serviceID, $data, $slotNo);
                  $this->ServiceModel->commit();
               }
               $resState = 5;
               $recallReason = "For update the service";

               if (isset($_SESSION['recallRequestsFromUpdateService']))
               {
                  foreach ($_SESSION['recallRequestsFromUpdateService'] as $key => $value)
                  {

                     if ($value == 1)
                     {
                        $this->ReservationModel->updateReservationRecalledState($key, $resState);
                        $this->ReservationModel->addReservationRecall($key, $recallReason);
                     }
                  }
                  $this->destroyRecallDetails();
               }
               Toast::setToast(1, "Service Updated Successfully!!!", "");
               redirect('Services/viewAllServices');
            }
            else
            {
               $this->view('manager/mang_serviceUpdate', $data);
            }
         }
         else
         {
            die("Something went wrong");
         }
      }
      else
      {
         $data = [
            'name' => $serviceDetails[0]->name,
            'customerCategory' => $serviceDetails[0]->customerCategory,
            'sSelectedType' => $serviceDetails[0]->type,
            'sNewType' => '',
            'price' => $serviceDetails[0]->price,
            'sSelectedProv' => [],

            'slot1Duration' => $slot1Details,
            'slot2Duration' => $slot2Details,
            'slot3Duration' => $slot3Details,
            'interval1Duration' => $interval1Details,
            'interval2Duration' => $interval2Details,

            'sSelectedResourse' => '',
            'sSelectedResCount1' => '',
            'sSelectedResCount2' => '',
            'sSelectedResCount3' => '',

            'serviceDetails' => $serviceDetails[0],
            'serProvDetails' => $serProvDetails,
            'noofSlots' => $noofSlots,
            'resDetailsSlot1' => $resDetailsSlot1,
            'resDetailsSlot2' => $resDetailsSlot2,
            'resDetailsSlot3' => $resDetailsSlot3,

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],

            'sName_error' => '',
            'sSelectedCusCategory_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',

            'sSlot1Duration_error' => '',
            'sSlot2Duration_error' => '',
            'sSlot3Duration_error' => '',
            'interval1Duration_error' => '',
            'interval2Duration_error' => '',

            'sSelectedResCount1_error' => '',
            'sSelectedResCount2_error' => '',
            'sSelectedResCount3_error' => '',
         ];

         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;

         $this->view('manager/mang_serviceUpdate', $data);
      }
   }

   public function addToRecallQueue($reservationID)
   {
      if (!isset($_SESSION['recallRequestsFromUpdateService']))
      {
         $_SESSION['recallRequestsFromUpdateService'] = array();
      }

      $_SESSION['recallRequestsFromUpdateService'][$reservationID] = 1;
   }
   public function removeFromRecallQueue($reservationID)
   {
      $_SESSION['recallRequestsFromUpdateService'][$reservationID] = 0;
   }
   public function destroyRecallDetails()
   {
      Session::clear('recallRequestsFromUpdateService');
   }
   public function deleteService($serviceID)
   {
      $state = 0;
      $this->ServiceModel->changeServiceStatus($serviceID, $state);
      Toast::setToast(1, "Service Deleted Successfully!!!", "");
      redirect('Services/viewAllServices');
   }
   public function holdService($serviceID)
   {
      $state = 2;
      $this->ServiceModel->changeServiceStatus($serviceID, $state);
      redirect('Services/viewAllServices');
   }
   public function activeService($serviceID)
   {
      $state = 1;
      $this->ServiceModel->changeServiceStatus($serviceID, $state);
      redirect('Services/viewAllServices');
   }

   public function serviceReport()
   {
      $serviceList = $this->ServiceModel->getServiceDetails();
      $this->view('common/serviceReport', count($serviceList));
   }

   public function serviceReportJS($smonth)
   {
      $serviceList = $this->ServiceModel->getServiceDetails();

      $sReportDetails = array();
      $dateOld = date_create($smonth);

      $year = date_format($dateOld, "Y");
      $month = date_format($dateOld, "m");

      foreach ($serviceList as $services)
      {
         $serviceDetails = $this->ServiceModel->getDetailsForServiceReportJS($services->serviceID, $year, $month);
         array_push($sReportDetails, $serviceDetails);
      }

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($sReportDetails));
   }

   public function serviceProviderReport()
   {
      $serviceProviderList = $this->ServiceModel->getServiceProviderDetails();

      $this->view('common/serviceProviderReport', count($serviceProviderList));
   }

   public function serviceProviderReportJS($smonth)
   {
      $sProvList = $this->ServiceModel->getServiceProviderDetails();

      $sProvReportDetails = array();
      $dateOld = date_create($smonth);

      $year = date_format($dateOld, "Y");
      $month = date_format($dateOld, "m");

      foreach ($sProvList as $sProv)
      {
         $sProvDetails = $this->ServiceModel->getDetailsForServiceProvReportJS($sProv->staffID, $year, $month);
         array_push($sProvReportDetails, $sProvDetails);
      }

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($sProvReportDetails));
   }

   public function analyticsOverall()
   {
      // Session::validateSession([3]);
      $totalRes = $this->ReservationModel->getTotalResForOverallOverview();
      $availableServices = $this->ServiceModel->getAvailableServiceCount();
      $availableServiceProviders = $this->ServiceModel->getAvailableServiceProvidersCount();
      $top5SProvs = $this->ServiceModel->getTop5ServiceProvs();
      $top5Services = $this->ServiceModel->getTop5Services();
      $customerPopulation = $this->CustomerModel->getCustomerPopulation();

      $overallDetails = [
         'totalRes' => $totalRes,
         'availableServices' => $availableServices,
         'availableServiceProviders' => $availableServiceProviders,
         'top5SProvs' => $top5SProvs,
         'top5Services' => $top5Services,
         'customerPopulation' => $customerPopulation,

      ];

      $this->view('common/SubAnalyticsOverall', $overallDetails);
   }
   public function overallAnalyticsChart1()
   {
      $getCustomerCount = $this->CustomerModel->getWalkInCustomerCount();

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($getCustomerCount));
   }
   public function overallAnalyticsChart2()
   {
      $customerDetails = $this->CustomerModel->getCustomerPopulation();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($customerDetails));
   }
   public function overallAnalyticsChart3()
   {
      $totalIncomeForChart = $this->ReservationModel->getMonthlyIncomeAndTotalReservationsForMangOverviewCharts();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($totalIncomeForChart));
   }
   public function overallAnalyticsChart4()
   {
      $totalReservationsForChart = $this->ReservationModel->getMonthlyIncomeAndTotalReservationsForMangOverviewCharts();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($totalReservationsForChart));
   }
   public function analyticsService()
   {
      // Session::validateSession([3]);
      $serviceList = $this->ServiceModel->getServiceDetails();

      $this->view('common/SubAnalyticsService', $serviceList);
   }
   public function analyticsServiceChartJS($serviceID, $from, $to)
   {
      // Session::validateSession([3]);
      $serviceChartDetails = $this->ServiceModel->getServiceAnalyticsDetails($serviceID, $from, $to);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceChartDetails));
   }
   public function analyticsServiceResTable($serviceID, $from, $to)
   {
      // Session::validateSession([3]);
      $serviceAnalyticResDetails = $this->ReservationModel->getResDetailsForServiceAnalytics($serviceID, $from, $to);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceAnalyticResDetails));
   }
   public function analyticsSProvider()
   {
      // Session::validateSession([3]);
      $serviceProvList = $this->ServiceModel->getServiceProviderDetails();

      $this->view('common/SubAnalyticsSProvider', $serviceProvList);
   }
   public function analyticsServiceProvChartJS($staffID, $from, $to)
   {
      // Session::validateSession([3]);
      $serviceProvChartDetails = $this->ServiceModel->getServiceProvAnalyticsDetails($staffID, $from, $to);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceProvChartDetails));
   }
   public function analyticsServiceProvResTable($staffID, $from, $to)
   {
      // Session::validateSession([3]);
      $serviceProvAnalyticResDetails = $this->ReservationModel->getResDetailsForServiceProvAnalytics($staffID, $from, $to);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceProvAnalyticResDetails));
   }
}

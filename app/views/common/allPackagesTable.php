<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">

   <!-- TODO: provide relevent sideNav by checking logged in user -->
   <?php
   $selectedMain = "Services";
   $selectedSub = "";
   switch (Session::getUser("type"))
   {
      case "2":
         require APPROOT . "/views/owner/own_sideNav.php";
         break;
      case "3":
         require APPROOT . "/views/manager/mang_sideNav.php";
         break;
      case "4":
         require APPROOT . "/views/receptionist/recept_sideNav.php";
   }
   ?>

   <?php
   $title = "Services";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">

      <?php if (Session::getUser("typeText") == "Owner" || Session::getUser("typeText") == "Manager") : ?>
         <div class="page-top-main-container">
            <a href="<?php echo URLROOT ?>/services/addNewService" class="btn btn-filled btn-theme-purple btn-main" onclick="sessionStorage.setItem('returnReferer',window.location.href);">Add New</a>
         </div>
      <?php endif; ?>


      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="">Service Name</label>
                        <select name="serviceNameSelector" id="serviceNameSelector">
                           <option value="all" selected>All</option>
                           <?php foreach ($data['sNameList'] as $services) : ?>

                              <option value="<?php echo $services->serviceID; ?>" <?php echo ($data["selectedSID"] ==  $services->serviceID) ? "selected" : "" ?>>
                                 <?php if ($services->status == 0) : ?>
                                    <?php echo $services->serviceID; ?> - <?php echo $services->name;  ?> (REMOVED)
                                 <?php else : ?>
                                    <?php echo $services->serviceID; ?> - <?php echo $services->name; ?>
                                 <?php endif; ?>
                              </option>

                           <?php endforeach; ?>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="">Service Type</label>
                        <select name="serviceTypeSelector" id="serviceTypeSelector">
                           <option value="all" selected>All</option>
                           <?php foreach ($data['sTypeList'] as $serviceType) : ?>
                              <option value="<?php echo $serviceType->type ?>" <?php echo ($data["selectedType"] ==  $serviceType->type) ? "selected" : "" ?>><?php echo $serviceType->type; ?></option>
                           <?php endforeach; ?>

                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="">Status</label>
                        <select name="serviceStatusSelector" id="serviceStatusSelector">
                           <option value="all" selected>All</option>
                           <option value="1" <?php echo ($data["selectedStatus"] == '1') ? "selected" : "" ?>>Available</option>
                           <option value="0" <?php echo ($data["selectedStatus"] == '0') ? "selected" : "" ?>>Removed</option>
                           <option value="2" <?php echo ($data["selectedStatus"] == '2') ? "selected" : "" ?>>Disabled</option>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <button type="button" id="allServiceFilterBtn" class="btn btn-filled btn-black">Search</button>
            </div>
         </div>

      </form>
      <div class="table-container">
         <div class="table2 table2-responsive">
            <table class="table2-hover">

               <thead>
                  <tr>
                     <th class="column-center-align col-1">Servie ID</th>
                     <th class="column-left-align col-2">Service</th>
                     <th class="column-left-align col-3">Type</th>
                     <th class="column-center-align col-4">Total Duration</th>
                     <th class="column-right-align col-5">Price</th>
                     <th class="column-center-align col-6">Status</th>
                     <th class="col-7"></th>
                     <?php if (Session::getUser("typeText") == "Owner" || Session::getUser("typeText") == "Manager") : ?>
                        <th class="col-7"></th>
                     <?php endif; ?>
                  </tr>
               </thead>

               <tbody>
                  <?php foreach ($data['services'] as $sDetails) : ?>
                     <tr>
                        <td data-lable="Servie ID" data-lable="" class="column-center-align">S<?php echo $sDetails->serviceID; ?></td>

                        <td data-lable="Service" class="column-left-align"><?php echo $sDetails->name; ?></td>

                        <td data-lable="Type" class="column-left-align"><?php echo $sDetails->type; ?></td>

                        <td data-lable="Total Duration" class="column-center-align">
                           <?php echo DateTimeExtended::minsToDuration($sDetails->totalDuration); ?>
                        </td>

                        <td data-lable="Price" class="column-right-align"><?php echo number_format($sDetails->price, 2, '.', ' '); ?> LKR</td>

                        <td data-lable="Status" class="column-center-align">
                           <?php if ($sDetails->status == 0) : ?>
                              <button type="button" class="status-btn red text-uppercase">
                                 Removed
                              </button>
                           <?php elseif ($sDetails->status == 1) : ?>
                              <button type="button" class="status-btn green text-uppercase">
                                 Available
                              </button>
                           <?php elseif ($sDetails->status == 2) : ?>
                              <button type="button" class="status-btn yellow text-uppercase">
                                 Disabled
                              </button>
                           <?php endif; ?>
                        </td>

                        <td data-lable="" class="column-center-align">
                           <span>
                              <a href="<?php echo URLROOT ?>/services/viewService/<?php echo $sDetails->serviceID; ?>"><i class="ci-view-more table-icon img-gap"></i></a>
                              <?php if ($sDetails->status != 0) : ?>
                                 <?php if (Session::getUser("typeText") == "Owner" || Session::getUser("typeText") == "Manager") : ?>
                                    <a href="<?php echo URLROOT ?>/services/updateService/<?php echo $sDetails->serviceID; ?>"><i class="ci-edit table-icon img-gap" onclick="sessionStorage.setItem('returnReferer',window.location.href);"></i></a>
                                    <a href="#"><i data-columns="<?php echo $sDetails->serviceID; ?>" class="ci-trash table-icon btnRemoveService serviceRemove deletehref img-gap"></i></a>
                                 <?php endif; ?>
                              <?php else : ?>
                                 <?php if (Session::getUser("typeText") == "Owner" || Session::getUser("typeText") == "Manager") : ?>
                                    <i class="ci-edit-disable table-icon img-gap"></i>
                                    <i data-columns="" class="ci-trash-disable table-icon img-gap"></i>
                                 <?php endif; ?>
                              <?php endif; ?>
                           </span>
                        </td>
                        <?php if (Session::getUser("typeText") == "Owner" || Session::getUser("typeText") == "Manager") : ?>
                           <td class="column-center-align">
                              <?php if ($sDetails->status == 1) : ?>
                                 <a href="#"><button type="submit" data-columns2="<?php echo $sDetails->serviceID; ?>" class="table-btn black-action-btn btnHoldService holdhref">Hold</button></a>

                              <?php elseif ($sDetails->status == 2) : ?>
                                 <a href="<?php echo URLROOT ?>/services/activeService/<?php echo $sDetails->serviceID; ?>"><button type="submit" class="table-btn green-action-btn " name="action" value="active">Active</button></a>

                              <?php else : ?>
                                 <a href="#"><button type="submit" class="table-btn gray-action-btn" disabled>Disabled</button></a>
                              <?php endif; ?>
                           </td>
                        <?php endif; ?>
                     </tr>
                  <?php endforeach; ?>

               </tbody>
            </table>
         </div>
      </div>

      <!-- Service delete model -->
      <div class="modal-container remove-service">
         <div class="modal-box">
            <div class="confirm-model-head">
               <h1 id="deleteServiceHead"></h1>
            </div>
            <div class="confirm-model-head">
               <p id="warningMsgDeleteService"></p>
            </div>
            <div class="confirm-model-head">
               <button class="btn btnClose ModalButton ModalCancelButton">Close</button>
               <a href="#" class="deleteConfirmHref"><button class="btn ModalButton ModalRedButton recallFromDelete">Confirm</button></a>
            </div>
         </div>
      </div>
      <!-- End of Service delete model -->

      <!-- Service hold model -->
      <div class="modal-container hold-service">
         <div class="modal-box">
            <div class="confirm-model-head">
               <h1 id="holdServiceHead"></h1>
            </div>
            <div class="confirm-model-head">
               <p id="warningMsgHoldService"></p>
            </div>
            <div class="confirm-model-head">
               <button class="btn btnClose ModalButton ModalCancelButton">Close</button>
               <a href="#" class="holdConfirmHref"><button class="btn ModalButton ModalBlueButton holdServiceConfirm">Confirm</button></a>
            </div>
         </div>
      </div>

   </div>
   <!--End Content-->

   <script type="text/javascript" src="<?php echo URLROOT ?>/public/js/modals.js"></script>
   <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>
   <?php require APPROOT . "/views/inc/footer.php" ?>
   <!-- End of Service hold model -->





   <!-- service status 

Removed = 0
Active = 1
Hold = 2

-->
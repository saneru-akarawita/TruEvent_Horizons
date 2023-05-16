<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TruEvent Horizons - Add Packages</title>

        <!-- font awesome cdn link -->
        <link rel="stylesheet" href=<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- custom css file link -->
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/add-package-service-style.css">
<style>
   a{
      font-size:16px;
      @font-face{
         src: url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css");
      }  
   }

</style>
    </head>
    <body>

<!-- header section starts  -->
    <?php require APPROOT . "/views/admin/header-admin.php" ?>


<button id="menu-btn" class="fas fa-bars"></button>

<!-- header section ends -->

<div class="heading" style="background:url() no-repeat">
<!-- <h1>Add Packages</h1> -->
</div>

<!-- Add package starts -->
<section class="add-packages" style="background-color:#f2f1f1">
   <h1 class="heading-title" >
      Add Packages
   </h1>
<div class="reg-container form-container contentBox">
         <form action="<?php echo URLROOT; ?>/packages/addNewPackage" method="post" class="form">
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="pcode">Package Code</label>
                     <input type="text" name="pcode" placeholder="Enter Package Code" value="<?php echo $data[0]['pcode'] ?>" maxlength="20" required/>
                     <span class="error"><?php echo $data[0]['pcode_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                        <label class="label" for="package_type">Package Type</label>
                        <select name = "package_type" class="dropdownmenu" id="package_type" required> 
                              <option value="">Select a package type</option>
                              <option value = "Birthday">Birthday Package</option>
                              <option value = "Anniversary">Anniversary Package</option>
                              <option value = "Coparate Event">Coparate Package</option>
                              <option value = "Graduation Party">Graduation Party Package</option>
                              <option value = "Get-Together">Get-Together Package</option>
                              <option value = "General Event">General Package</option>
                        </select>
                        <span class="error"><?php echo $data[0]['package_type_error']; ?></span>
                </div>
            </div>

            <div class="row">
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="name">Package Name</label>
                      <input type="text" name="name" placeholder="Enter Package Name" value="<?php echo $data[0]['name'] ?>" maxlength="100" required>
                      <span class="error"><?php echo $data[0]['name_error']; ?></span>
                   </div>
                </div>
                <div class="column">
                   <div class="text-group">
                      <label class="label" for="price">Price</label>
                      <input type="text" name="price" id="total_price" placeholder="Enter Package Price" value="<?php echo $data[0]['price'] ?>" maxlength="15" required>
                      <span class="error"><?php echo $data[0]['price_error']; ?></span>
                   </div>
                </div>
                <div class="column">
                  <div class="text-group">
                     <label class="label" for="discount">Discount</label>
                     <input type="text" name="discount" id="discount" placeholder="Enter Discount" value="" maxlength="15">
                  </div>
               </div>
             </div>
            
             <hr>

            Services Included:<br><br><br>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="bands">Bands:</label>
                     <select name = "bands" class="dropdownmenu" id="bands"> 
                              <option value="" disabled selected >Select a Band Option</option>
                              <?php foreach ($data[2] as $banddetails) :?>
                              <?php if($banddetails->active==1):?>
                                 <?php $spname = "";
                                       $spid = $banddetails->service_provider_id; ?>

                                 <?php foreach ($data[4] as $spdetails) :
                                    if($spdetails->service_provider_id ==$spid ){
                                       $spname = $spdetails->company_name;
                                     }?>
                                 <?php endforeach; ?>

                                 <option value = "<?php echo $spname?> - <?php echo $banddetails->service_name ?>|<?=$banddetails->service_provider_id?>|<?php echo $banddetails->service_id ?>" price ="<?=$banddetails->price?>"><?php echo $spname?> - <?php echo $banddetails->service_name ?></option>
                              <?php endif; ?>
                              <?php endforeach; ?>
                     </select>
                     <span class="error"><?php echo $data[0]['bands_error']; ?></span>
                  </div>
                  <div class="text-group">
                     <label class="label" for="price">Price (Band)</label>
                     <input type="text" name="price_b" id="price_b" placeholder="price_band" value="0" maxlength="15">
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="decorations">Decorations:</label>
                     <select name = "decorations" class="dropdownmenu" id="decorations"> 
                              <option value="" disabled selected >Select a Decoration Option</option>
                              <?php foreach ($data[1] as $decodetails) :?>
                              <?php if($decodetails->active ==1):?>
                                 <?php $spname = "";
                                       $spid = $decodetails->service_provider_id; ?>

                                 <?php foreach ($data[4] as $spdetails) :
                                    if($spdetails->service_provider_id ==$spid ){
                                       $spname = $spdetails->company_name;
                                     }?>
                                 <?php endforeach; ?>

                                 <option value = "<?php echo $spname?> - <?php echo $decodetails->service_name ?>|<?=$decodetails->service_provider_id?>|<?php echo $decodetails->service_id ?>" price ="<?=$decodetails->price?>"><?php echo $spname?> - <?php echo $decodetails->service_name ?></option>
                              <?php endif; ?>
                              <?php endforeach; ?>
                     </select>
                     <span class="error"><?php echo $data[0]['decorations_error']; ?></span>
                  </div>
                  <div class="text-group">
                     <label class="label" for="price">Price (Deco)</label>
                     <input type="text" name="price_d" id="price_d" placeholder="price_deco" value="0" maxlength="15">
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="photography">Photography:</label>
                     <select name = "photography" class="dropdownmenu" id="photography"> 
                              <option value="" disabled selected >Select a Photography Option</option>
                              <?php foreach ($data[3] as $photodetails) :?>
                              <?php if($photodetails->active ==1):?>
                                 <?php $spname = "";
                                       $spid = $photodetails->service_provider_id; ?>

                                 <?php foreach ($data[4] as $spdetails) :
                                    if($spdetails->service_provider_id ==$spid ){
                                       $spname = $spdetails->company_name;
                                     }?>
                                 <?php endforeach; ?>

                                 <option value = "<?php echo $spname?> - <?php echo $photodetails->service_name ?>|<?=$photodetails->service_provider_id?>|<?php echo $photodetails->service_id ?>" price="<?=$photodetails->price?>"><?php echo $spname?> - <?php echo $photodetails->service_name ?></option>
                              <?php endif; ?>
                              <?php endforeach; ?>
                     </select>
                     <span class="error"><?php echo $data[0]['photography_error']; ?></span>
                  </div>
                  <div class="text-group">
                     <label class="label" for="price">Price (Photo)</label>
                     <input type="text" name="price_p" id="price_p" placeholder="price_photo" value="0" maxlength="15">
                  </div>
               </div>
            </div>
    
            <div class="footer-container">
               <button type="submit" name="action" value="addpackage" class="btn btn-filled btn-theme-purple">Add Package</button>
            </div>

         </form>
      </div>
</section>
<!-- Add package ends -->


<!-- footer start -->
<section class="footer">
    <div class="overlay"></div>
    <div class="box-container">
        <div class="box">
            <h3>Quick Access</h3>
        <a href="home"><i class="fas fa-angle-right"></i>  Home</a>
        <a href="viewpackages"><i class="fas fa-angle-right"></i> Packages</a>
        <a href="addpackages"><i class="fas fa-angle-right"></i> Add Packages</a>
        </div>

        <div class="box">
            <h3>Extra</h3>
        <a href="#"><i class="fas fa-angle-right"></i>  About US</a>
        <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
        <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
        </div>

        <div class="box">
            <h3>Contact Us</h3>
        <a href="#"><i class="fas fa-phone"></i>  +94 123-456-789</a>
        <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
        <a href="#"><i class="fas fa-map"></i> Colombo</a>


        </div>
       
        <div class="box">
            <h3>Follow US</h3>
        <a href="#"><i class="fab fa-facebook"></i>  facebook</a>
        <a href="#"><i class="fab fa-instagram"></i> instagram</a>
        <a href="#"><i class="fab fa-linkedin"></i>  linkedin</a>

        </div>
    </div>

    

    <div class="credit">
        Created By <span>TruEvent</span> | All Rights Reserved
    </div>

</section>


<!-- footer ends -->


    <!-- custom js file link -->
    <!-- <script src="<?php echo URLROOT ?>/public/js/admin/adminscript.js"></script> -->
    <script>

        var bandchoice = document.getElementById("bands");
        var photochoice = document.getElementById("photography");
        var decochoice = document.getElementById("decorations");

        var bandprice = document.getElementById("price_b");
        var photoprice = document.getElementById("price_p");
        var decoprice = document.getElementById("price_d");

        var discount = document.getElementById("discount");

        var total = 0;


         bandchoice.onchange = function(){
               var previousPrice = parseInt(document.getElementById("price_b").value);
               var bandprice = bandchoice.options[bandchoice.selectedIndex].getAttribute('price');
               document.getElementById("price_b").value = bandprice;
               total = total - previousPrice;
               total = total + parseInt(bandprice);
               document.getElementById("total_price").value = total;

         }
         photochoice.onchange = function(){
               var previousPrice = parseInt(document.getElementById("price_p").value);
               var photoprice = photochoice.options[photochoice.selectedIndex].getAttribute('price');
               document.getElementById("price_p").value = photoprice;
               total = total - previousPrice;
               total = total + parseInt(photoprice);
               document.getElementById("total_price").value = total;
         }
         decochoice.onchange = function(){
               var previousPrice = parseInt(document.getElementById("price_d").value);
               var decoprice = decochoice.options[decochoice.selectedIndex].getAttribute('price');
               document.getElementById("price_d").value = decoprice;
               total = total - previousPrice;
               total = total + parseInt(decoprice);
               document.getElementById("total_price").value = total;
         }
         
         discount.onchange = function(){
               var tot=total;
               var discount = document.getElementById("discount").value;
               // var total = document.getElementById("total_price").value;
               var discountedprice = parseInt(tot) - (parseInt(tot) * (parseInt(discount)/100));
               var p = document.getElementById("price_p").value;
               var d = document.getElementById("price_d").value;
               var b = document.getElementById("price_b").value;
               var dispriceforphoto = parseInt(p) - (parseInt(p) * (parseInt(discount)/100));
               var dispriceforband = parseInt(d) - (parseInt(d) * (parseInt(discount)/100));
               var dispricefordeco = parseInt(b) - (parseInt(b) * (parseInt(discount)/100));
               document.getElementById("price_p").value = dispriceforphoto;
               document.getElementById("price_d").value = dispriceforband;
               document.getElementById("price_b").value = dispricefordeco;
               
               document.getElementById("total_price").value = discountedprice;
         }

   </script>
   
    </body>
</html>
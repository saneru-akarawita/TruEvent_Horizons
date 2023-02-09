<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsive Footer | CodingLab</title>--->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer/footersp.css">
   
  </head>
<body>

 <footer class="sp-footer">
   <div class="content-sp">

          <div class="left box">
                <div class="upper-div">
                        <div class="topic-sp">About us</div>
                        <p>Welcome to <span style="color:#d8bfd8; font-size:1.5rem;"><?= $spdetails->company_name ?></span></p>
                        <p>Our decoration company offers exceptional service to guests with a focus on comfort and convenience. 
                        Our commitment to customer satisfaction and luxury amenities creates a memorable and enjoyable stay for all.</p>
                </div>
                <div class="lower-div">
                        <div class="topic-sp">Contact us</div>
                        <div class="phone">
                          <a href="#"><i class="fas fa-phone-volume"></i><?= $spdetails->contact_no ?></a>
                        </div>
                        <div class="email">
                          <a href="#"><i class="fas fa-envelope"></i><?= $spdetails->email ?></a>
                        </div>
                        <div class="address">
                          <a href="#"><i class="fa-sharp fa-solid fa-location-dot"></i><?= $spdetails->district ?></a>
                        </div>
                </div>
          </div>

          <div class="middle box">
            <div class="topic-sp">Our Services</div>
            <div><a href="#">Interior Design and Decoration</a></div>
            <div><a href="#">Space Planning</a></div>
            <div><a href="#">Lighting Design</a></div>
            <div><a href="#">Furniture Selection and Placement</a></div>
            <div><a href="#">Accessorizing and Staging</a></div>
            <div><a href="#">Outdoor Living Spaces</a></div>
            <div><a href="#">Color Consultation</a></div>
          </div>

            <div class="right box">
              <div class="topic-sp">Subscribe us</div>
                  <form action="#">
                    <input type="text" placeholder="Enter email address">
                    <input type="submit" name="" value="Send">
                    <div class="media-icons">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-youtube"></i></a>
                      <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </form>
            </div>


        <div class="bottom-sp" style="margin-left:500px;">
          <p>Copyright © 2023 <a href="#">TruEventHorizons</a> All rights reserved</p>
        </div>
    </div>
</footer>

</body>
</html>

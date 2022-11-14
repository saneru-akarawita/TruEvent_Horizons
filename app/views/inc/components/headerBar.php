<header>
   <!--Header profile section-->

   <div class="header-profile">
      
      <span class="header-username"><?php echo "$title" ?></span>
      <div class="header-profile-arrow">
         <i class="fas fa-chevron-down"></i>
      </div>
   </div>
   <!--Header profile menu-->
   <div class="profile_menu">
      <ul>
         <li>
            <i class="far fa-user"></i>
            <a href="<?php echo URLROOT ?>/home">Home Page</a>
         </li>
         <li>
            <i class="far fa-sign-out"></i>
            <a href="<?php echo URLROOT ?>/user/signout">Sign Out</a>
         </li>
      </ul>
   </div>

   <!--End header profile menu-->
</header>
<!--End Header(Top Bar)-->
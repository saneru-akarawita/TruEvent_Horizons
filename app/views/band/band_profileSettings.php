<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/admin-add-reservation-style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/styles-hotel.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/hotel manager/style.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/admin/add-package-service-style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/public/images/hotel manager/logo/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/logo/miniIcon.ico">
    <title>TruEvent Horizons - Band Profile - Band</title>
    <link href='https://unpkg.com/filepond@^4/dist/filepond.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap' rel='stylesheet'>
    <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-lZ74JXlJSQnvyTT8IRYc+70llQQaHYJ0HfgG8fzDZafr+Jop9XprTF0M0/hJW+OvAJl4x+PYJh+s1+qO2Zv4g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


    <style>

        #profilepic{
            margin-left:10%;
        }
        #abc {
            margin-top:24%;
            <?php if(!isset($data[0]['img_source'])){?>
                max-width: 50%;
                max-height: 50%;
            <?php }?>
        }
        #abc:hover{
            cursor:pointer;
        }
    </style>

</head>

<body>
<?php require APPROOT . "/views/band/header-band.php" ?>

<?php if(isset($data[0]['img_source'])){
        $image_name = 'uploadimages/profilepic/'.$data[0]['img_source'];}
    else{
        $image_name = 'profilepic.png';
    }?>


<div class="main-container">

    <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>

    <div class="ser-container form-container contentBox" style="width: 60%;">
        <form action="<?php echo URLROOT; ?>/bandDashboard/profileSettings" method="post" class="form">
            <h1 class="title">Profile Settings</h1>
            <br><br>

            <div class="row">
                <div class="column">
                    <!-- <img src="<?php echo URLROOT?>/public/images/profilepic.png" class="avatar" style="margin-left:10%;"> -->
                    <input type="file" id="profilepic" credits='false' name="profilepic" class = "avatar" accept="image/png, image/jpeg, image/gif" />
                    <input type="hidden" id="pplink" name="pplink">
                </div>
                <div class="column">
                    <br>
                    <label class="label" for="companyname">Company Name</label>
                    <input class="companyname" type="text" id="companyname" name="companyname" placeholder="<?=$data[1]->company_name?>" disabled>

                    <br>
                    <label class="label" for="businessid">Business ID</label>
                    <input class="businessid" type="text" id="businessid" name="businessid" placeholder="<?=$data[1]->business_id?>" disabled>
                </div>
            </div>
            <br><br>
            <label for="email">Email</label>
            <div class="row"> 
                <input class="email" type="text" id="email" name="email" placeholder="<?=$data[1]->email?>" style="width:48%" disabled>
            </div>
            <br>
            <div class="row"> 
                    <div class="column">
                        <label for="contactno">Contact Number</label>
                        <input class="contactno" type="text" id="contactno" name="contactno" placeholder="<?=$data[1]->contact_no?>" disabled>
                    </div>
                    <div class="column">
                        <label class="district" for="district">District</label>
                        <input class="district" type="text" id="contactno" name="contactno" placeholder="<?=$data[1]->district?>" disabled>
                    </div> 
            </div>

            <br><br><hr style="height:2px;border-width:0;color:silver;background-color:silver"><br><br>

            <h1 class="title">Bank Details</h1>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="accno">Account Number</label>
                    <input class="accno" type="text" id="accno" name="accno" placeholder="<?=$data[1]->account_no?>" disabled>
                </div>
                <div class="column">
                    <label class="accname" for="district">Account Name</label>
                    <input class="accname" type="text" id="accname" name="accname" placeholder="<?=$data[1]->account_name?>" disabled>
                </div> 
            </div>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="bank">Bank</label>
                    <input class="bank" type="text" id="bank" name="bank" placeholder="<?=$data[1]->bank?>" disabled>
                </div>
                <div class="column">
                    <label class="branch" for="branch">Branch</label>
                    <input class="branch" type="text" id="branch" name="branch" placeholder="<?=$data[1]->branch?>" disabled>
                </div> 
            </div>

            <br><br><hr style="height:2px;border-width:0;color:silver;background-color:silver"><br><br>

            <h1 class="title">Change Password</h1>

            <br>

            <label for="currentpw">Current Password</label>
            <div class="row" style="display:flex;"> 
                <input class="currentpw" type="password" id="currentpw" name="currentpw" placeholder="enter current password" style="width:45.5%; border-radius:5px;" required>
                <button type="button" id="showPassword" style="margin-left:-20px; background-color:white;"><i class="fas fa-eye"></i></button>
                <span class="error"><?php echo $data[0]['currentPassword_error'];  ?></span>
            </div>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="newpw">New Password</label>
                    <input class="newpw" type="password" id="newpw" name="newpw" placeholder="enter new password" style="width:90%; display:inline-flex;" required>
                    <button type="button" id="showPassword2"  style="display:inline-flex; background-color:white;"><i class="fas fa-eye"></i></button>
                    <span class="error"><?php echo $data[0]['newPassword_error']; ?></span>
                </div>
                <div class="column">
                    <label for="confirmnewpw">Confirm New Password</label>
                    <input class="confirmnewpw" type="password" id="confirmnewpw" name="confirmnewpw" placeholder="re-enter new password" style="width:90%; display:inline-flex;" required>
                    <button type="button" id="showPassword3" style="display:inline-flex; background-color:white;"><i class="fas fa-eye"></i></button>
                    <span class="error"><?php echo $data[0]['confirmPassword_error']; ?></span>
                </div> 
            </div>
            <br>
            <div class="footer-container">
                <button type="submit" name="action" value = "changepw" class="btn btn-filled btn-theme-purple" style="width:max-content;">Change Password</button>
            </div>

        </form>
    </div>
</div>


<!-- footer start -->
<section class="footer">
    <div class="overlay"></div>
    <div class="box-container">
        <div class="box">
            <h3>Quick Access</h3>
            <a href="home"><i class="fas fa-angle-right"></i> Home</a>
            <a href="#"><i class="fas fa-angle-right"></i> Packages</a>
            <a href="#"><i class="fas fa-angle-right"></i> Services</a>
        </div>

        <div class="box">
            <h3>Extra</h3>
            <a href="#"><i class="fas fa-angle-right"></i> About US</a>
            <a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a>
            <a href="#"><i class="fas fa-angle-right"></i> Ask Questions</a>
        </div>

        <div class="box">
            <h3>Contact Us</h3>
            <a href="#"><i class="fas fa-phone"></i> +94 123-456-789</a>
            <a href="#"><i class="fa-solid fa-envelope"></i> TruEvent@gmail.com</a>
            <a href="#"><i class="fas fa-map"></i> Colombo</a>

        </div>

        <div class="box">
            <h3>Follow US</h3>
            <a href="#"><i class="fab fa-facebook"></i> facebook</a>
            <a href="#"><i class="fab fa-instagram"></i> instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>

        </div>
    </div>


    <div class="credit">
        Created By <span>TruEvent</span> | All Rights Reserved
    </div>

</section>

<!-- footer ends -->

<!-- custom js file link -->
<script src="<?php echo URLROOT ?>/public/js/band/bandscript.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>

    FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginImageExifOrientation, FilePondPluginImagePreview, FilePondPluginImageCrop, FilePondPluginImageResize, FilePondPluginImageTransform);
    
    FilePond.create(document.getElementById('profilepic'), {
        server: '<?=URLROOT?>/User/profilePictureUpload',
        labelIdle: `<img id='abc' src='<?=URLROOT?>/public/images/<?php echo $image_name?>'/><br/><br/> <span>Upload Profile Picture</span><br/>(Drag & Drop)`,
        imagePreviewHeight: 170,
        imageCropAspectRatio: '1:1',
        imageResizeTargetWidth: 200,
        imageResizeTargetHeight: 200,
        stylePanelLayout: 'compact circle',
        styleLoadIndicatorPosition: 'center bottom',
        styleButtonRemoveItemPosition: 'center bottom'
    });

    // console log file path after submit
    document.getElementById('profilepic').addEventListener('FilePond:processfile', function (e) {
        const serverId = e.detail.file.serverId;
        console.log(serverId);
        // parse the JSON object
        const jsonResponse = JSON.parse(serverId);
        // access the filepath
        const filepath = jsonResponse.filepath;
        console.log(filepath);
        if (filepath != null) {
            document.getElementById('pplink').value = filepath;
        }
    });

</script>

<script>
const passwordInput = document.getElementById('currentpw');
const showPasswordButton = document.getElementById('showPassword');

showPasswordButton.addEventListener('click', () => {
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    showPasswordButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
  } else {
    passwordInput.type = 'password';
    showPasswordButton.innerHTML = '<i class="fas fa-eye"></i>';
  }
});

</script>

<script>
const passwordInput2 = document.getElementById('newpw');
const showPasswordButton2 = document.getElementById('showPassword2');

showPasswordButton2.addEventListener('click', () => {
  if (passwordInput2.type === 'password') {
    passwordInput2.type = 'text';
    showPasswordButton2.innerHTML = '<i class="fas fa-eye-slash"></i>';
  } else {
    passwordInput2.type = 'password';
    showPasswordButton2.innerHTML = '<i class="fas fa-eye"></i>';
  }
});

</script>

<script>
const passwordInput3 = document.getElementById('confirmnewpw');
const showPasswordButton3 = document.getElementById('showPassword3');

showPasswordButton3.addEventListener('click', () => {
  if (passwordInput3.type === 'password') {
    passwordInput3.type = 'text';
    showPasswordButton3.innerHTML = '<i class="fas fa-eye-slash"></i>';
  } else {
    passwordInput3.type = 'password';
    showPasswordButton3.innerHTML = '<i class="fas fa-eye"></i>';
  }
});

</script>

<!-- Code segment required for toast notifications -->
<?php require APPROOT . "/views/inc/toast.php" ?>

</body>

</html>
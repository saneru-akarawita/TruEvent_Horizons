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
        <link href='https://unpkg.com/filepond@^4/dist/filepond.css' rel='stylesheet' />
        <link rel='stylesheet' href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css'>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap' rel='stylesheet'>

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
<?php require APPROOT . "/views/admin/header-admin.php" ?>

<?php if(isset($data[0]['img_source'])){
        $image_name = 'uploadimages/profilepic/'.$data[0]['img_source'];}
    else{
        $image_name = 'profilepic.png';
    }?>
<!-- header section starts -->
<!-- <section class="header">
    <img src="<?php echo URLROOT ?>/public/images/customer/logo/logo.jpg" alt="logo" class="logo">
    <a href="home" class="dashboard">Dashboard</a>

    <nav class="navbar">
        <a href="home">Home</a>
        <a href="#">Services</a>
        <a href="#">Packages</a>
        <a href="viewreservationlog">Reservation Log</a>
        <a href="logout">Logout</a>
    </nav> -->

    <!-- Gives a Menu Button -->
    <button id="menu-btn" class="fas fa-bars"></button>

<!-- </section> -->

<div class="main-container">

    <a href="home" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>

    <div class="ser-container form-container contentBox" style="width: 60%;">
        <form action="<?php echo URLROOT; ?>/adminDashboard/profileSettings" method="post" class="form">
            <h1 class="title">Profile Settings</h1>
            <br><br>

            <div class="row">
                <div class="column">
                    <!-- <img src="<?php echo URLROOT?>/public/images/profilepic.png" class="avatar" style="margin-left:10%;"> -->
                    <input type="file" id="profilepic" credits='false' name="profilepic" class = "avatar" accept="image/png, image/jpeg, image/gif" />
                    <input type="hidden" id="pplink" name="pplink">
                </div>
                <div class="column">
                    <br><br>
                    <label class="label" for="fullname">Full Name</label>
                    <input class="fullname" type="text" id="fullname" name="fullname" placeholder="<?=$data[1]->fname?> <?=$data[1]->lname?>" disabled>
                </div>
            </div>
            <br><br>
            <label for="email">Email</label>
            <div class="row"> 
                <input class="email" type="text" id="email" name="email" placeholder="<?=$data[1]->email?>" style="width:48%; text-transform:none" disabled>
            </div>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="accno">Account Number</label>
                    <input class="accno" type="text" id="accno" name="accno" placeholder="<?=$data[1]->acc_no?>" disabled>
                </div>
                <div class="column">
                    <label class="accname" for="district">Account Name</label>
                    <input class="accname" type="text" id="accname" name="accname" placeholder="<?=$data[1]->acc_name?>" disabled>
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
            <div class="row"> 
                <input class="currentpw" type="password" id="currentpw" name="currentpw" placeholder="enter current password" style="width:60%" required>
                <span class="error"><?php echo $data[0]['currentPassword_error'];  ?></span>
            </div>
            <br><br>
            <div class="row"> 
                <div class="column">
                    <label for="newpw">New Password</label>
                    <input class="newpw" type="password" id="newpw" name="newpw" placeholder="enter new password" required>
                    <span class="error"><?php echo $data[0]['newPassword_error']; ?></span>
                </div>
                <div class="column">
                    <label for="confirmnewpw">Confirm New Password</label>
                    <input class="confirmnewpw" type="password" id="confirmnewpw" name="confirmnewpw" placeholder="re-enter new password" required>
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
            <a href="#"><i class="fas fa-angle-right"></i> Add Packages</a>
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
<script src="<?php echo URLROOT ?>/public/js/customer/customerscript.js"></script>
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
</body>

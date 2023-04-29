<?php
if (empty($currentUser['img'])) {
    $userAvatar = 'profilepic.png';
} else {
    $userAvatar = $currentUser['img'];
}

?>
<div class="chat_wrapper">
    <section class="chat_users">
        <header>
            <div class="chat_content">
                <!-- <img src="/public/frontend/images/<?= $userAvatar ?>" alt=""> -->
                <?php echo "<img src = '".URLROOT."/public/images/uploadimages/profilepic/".$userAvatar."'>";?>
                <div class="chat_details">
                    <span><?= $currentUser['fname']." ".$currentUser['lname'] ?></span>
                    <p><?= ucwords($currentUser['status']) ?></p>
                </div>
            </div>
            <!-- <a href="/user/logout" class="logout">Logout</a> -->
        </header>
            <?php $this->renderPartial('chat.user.partial.search_bar') ?>
        <div class="chat_users-list">
        </div>
    </section>
</div>
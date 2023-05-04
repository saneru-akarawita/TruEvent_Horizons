<?php
if (empty($user_detail['img'])) {
    $userAvatar = 'profilepic.png';
} else {
    $userAvatar = $user_detail['img'];
}

?>
<div class="chat_wrapper">
    <section class="chat-area">
        <header>
            <a href="<?php echo URLROOT ?>/app/views/<?php echo Session::getUser('typeText')?>/chat/user/list" class="back-icon"><i class="fas fa-arrow-left"></i></a>
            <!-- <img src="/public/frontend/images/<?= $userAvatar ?>" alt=""> -->
            <?php echo "<img src = '".URLROOT."/public/images/uploadimages/profilepic/".$userAvatar."'>";?>
            <div class="chat_details">
                <span><?= $user_detail['fname']." ".$user_detail['lname'] ?></span>
                <p><?= ucwords($user_detail['status']) ?></p>
            </div>
        </header>

        <div class="chat-box"></div>

        <form action="#" class="typing-area">
            <input type="text" class="chat_user_id" name="chat_user_id" value="<?= $user_detail['user_id'] ?>" hidden>
            <input type="text" class="incoming_id" name="incoming_id" value="<?= $user_detail['unique_id'] ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Type a message here..."
                   autocomplete="off">
            <button class="btn-send"><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>
</div>
<?php
/**
 * @var array $item
 * @var array $image
 */

if (empty($image['img'])) {
    $userAvatar = 'profilepic.png';
} else {
    $userAvatar = $image['img'];
}
?>

<div class="chat incoming">
    <!-- <img src="/public/frontend/images/<?= $userAvatar ?>" alt=""> -->
    <?php echo "<img src = '".URLROOT."/public/images/uploadimages/profilepic/".$userAvatar."'>";?>
    <div class="chat_details">
        <p><?= $item['msg'] ?></p>
    </div>
</div>
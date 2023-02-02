<?php
/**
 * @var array $item
 */

if (empty($item['img'])) {
    $userAvatar = 'user.png';
} else {
    $userAvatar = $item['img'];
}
?>

<div class="chat incoming">
    <!-- <img src="/public/frontend/images/<?= $userAvatar ?>" alt=""> -->
    <?php echo "<img src = '".URLROOT."/public/images/profilepic.png'>";?>
    <div class="chat_details">
        <p><?= $item['msg'] ?></p>
    </div>
</div>
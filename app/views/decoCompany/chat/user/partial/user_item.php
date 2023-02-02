<?php
/**
 * @var array $user
 * @var string $yourTag
 * @var string $message
 * @var string $status
 */
?>

<a href="chatWith?user_id=<?= $user['unique_id'] ?>">
    <div class="chat_content">
        <?php echo "<img src = '".URLROOT."/public/images/profilepic.png'>";?>
        <div class="chat_details">
            <span><?= $user['fname']. " ".$user['lname'] ?></span>
            <p><?= $yourTag . $message ?></p>
        </div>
    </div>
    <?php if($status == 'Active now'): ?>
        <div class="status-dot"><i class="fas fa-circle"></i></div>
    <?php else: ?>
        <div class="status-dot-offline"><i class="fas fa-circle"></i></div>
    <?php endif; ?>
</a>
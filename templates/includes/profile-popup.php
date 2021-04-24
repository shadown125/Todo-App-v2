<div class="profile-container">
    <div class="left-side-wrapper">
        <img src="src/pics/<?php echo $_SESSION['user_profile_image']; ?>" alt="profile image">
        <div class="current-level"><?php echo $_SESSION['user_level']; ?></div>
    </div>
    <div class="profile-information">
        <div><?php echo $_SESSION['user_first_name']; ?></div>
        <?php if(!empty($_SESSION['user_last_name'])): ?>
            <div><?php echo $_SESSION['user_last_name']; ?></div>
        <?php endif; ?>
    </div>
</div>
<div class="profile-container">
    <img src="src/pics/img-2.jpg" alt="profile image">
    <div class="profile-information">
        <div><?php echo $_SESSION['user_first_name']; ?></div>
        <?php if(!empty($_SESSION['user_last_name'])): ?>
            <div><?php echo $_SESSION['user_last_name']; ?></div>
        <?php endif; ?>
    </div>
</div>
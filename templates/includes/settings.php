<div class="settings" data-settings>
    <div class="content">
        <button class="button settings-button" data-settings-button-back></button>
        <div class="overview-settings" data-overview-settings>
            <?php require("templates/includes/profile-popup.php"); ?>
            <h3 class="headline h3">Your Level</h3>
            <div class="level">
                <div class="bar">
                    <div class="progression-to-lvl-up" data-progression-to-lvl-up></div>
                </div>
                <div class="information">
                    <span class="gained" data-gained-exp><?php echo $_SESSION['user_exp']; ?></span> /
                    <span class="to-lvl-up" data-exp-to-lvl-up><?php echo $_SESSION['user_lvl_up']; ?></span>
                </div>
            </div>
            <div class="options">
                <button data-name>Change Name</button>
            </div>
            <div class="options">
                <button data-password>Change password</button>
            </div>
            <div class="options">
                <button data-image>Change Image</button>
            </div>
            <div class="options delete">
                <button>Delete account</button>
            </div>
            <div class="options">
                <button>Logout</button>
            </div>
        </div>
        <?php require_once("templates/includes/name-popup.php"); ?>
        <?php require_once("templates/includes/password-popup.php"); ?>
        <?php require_once("templates/includes/image-popup.php"); ?>
    </div>
</div>
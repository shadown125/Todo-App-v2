<div class="settings" data-settings>
    <div class="content">
        <button class="button settings-button" data-settings-button-back></button>
        <div class="overview-settings" data-overview-settings>
            <?php require("templates/includes/profile-popup.php"); ?>
            <h3 class="headline h3">Your Level</h3>
            <div class="level">
                <div class="bar">
                    <div class="progression-to-lvl-up"></div>
                </div>
                <div class="information">
                    <span class="gained">30</span> / <span class="to-lvl-up">65</span>
                </div>
            </div>
            <div class="options">
                <button data-first-name>Change First Name</button>
            </div>
            <div class="options">
                <button data-last-name>Change Last Name</button>
            </div>
            <div class="options">
                <button data-password>Change password</button>
            </div>
            <div class="options">
                <button data-image>Change Image</button>
            </div>
            <div class="options">
                <button>Logout</button>
            </div>
        </div>
        <?php require_once("templates/includes/first-name-popup.php"); ?>
        <?php require_once("templates/includes/last-name-popup.php"); ?>
        <?php require_once("templates/includes/image-popup.php"); ?>
    </div>
</div>
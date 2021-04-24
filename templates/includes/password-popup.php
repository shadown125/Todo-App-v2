<div class="password-container" data-password-container>
    <?php require("templates/includes/profile-popup.php"); ?>
    <form action="./?action=updatePassword" method="post" class="form">
        <div>
            <label for="current-password">Current Password:</label>
            <input type="password" class="input-option" name="current-password" id="current-password" placeholder="Your current password">
        </div>
        <div>
            <label for="new-password">New password:</label>
            <input type="password" class="input-option" name="new-password" id="new-password" placeholder="New password">
        </div>
        <div>
            <label for="repeat-new-password">Repeat new password:</label>
            <input type="password" class="input-option" name="repeat-new-password" id="repeat-new-password" placeholder="Repeat new password">
        </div>
        <button class="submit" type="submit">Apply</button>
    </form>
    <?php require("templates/includes/button-back-popup.php"); ?>
</div>
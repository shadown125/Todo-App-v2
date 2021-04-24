<div class="image-container" data-image-container>
    <?php require("templates/includes/profile-popup.php"); ?>
    <form action="./?action=changeImage" method="post" class="form" enctype="multipart/form-data">
        <div>
            <label for="profile-image">Change profile image:</label>
            <input type="file" class="input-option" name="profile-image" id="profile-image">
        </div>
        <button type="submit" class="submit">Apply</button>
    </form>
    <?php require("templates/includes/button-back-popup.php"); ?>
</div>
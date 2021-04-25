<div class="delete-container" data-delete-container>
    <?php require("templates/includes/profile-popup.php"); ?>
    <h2 class="h2 headline">Do you really want to delete your account?</h2>
    <form action="./?action=deleteUser" method="post">
        <button type="submit" class="submit">Yes</button>
    </form>
    <?php require("templates/includes/button-back-popup.php"); ?>
</div>
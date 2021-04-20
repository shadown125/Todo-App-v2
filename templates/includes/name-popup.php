<div class="name-container" data-name-container>
    <?php require("templates/includes/profile-popup.php"); ?>
    <form action="#" method="post" class="form">
        <div>
            <label for="new-name">New first name:</label>
            <input type="text" class="input-option" name="new-name" id="new-name" placeholder="Your new first name">
        </div>
        <div>
            <label for="new-last-name">New last name:</label>
            <input type="text" class="input-option" name="new-last-name" id="new-last-name" placeholder="Your new last name">
        </div>
        <button class="submit" type="submit">Apply</button>
    </form>
    <?php require("templates/includes/button-back-popup.php"); ?>
</div>
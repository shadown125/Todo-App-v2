<h2 class="title h2">Register</h2>
<form action="./?action=register" method="post" class="form">
    <div class="name-wrapper">
        <div>
            <label for="first-name" class="first-name">First name: <sup>*</sup></label>
            <input type="text" id="first-name" class="first-name <?php echo (!empty($params['first_name_err'])) ? 'is-invalid' : ''; ?>"
                   value="<?php echo $params['first_name']; ?>" name="first_name" placeholder="Your first name" required>
            <span class="invalid-feedback"><?php echo $params['first_name_err']; ?></span>
        </div>
        <div>
            <label for="last-name" class="last-name">Last name:</label>
            <input type="text" id="last-name" class="last-name" value="<?php echo $params['last_name']; ?>" name="last_name" placeholder="Your last name">
        </div>
    </div>
    <div>
        <label for="email" class="email">E-Mail: <sup>*</sup></label>
        <input type="email" id="email" class="email <?php echo (!empty($params['email_err'])) ? 'is-invalid' : ''; ?>"
               value="<?php echo $params['email']; ?>" name="email" placeholder="Your E-Mail" required>
        <span class="invalid-feedback"><?php echo $params['email_err']; ?></span>
    </div>
    <div>
        <label for="password" class="password">Password: <sup>*</sup></label>
        <input type="password" id="password" class="password <?php echo (!empty($params['password_err'])) ? 'is-invalid' : ''; ?>"
               value="<?php echo $params['password']; ?>" name="password" placeholder="Your password" required>
        <span class="invalid-feedback"><?php echo $params['password_err']; ?></span>
    </div>
    <div>
        <label for="confirm-password" class="confirm-password">Confirm password: <sup>*</sup></label>
        <input type="password" id="confirm-password" class="confirm-password <?php echo (!empty($params['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
               value="<?php echo $params['confirm_password']; ?>" name="confirm_password" placeholder="Confirm your password" required>
        <span class="invalid-feedback"><?php echo $params['confirm_password_err']; ?></span>
    </div>
    <div class="submitting-container">
        <a href="<?php echo URLROOT; ?>" class="button-back">Back</a>
        <button class="register-button" type="submit">Register</button>
    </div>
</form>
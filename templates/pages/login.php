<h2 class="title h2">Login or <a href="<?php echo URLROOT; ?>/register" class="register">Register</a></h2>
<form action="./?action=login" method="post" class="form">
    <div>
        <label for="login" class="login">Login:</label>
        <input type="text" id="login" class="login <?php echo (!empty($params['email_err'])) ? 'is-invalid' : ''; ?>"
               value="<?php echo $params['email']; ?>" name="email" placeholder="E-Mail">
        <span class="invalid-feedback"><?php echo $params['email_err']; ?></span>
    </div>
    <div>
        <label for="password" class="password">Password:</label>
        <input type="password" id="password" class="password <?php echo (!empty($params['password_err'])) ? 'is-invalid' : ''; ?>"
               value="<?php echo $params['password']; ?>" name="password" placeholder="Password">
        <span class="invalid-feedback"><?php echo $params['password_err']; ?></span>
    </div>
    <div class="submitting-container">
        <a href="#" class="forgotten-password">Forgotten Password?</a>
        <button class="button" type="submit">Login</button>
    </div>
</form>
<?php require_once "controllerUserData.php"; ?>
<?php include "header.php"; ?>

<div class="center">
    <h1>Login</h1>

    <?php
    if (!empty($errors)) {
        echo '<div class="alert alert-danger text-center">';
        foreach ($errors as $showerror) {
            echo "<p>$showerror</p>";
        }
        echo '</div>';
    }
    ?>

    <form action="login-user.php" method="post" autocomplete="off">
        <div class="txt_field">
            <input type="email" name="email" placeholder="Enter Email" required>
            <span></span>
        </div>

        <div class="txt_field">
            <input type="password" name="password" placeholder="Password" required>
            <span></span>
        </div>

        <div class="pass"><a href="forgot-password.php">Forgot password?</a></div>
        <input class="login-submit" type="submit" name="login" value="Login">
        <div class="signup_link">
            Not yet a member? <a href="signup-user.php">Signup now</a>
        </div>
    </form>
</div>

<script src="javascript/sandboxx.js"></script>

</body>
</html>

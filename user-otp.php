<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once "controllerUserData.php"; // Make sure this file is included to handle your session and database logic

// Check if the user is logged in
$email = $_SESSION['email'];
if (!$email) {
    header('Location: login-user.php'); // Redirect to login if email session is not set
    exit();
}

// Handle OTP submission
if (isset($_POST['check'])) {
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE code = '$otp_code' AND email = '$email'";
    $code_res = mysqli_query($con, $check_code);

    if (mysqli_num_rows($code_res) > 0) {
        // OTP matched, update user status to verified
        $fetch_data = mysqli_fetch_assoc($code_res);
        $update_otp = "UPDATE usertable SET code = 0, status = 'verified' WHERE email = '$email'";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {
            $_SESSION['email'] = $email; // Ensure email remains in session
            $_SESSION['info'] = "Your account has been successfully verified!";
            header('Location: index.php'); // Redirect to the main page after verification
            exit();
        } else {
            $errors['otp-error'] = "Failed to verify the OTP. Please try again.";
        }
    } else {
        $errors['otp-error'] = "Incorrect OTP. Please check your email and try again.";
    }
}

?>

<?php include "header.php"; ?>

<div class="center">
    <h1>Code Verification</h1>

    <!-- Display Success Message -->
    <?php 
    if (isset($_SESSION['info'])) {
        echo '<div class="alert alert-success text-center">' . $_SESSION['info'] . '</div>';
        unset($_SESSION['info']); // Clear the info message after displaying
    }
    ?>

    <!-- Display Error Messages -->
    <?php
    if (count($errors) > 0) {
        echo '<div class="alert alert-danger text-center">';
        foreach ($errors as $showerror) {
            echo $showerror . '<br>';
        }
        echo '</div>';
    }
    ?>

    <!-- OTP Form -->
    <form action="user-otp.php" method="POST" autocomplete="off">
        <div class="txt_field">
            <input type="number" name="otp" placeholder="Enter verification code" required>
            <span></span>
        </div>
        <input type="submit" name="check" value="Submit" class="login-submit forgot-submit">
    </form>
</div>

</body>
</html>

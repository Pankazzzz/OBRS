<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "db.php";
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = "";
$name = "";
$userid = "";
$errors = array();

// 🚀 **USER LOGIN HANDLING**
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = $_POST['password'];

    // Fetch user details
    $query = "SELECT * FROM usertable WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            if ($row['status'] !== "verified") {
                $errors['account'] = "Your account is not verified. Please check your email.";
            } else {
                // Login success - Set session variables
                $_SESSION['userid'] = $row['userid'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];

                // Redirect to dashboard
                header("Location: index.php");
                exit;
            }
        } else {
            $errors['login'] = "Incorrect Email or Password!";
        }
    } else {
        $errors['login'] = "User not found!";
    }
    mysqli_stmt_close($stmt);
}

// 🚀 **USER SIGNUP HANDLING**
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $userid = mysqli_real_escape_string($con, $_POST['userid']);

    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }

    $email_check = "SELECT * FROM usertable WHERE email = ?";
    $stmt = mysqli_prepare($con, $email_check);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email already exists!";
    }

    $userid_check = "SELECT * FROM usertable WHERE userid = ?";
    $stmt = mysqli_prepare($con, $userid_check);
    mysqli_stmt_bind_param($stmt, "s", $userid);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($res) > 0) {
        $errors['userid'] = "User ID already exists!";
    }

    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";

        $insert_data = "INSERT INTO usertable (name, userid, email, password, code, status) 
                        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $insert_data);
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $userid, $email, $encpass, $code, $status);
        $data_check = mysqli_stmt_execute($stmt);

        if ($data_check) {
            // PHPMailer setup
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'netprimehw@gmail.com'; // Your Gmail ID
                $mail->Password = 'bhcu gjyp pszh envf';    // Use an App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('your-email@gmail.com', 'Your Name');
                $mail->addAddress($email);
                $mail->Subject = "Email Verification Code";
                $mail->Body = "Your verification code is $code";

                if ($mail->send()) {
                    $_SESSION['info'] = "We've sent a verification code to your email - $email";
                    $_SESSION['userid'] = $userid;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $resid = mysqli_query($con, "SELECT * FROM usertable WHERE email = '$email'");
                    $resrow = mysqli_fetch_assoc($resid);
                    $_SESSION['id'] = $resrow['id'];

                    header('location: user-otp.php');
                    exit();
                } else {
                    $errors['otp-error'] = "Failed while sending code!";
                }
            } catch (Exception $e) {
                $errors['otp-error'] = "Error sending email: " . $mail->ErrorInfo;
            }
        } else {
            $errors['db-error'] = "Failed to insert data into database!";
        }
    }
}
?>

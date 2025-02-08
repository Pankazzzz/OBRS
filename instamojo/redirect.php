<?php
include "../db.php";
session_start();

// Include PHPMailer from the correct path
require '../src/PHPMailer.php';
require '../src/SMTP.php';
require '../src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_SESSION['email'];
$txn_id = $_GET['tx'] ?? '';  // PayPal Transaction ID
$payment_status = $_GET['st'] ?? '';  // Payment Status

if (!empty($txn_id) && $payment_status === "Completed") {
    // Update database with 'Paid' status
    $update_query = "UPDATE register SET status = 'Paid' WHERE email = '$email'";
    $run_query = mysqli_query($con, $update_query);

    // Send confirmation email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'netprimehw@gmail.com'; // Your Gmail ID
        $mail->Password = 'bhcu gjyp pszh envf'; // Use an App Password, NOT your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email details
        $mail->setFrom('netprimehw@gmail.com', 'Bus Booking Service');
        $mail->addAddress($email);
        $mail->Subject = "Payment Confirmation - Bus Booking";
        $mail->Body = "Dear Customer,\n\nYour payment of ₹{$_SESSION['price']} has been successfully received.\n\nTransaction ID: $txn_id\n\nYour seat has been booked.\n\nThank you for choosing our service!";

        // Send email
        if ($mail->send()) {
            $_SESSION['payment_success'] = "Payment Successful! A confirmation email has been sent.";
        } else {
            $_SESSION['payment_success'] = "Payment Successful, but email could not be sent.";
        }
    } catch (Exception $e) {
        $_SESSION['payment_success'] = "Payment Successful, but email failed. Error: " . $mail->ErrorInfo;
    }

    header('Location: ../index.php');
    exit();
} else {
    // Mark payment as failed
    $update_query = "UPDATE register SET status = 'Not Paid' WHERE email = '$email'";
    $run_query = mysqli_query($con, $update_query);

    $_SESSION['payment_error'] = "Payment Failed!";
    header('Location: ../index.php');
    exit();
}
?>

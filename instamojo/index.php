<?php
session_start();

$price = $_SESSION['price'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];

$business_email = "sb-0xg5m37577698@business.example.com"; // PayPal Business Email
$return_url = "http://localhost/OBRS/instamojo/redirect.php"; // Redirect after successful payment
$cancel_url = "http://localhost/OBRS/payment-cancel.php"; // Redirect if canceled

// Ensure proper formatting
$formatted_price = number_format((float)$price, 2, '.', '');

// Generate unique transaction ID
$_SESSION['TID'] = uniqid('PAYPAL_');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting to PayPal...</title>
</head>
<body onload="document.getElementById('paypal-form').submit();">
    <h2>Redirecting to PayPal...</h2>
    
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypal-form">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="<?= $business_email ?>">
        <input type="hidden" name="item_name" value="Bus Booking">
        <input type="hidden" name="amount" value="<?= $formatted_price ?>">
        <input type="hidden" name="currency_code" value="USD"> <!-- Change INR to USD if INR is not working -->
        <input type="hidden" name="custom" value="<?= $_SESSION['TID'] ?>">
        <input type="hidden" name="return" value="<?= $return_url ?>">
        <input type="hidden" name="cancel_return" value="<?= $cancel_url ?>">

        <input type="submit" value="Pay Now" style="display: none;">
    </form>
</body>
</html>

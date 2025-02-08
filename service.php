<?php include "db.php"; ?>
<?php session_start(); ?>

<html> 
    <head>
        <meta charset="utf-8" dir="ltr">
        <title>Our Services - Online Bus Reservation System</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <meta name="viewport"  content="width=device-width , initial-scale=1.0">
    </head>
    <?php include "header.php" ?>

    <body>
      <div class="services">
          <h1>Our Services</h1>
          <div class="cen">
              <div class="service">
                  <i class="fas fa-bus"></i>
                  <h2>Online Bus Booking</h2> 
                  <p>Book bus tickets online easily, select your preferred route, choose seats, and enjoy a stress-free travel experience.</p>
              </div>

              <div class="service">
                  <i class="fas fa-clock"></i>
                  <h2>Real-time Bus Schedule</h2> 
                  <p>Check live bus schedules anytime, view departure times, arrival status, and plan your journey in an organized way.</p>
              </div>

              <div class="service">
                  <i class="fas fa-user-check"></i>
                  <h2>Seat Selection</h2> 
                  <p>Pick your favorite seat while booking, ensuring a comfortable journey that matches your travel preference and needs.</p>
              </div>

              <div class="service">
                  <i class="fas fa-credit-card"></i>
                  <h2>Secure Online Payments</h2> 
                  <p>Pay safely using multiple options like credit/debit cards, net banking, PayPal, or UPI for secure transactions anytime.</p>
              </div>

              <div class="service">
                  <i class="fas fa-envelope"></i>
                  <h2>Booking Confirmation & E-Tickets</h2> 
                  <p>Instantly receive booking confirmations and e-tickets through email and SMS for a seamless and paperless travel experience.</p>
              </div>

              <div class="service">
                  <i class="fas fa-headset"></i>
                  <h2>24/7 Customer Support</h2> 
                  <p>Our support team is available round the clock to help resolve issues and ensure a smooth travel experience always.</p>
              </div>
          </div>
      </div>  
      
      <?php include "footer.php" ?>
    </body>
</html>

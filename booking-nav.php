
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>OBRS!</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="booking-css.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
</head>
<body>


<nav class="nav-bar">
        <div class="nav-contents">
          <div class="logo">
            <a href="index.php">OBRS</a>
          </div>
          <ul class="menu-lists">
            <div class="icon cancel-btn">
              <i class="fas fa-times"></i>
            </div>
            <li><a href="index.php">Home</a></li>
            
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="service.php">Services</a></li>
            <li><a href="signup-user.php">Signup</a></li>
            <li><a href="login-user.php">Login</a></li>
            <li><a href="login.php">Admin</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php
if(isset($_SESSION['userid']) && isset($_SESSION['email']))
{ ?>
  <li><a href="user-profile.php">Profile</a></li>
<?php } ?>

     <?php      
if(isset($_SESSION['userid']) && isset($_SESSION['email']))
{ ?>
  <li><a href="logout.php">Logout</a></li>
<?php } ?>

          </ul>
          <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>
 </nav>

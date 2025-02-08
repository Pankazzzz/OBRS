<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<?php include "header.php" ?>
<div class="center">
<h1>New Password</h1>
<?php 
      if(isset($_SESSION['info'])){
          ?>
          <div class="alert alert-success text-center">
              <?php echo $_SESSION['info']; ?>
          </div>
          <?php
      }
      ?>
      <?php
      if(count($errors) > 0){
          ?>
          <div class="alert alert-danger text-center">
              <?php
              foreach($errors as $showerror){
                  echo $showerror;
              }
              ?>
          </div>
          <?php
      }
  ?>
    

      <form  action="new-password.php" method="POST" autocomplete="off">
        <div class="txt_field">
          <input type="password" Placeholder="New Password" name="password"  required>
          <span></span>
      </div>

      <div class="txt_field">
      <input type="password"  Placeholder="Confirm Password" name="cpassword"  required>
      <span></span>
        </div>

       <input  class="login-submit forgot-submit" type="submit" name="change-password" value="Change" >
                
    </div>
  </div>
                    

                    
<script src="javascript/sandboxx.js"></script>

</html>

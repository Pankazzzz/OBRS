<?php require_once "controllerUserData.php"; ?> 
<?php include "header.php" ?>

<div class="signup-center">
      <h1>Sign up</h1>
      <p class="text-center p-text">It's quick and easy.</p>
    
    
      <div class="warning-head" style="color: red;background-color: #FEEFB3;">
    
      <?php
if($errors)
{
  foreach($errors as $value)
  { 
    echo "$value <br>";
  }
}
?>    </div>

<form method="post">
        <div class="txt_field">
          <input type="text" name="name" Placeholder="Name" required value="<?php echo $name ?>" >
          <span></span>
            </div>

            <div class="txt_field">
          <input type="text" name="userid" Placeholder="Userid" required value="<?php echo $userid ?>" >
          <span></span>
            </div>

            <div class="txt_field">
          <input type="email" name="email" Placeholder="Email" required value="<?php echo $email ?>" >
          <span></span>
          
            </div>

            <div class="txt_field">
          <input  type="password" Placeholder="Password" minlength="8" name="password"  required >
          <span></span>
          
            </div>

            <div class="txt_field">
          <input  type="password" Placeholder="Confirm Password" minlength="8" name="cpassword" required >
          <span></span>
          
            </div>

                <input type="submit" class="login-submit" value="Signup" name="signup" >
                <div class="signup_link">
                  Already a member? <a href="login-user.php">Login here</a></div>


            </div>
 

            </div>
            


            
<script src="javascript/sandboxx.js"></script>

</html>

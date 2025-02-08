<?php require_once "controllerUserData.php"; ?>

<?php include "header.php" ?>

<div class="center">
      <h2>Forgot Password</h2>
      <p class="text-center p-text">Enter your email address here.</p>

      <?php
        if(count($errors) > 0){
            ?>
            <div class="alert alert-danger text-center">
                <?php 
                    foreach($errors as $error){
                        echo $error;
                    }
                ?>
            </div>
            <?php
        }
    ?>
                   
                    
<form  action="forgot-password.php" method="post" autocomplete="">
<div class="txt_field">
<input type="email" Placeholder="Enter your email" name="email" required value="<?php echo $email ?>">
<span></span>
</div>


            
<input type="submit" class="login-submit forgot-submit" name="check-email" value="Continue">
                


            </div>
 

            </div>
            

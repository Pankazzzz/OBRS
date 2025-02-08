<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false)
{
  header('Location: login-user.php');
}
?>

<?php require_once "controllerUserData.php"; ?>
<?php include "header.php" ?>

<div class="center">
<h1>Code Verification</h1>
    <?php 
    if(isset($_SESSION['info'])){
        ?>
        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
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
                   
      <form  action="reset-code.php" method="POST" autocomplete="off">
      <div class="txt_field">
      <input type="number" name="otp" placeholder="Enter code" required>
      <span></span>
       </div>
     <input  class="login-submit forgot-submit" type="submit" name="check-reset-otp" value="Submit" >
                



<?php require_once "controllerUserData.php"; ?>

<?php
if($_SESSION['info'] == false){
    header('Location: login-user.php');  
}
?>
<?php include "header.php" ?>

<div class="center"> 

<?php 
    if(isset($_SESSION['info'])){
        ?>
        <div class="alert alert-success text-center">
        <?php echo $_SESSION['info']; ?>
        </div>
        <?php
    }
    ?>
    
      <form  action="login-user.php" method="POST">
      <input class="login-submit changed-submit" type="submit" name="login-now" value="Login Now">
          
            </div>
            </div>
</body>
</html>
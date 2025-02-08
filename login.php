<?php include "db.php";  ?>


<?php session_start(); ?>

<?php
$msg='';
if(isset($_POST['submit'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	$sql="select * from admin where username='$username' and password='$password' ";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
   if($count>0)
   {
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:admin/dashboard.php');
		die();
   }
   else
   {
		$msg="Please enter correct login details";	
	}
	
}
?>


<?php include "header.php";  ?>


 <div class="center">
      <h1>Admin Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" Placeholder="Username" name="username" required >
          <span></span>
            </div>
            <div class="txt_field">
              <input type="password"  Placeholder="Password" minlength="6" name="password" required>
              <span></span>
                </div>
                <div class="pass">Forget Password?</div>
                <input type="submit" class="login-submit" name="submit" >
                <div class="signup_link">
                  Not a member? <a href="#">Signup</a>


            </div>

            


<script src="javascript/sandboxx.js"></script>

</html>
          



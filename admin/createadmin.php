<?php include "../db.php";  ?>
<?php session_start(); ?>

<?php


$password='';
$username='';

if(isset($_POST['create_admin']))
{

$username=$_POST['username'];
$password=$_POST['password'];
$insert="INSERT INTO admin(username, password) VALUES ('". $username ."', '" . $password . "')";
$sql_insert=mysqli_query($con,$insert);
$_SESSION['msg']="Admin created Succesfully!";
header('Location:dashboard.php'); 
die();
}


?>

<?php include "header.php"; ?>

<div class="admin-content">

<div class="button-group">
<a href="createadmin.php" class="btn btn-big">Add Admin</a>
<a href="dashboard.php" class="btn btn-big">Manage Admin</a>
</div>

<div class="card-body">
<h4 class="box-title">Admins </h4>

</div>


<div class="content">
<form action="" method="post">
    <div>
    <label for="">Username</label>
    <input type="text" name="username" class="text-input">
    </div>
    <div>
    <label for="">Password</label>
    <input type="password" name="password" class="text-input">
    </div>
    <div>
        <button type="submit" name="create_admin" class="btn btn-big">Create Admin</button>
    </div>
</form>
</div>

</div>
 </div>

</body>
</html>


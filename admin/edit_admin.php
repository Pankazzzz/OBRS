<?php include "../db.php";  ?>
<?php session_start(); ?>

<?php
$username='';
$password='';
$id='';

if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="SELECT * FROM admin where id='$id' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$username=$row['username'];
}



if(isset($_POST['update_admin']))
{

    $username=$_POST['username'];
    $password=$_POST['password'];
  
    $update_bus = "UPDATE admin SET username = '$username', password = '$password' WHERE id = $id";
$update_res=mysqli_query($con,$update_bus);
$_SESSION['msg']='Admin Updated Succesfully!';
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
    <label for="username">Username</label>
    <input type="text" name="username" class="text-input" value="<?php echo $username; ?>" >
    </div>
    <div>
    <label for="">Password</label>
    <input type="password" name="password" class="text-input">
    </div>
    <div>
        <button type="submit" name="update_admin" class="btn btn-big">Create Admin</button>
    </div>
</form>
</div>

</div>
 </div>

</body>
</html>


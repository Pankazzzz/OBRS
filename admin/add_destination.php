<?php include "../db.php";  ?>
<?php session_start(); ?>

<?php


$arrival='';
if(isset($_POST['create_destination']))
{

$destination=$_POST['destination'];
$insert="INSERT INTO destination(destination) VALUES ('". $destination ."')";
$sql_insert=mysqli_query($con,$insert);
$_SESSION['msg']="Destination created Succesfully!";
header('Location:destination.php'); 
die();
}


?>

<?php include "header.php"; ?>

<div class="admin-content">

<div class="button-group">
<a href="add_destination.php" class="btn btn-big">Add Destination</a>
<a href="destination.php" class="btn btn-big">Manage Destination</a>
</div>

<div class="card-body">
<h4 class="box-title">Destination</h4>

</div>


<div class="content">
<form action="" method="post">
    <div>
    <label for="">Destination</label>
    <input type="text" name="destination" class="text-input">
    </div>
   
    <div>
        <button type="submit" name="create_destination" class="btn btn-big">Create Destination</button>
    </div>
</form>
</div>

</div>
 </div>

</body>
</html>


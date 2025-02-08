<?php include "../db.php";  ?>
<?php session_start(); ?>

<?php


$arrival='';
if(isset($_POST['create_arrival']))
{

$arrival=$_POST['arrival'];
$insert="INSERT INTO arrival(arrival) VALUES ('". $arrival ."')";
$sql_insert=mysqli_query($con,$insert);
$_SESSION['msg']="Arrival created Succesfully!";
header('Location:arrival.php'); 
die();
}


?>

<?php include "header.php"; ?>

<div class="admin-content">

<div class="button-group">
<a href="add_arrival.php" class="btn btn-big">Add Arrival</a>
<a href="arrival.php" class="btn btn-big">Manage Arrival</a>
</div>

<div class="card-body">
<h4 class="box-title">Arrival</h4>

</div>


<div class="content">
<form action="" method="post">
    <div>
    <label for="">Arrival</label>
    <input type="text" name="arrival" class="text-input">
    </div>
   
    <div>
        <button type="submit" name="create_arrival" class="btn btn-big">Create Arrival</button>
    </div>
</form>
</div>

</div>
 </div>

</body>
</html>


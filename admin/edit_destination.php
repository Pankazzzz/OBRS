<?php include "../db.php";  ?>
<?php session_start(); ?>

<?php
$destination='';

$id='';

if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="SELECT * FROM destination where destination_id='$id' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$username=$row['destination'];
}



if(isset($_POST['update_destination']))
{

    $destination=$_POST['destination'];
  
    $update_destination = "UPDATE destination SET destination = '$destination' WHERE destination_id = $id";
$update_res=mysqli_query($con,$update_destination);
$_SESSION['msg']='Destination Updated Succesfully!';
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
<h4 class="box-title">Destination </h4>

</div>


<div class="content">
<form action="" method="post">
    <div>
    <label for="destination">Destination</label>
    <input type="text" name="destination" class="text-input" value="<?php echo $destination; ?>" >
    </div>
    
    <div>
        <button type="submit" name="update_destination" class="btn btn-big">Create Arrival</button>
    </div>
</form>
</div>

</div>
 </div>

</body>
</html>


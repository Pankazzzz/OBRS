<?php include "../db.php";  ?>
<?php session_start(); ?>

<?php
$arrival='';

$id='';

if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="SELECT * FROM arrival where arrival_id='$id' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$username=$row['arrival'];
}



if(isset($_POST['update_arrival']))
{

    $arrival=$_POST['arrival'];
  
    $update_arrival = "UPDATE arrival SET arrival = '$arrival' WHERE arrival_id = $id";
$update_res=mysqli_query($con,$update_arrival);
$_SESSION['msg']='Arrival Updated Succesfully!';
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
<h4 class="box-title">Arrival </h4>

</div>


<div class="content">
<form action="" method="post">
    <div>
    <label for="arrival">Arrival</label>
    <input type="text" name="arrival" class="text-input" value="<?php echo $arrival; ?>" >
    </div>
    
    <div>
        <button type="submit" name="update_arrival" class="btn btn-big">Create Arrival</button>
    </div>
</form>
</div>

</div>
 </div>

</body>
</html>


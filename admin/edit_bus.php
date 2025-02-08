<?php include "../db.php";  ?>
<?php session_start(); ?>
<?php include "header.php"; ?>



<?php
$bustype='';
$arrival='';
$destination='';
$date='';
$time='';
$price='';
$available_seats='';
$total_seats='';
$id='';

if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="SELECT * FROM bus where bus_id= '$id' ";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
$bustype=$row['bustype'];
$arrival=$row['arrival'];
$destination=$row['destination'];
$date=$row['date'];
$time=$row['time'];
$price=$row['price'];
$available_seats=$row['available_seats'];
$total_seats=$row['total_seats'];

}



if(isset($_POST['update_bus']))
{

    $bustype=$_POST['bustype'];
    $arrival=$_POST['arrival'];
    $destination=$_POST['destination'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $price=$_POST['price'];
    $available_seats=$_POST['available_seats'];
    $total_seats=$_POST['total_seats'];

    $update_bus = "UPDATE bus SET bustype = '$bustype', arrival = '$arrival', destination = '$destination', date = '$date', time = '$time', price = '$price', total_seats = '$total_seats', available_seats = '$available_seats' WHERE bus_id = $id";
$update_res=mysqli_query($con,$update_bus);
$_SESSION['msg']='Bus Updated Succesfully!';
header('Location:bus.php'); 
die();
}

?>





<div class="admin-content">

<div class="button-group">
<a href="add_bus.php" class="btn btn-big">Add Bus</a>
<a href="bus.php" class="btn btn-big">Manage Bus</a>
</div>

<div class="card-body">
<h4 class="box-title">Buses </h4>
</div>


<div class="content">
<form action="" method="post">
    
    <div>
    <label for="">Bus type</label>
    <input type="text" name="bustype" class="text-input" value="<?php echo $bustype; ?>">
    </div>

    <div>
    <label for="">From</label>
    <input type="text" name="arrival" class="text-input" value="<?php echo $arrival; ?>">
    </div>

    <div>
    <label for="">Destination</label>
    <input type="text" name="destination" class="text-input" value="<?php echo $destination; ?>">
    </div>

    <div>
    <label for="">Total Seats</label>
    <input type="text" name="total_seats" class="text-input" value="<?php echo $total_seats; ?>">
    </div>

    
    <div>
    <label for="">Available Seats Seats</label>
    <input type="text" name="available_seats" class="text-input" value="<?php echo $available_seats; ?>">
    </div>

    <div>
    <label for="">Price</label>
    <input type="text" name="price" class="text-input" value="<?php echo $price; ?>">
    </div>

    <div>
    <label for="">Date</label>
    <input type="date" name="date" class="text-input" value="<?php echo $date; ?>">
    </div>


    <div>
    <label for="">Time</label>
    <input type="time" name="time" class="text-input" value="<?php echo $time; ?>">
    </div>



    <div>
        <button type="update" name="update_bus" class="btn btn-big">Update Bus</button>
    </div>
</form>
</div>

</div>
 </div>

</body>
</html>


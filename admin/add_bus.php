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


if(isset($_POST['create_bus']))
{

$bustype=$_POST['bustype'];
$arrival=$_POST['arrival'];
$destination=$_POST['destination'];
$date=$_POST['date'];
$time=$_POST['time'];
$price=$_POST['price'];
$available_seats=$_POST['available_seats'];
$total_seats=$_POST['total_seats'];

$insert="INSERT INTO bus(bustype, arrival, destination, total_seats,available_seats, price,date,time) VALUES ('". $bustype ."', '" . $arrival . "', '". $destination ."', '". $total_seats ."', '". $available_seats ."','". $price ."', '". $date ."','". $time ."')";
$sql_insert=mysqli_query($con,$insert);
$_SESSION['msg']="Bus Added Succesfully!";
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
    <input type="text" name="bustype" class="text-input">
    </div>

    <div>
    <label for="">From</label>
    <input type="text" name="arrival" class="text-input">
    </div>

    <div>
    <label for="">Destination</label>
    <input type="text" name="destination" class="text-input">
    </div>

    <div>
    <label for="">Total Seats</label>
    <input type="text" name="total_seats" class="text-input">
    </div>

    
    <div>
    <label for="">Available Seats Seats</label>
    <input type="text" name="available_seats" class="text-input">
    </div>

    <div>
    <label for="">Price</label>
    <input type="text" name="price" class="text-input">
    </div>

    <div>
    <label for="">Date</label>
    <input type="date" name="date" class="text-input">
    </div>


    <div>
    <label for="">Time</label>
    <input type="time" name="time" class="text-input">
    </div>



    <div>
        <button type="submit" name="create_bus" class="btn btn-big">Create Bus</button>
    </div>
</form>
</div>

</div>
 </div>

</body>
</html>


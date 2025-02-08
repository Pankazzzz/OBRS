
<?php include "db.php";  ?>


<?php session_start(); ?>


<?php 
$msg='';
$available_seats='';
$success='';
$arrival = $_SESSION['arrival'];
$destination = $_SESSION['destiny'];
$date = $_SESSION['date'];


  $sql="select * from bus where arrival='$arrival' and destination='$destination' and date='$date' ";
  $res=mysqli_query($con,$sql);

  $count=mysqli_num_rows($res);
   if($count>0)
   {
    $success="Available Bussses";
    $msg='';
    
   }
   else
   {
       $success='';
		$msg="No Busses Available on this date";	
   }

?>



<?php include "booking-nav.php" ?>


<div class="table-container">
    
<div class="warning-heading">
                            <?php echo $msg; ?>
 </div>

 <div class="success-heading">
                            <?php echo $success; ?>
 </div>


<table class="table">
    
<thead>
    
<tr>
<th>Bus</th>
<th>Bus Type</th>
<th>Arrival</th>
<th>Destination</th>
<th>Total Seats</th>
<th>Available Seats</th>
<th>Date</th>
<th>Price</th>
<th>Time</th>
<th>#</th>
</tr>
</thead>

<tbody>

<?php
            while($row=mysqli_fetch_assoc($res)) {
?>

<tr>
<td data-label="Bus"><img src="buss.png"  height="100" width="180"></td>
<td data-label="Bus Type"><?php echo $row['bustype'] ?></td>
<td data-label="Arrival"><?php echo $row['arrival'] ?></td>
<td data-label="Destination"><?php echo $row['destination'] ?></td>
<td data-label="Total Seats"><?php echo $row['total_seats'] ?></td>
<?php
$query = "select * from seat where arrival='" . $row['arrival'] . "' and destination = '" . $row['destination'] . "' and time = '" . $row['time'] . "' and date = '" . $row['date'] . "'";
$result = mysqli_query($con,$query);
$available_seats=intval($row['total_seats'])-mysqli_num_rows($result);
?>
<td data-label="Available Seats"><?php echo $available_seats ?></td>
<td data-label="Date"><?php echo $row['date'] ?></td>
<td data-label="Price"><?php echo $row['price'] ?></td>
<td data-label="Time"><?php echo $row['time'] ?></td>


<td data-label="#">
<form method="post" action="seat.php?price=<?php echo intval($row['price']);?>">
<input type="hidden"  name="arrival" value="<?php echo $row['arrival'] ?>">
<input type="hidden"  name="destination" value="<?php echo $row['destination'] ?>">
<input type="hidden"  name="date" value="<?php echo $row['date'] ?>">
<input type="hidden"  name="time" value="<?php echo $row['time'] ?>">
<input type="hidden"  name="seatno" value="<?php echo intval($row['total_seats']) ?>">
<input type="submit" name="booking" class="table-btn" value="Book Now">
</form>
</td>
</tr>

<?php } ?>
</tbody>
</table>
</div>

</body>

<script src="javascript/sandboxx.js"></script>

</html>


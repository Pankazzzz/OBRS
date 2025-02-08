<?php include "../db.php";  ?>
<?php session_start(); ?>

<?php
$msg='';        //<td><a href="" class="badge badge-complete">Publish</a></td>
$_SESSION['msg']='';

if($_SESSION['msg'])
{
$msg=$_SESSION['msg'];
$_SESSION['msg']='';
}

$res='';
$sql="select * from bus";
$res=mysqli_query($con,$sql);
?>

<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$delete="DELETE FROM bus where bus_id='$id' ";
$res_delete=mysqli_query($con,$delete);
$_SESSION['msg']='Bus Deleted Succesfully!';
header('Location:bus.php'); 
die();
}

?>

<?php include "header.php"; ?>

<div class="admin-content">


<div class="button-group">
<a href="add_bus.php" class="btn btn-big">Add Bus</a>
<a href="" class="btn btn-big">Manage Bus</a>
</div>

<div class="card-body">
<h4 class="box-title">Buses </h4>
<div class="warning">
                                <?php 
                                echo $msg;
                                $msg=''; 
                                ?>
     </div>
</div>


     


<div class="content">

<table>
    <thead>
        <th>Bus Type</th>
        <th>From</th>
        <th>Destination</th>
        <th>Total Seats</th>
        <th>Available Seats</th>
        <th>Price</th>
        <th>Date</th>
        <th>Time</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php 
                while($row=mysqli_fetch_assoc($res)) {
    ?>
        <tr> 
                <td><?php echo $row['bustype'] ?></td>
                <td><?php echo $row['arrival'] ?></td>
                <td><?php echo $row['destination'] ?></td>
                <td><?php echo $row['total_seats'] ?></td>
                <td><?php echo $row['available_seats'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['time'] ?></td>

                
        <td><a href="edit_bus.php?id=<?php echo $row['bus_id'] ?>" class="badge badge-edit">Edit</a></td>
        <td><a href="bus.php?id=<?php echo $row['bus_id'] ?>" class="badge badge-delete">Delete</a></td>

                
</tr>
<?php } ?>


    </tbody>
</table>
</div>

</div>
 </div>

</body>
</html>


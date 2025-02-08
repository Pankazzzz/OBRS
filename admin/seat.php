<?php include "../db.php";  ?>
<?php session_start(); ?>

<?php
$_SESSION['msg']='';
$msg='';
if($_SESSION['msg'])
{
$msg=$_SESSION['msg'];
$_SESSION['msg']='';
}
$res='';
$sql="select * from seat";
$res=mysqli_query($con,$sql);
?>



<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$delete="DELETE FROM seat where cat_id='$id' ";
$res_delete=mysqli_query($con,$delete);
$_SESSION['msg']='Record Deleted Succesfully!';
header('Location:seat.php'); 
die();
}
?>


<?php include "header.php"; ?>

<div class="admin-content">

<div class="button-group">
<a href="" class="btn btn-big">Manage Seats</a>
</div>

<div class="card-body">
<h4 class="box-title">Seats Inventory</h4>
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
        <th>Id</th>
        <th>Userid</th>
        <th>Number</th>
        <th>PNR</th>
        <th>Date</th>
        <th>Arrival</th>
        <th>Destination</th>
        <th>Time</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php 
                while($row=mysqli_fetch_assoc($res)) {
    ?>
        <tr> 
                <td><?php echo $row['cat_id'] ?></td>
                <td><?php echo $row['userid'] ?></td>
                <td><?php echo $row['number'] ?></td>
                <td><?php echo $row['PNR'] ?></td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['arrival'] ?></td>
                <td><?php echo $row['destination'] ?></td>
                <td><?php echo $row['time'] ?></td>

                
        <td><a href="seat.php?id=<?php echo $row['cat_id'] ?>" class="badge badge-delete">Delete</a></td>
        

                
</tr>
<?php } ?>


    </tbody>
</table>
</div>

</div>
 </div>

</body>
</html>


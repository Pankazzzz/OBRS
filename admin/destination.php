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

$sql="SELECT * FROM destination";
$res=mysqli_query($con,$sql);

?>




<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$delete="DELETE FROM destination where destination_id='$id' ";
$res_delete=mysqli_query($con,$delete);
$_SESSION['msg']='Destination Deleted Succesfully!';
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
        <th>Destination</th>
      
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php
            while($row=mysqli_fetch_assoc($res)) {
    ?>
        <tr>
        <td><?php echo $row['destination_id'] ?></td>
        <td><?php echo $row['destination'] ?></td>
        
        <td><a href="edit_destination.php?id=<?php echo $row['destination_id'] ?>" class="badge badge-edit">Edit</a></td>
        <td><a href="destination.php?id=<?php echo $row['destination_id'] ?>" class="badge badge-delete">Delete</a></td>
</tr>
<?php } ?>





    </tbody>
</table>
</div>

</div>
 </div>

</body>
</html>


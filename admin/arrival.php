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

$sql="SELECT * FROM arrival";
$res=mysqli_query($con,$sql);

?>




<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$delete="DELETE FROM arrival where arrival_id='$id' ";
$res_delete=mysqli_query($con,$delete);
$_SESSION['msg']='Record Deleted Succesfully!';
header('Location:arrival.php'); 
die();
}
?>


<?php include "header.php"; ?>

<div class="admin-content">

<div class="button-group">
<a href="add_arrival.php" class="btn btn-big">Add Arrival</a>
<a href="" class="btn btn-big">Manage Arrival</a>
</div>

<div class="card-body">
<h4 class="box-title">Arrival</h4>
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
        <th>Arrival</th>
      
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php
            while($row=mysqli_fetch_assoc($res)) {
    ?>
        <tr>
        <td><?php echo $row['arrival_id'] ?></td>
        <td><?php echo $row['arrival'] ?></td>
        
        <td><a href="edit_arrival.php?id=<?php echo $row['arrival_id'] ?>" class="badge badge-edit">Edit</a></td>
        <td><a href="arrival.php?id=<?php echo $row['arrival_id'] ?>" class="badge badge-delete">Delete</a></td>
</tr>
<?php } ?>





    </tbody>
</table>
</div>

</div>
 </div>

</body>
</html>


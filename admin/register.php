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
$sql="select * from register";
$res=mysqli_query($con,$sql);
?>

<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$delete="DELETE FROM register where register_id='$id' ";
$res_delete=mysqli_query($con,$delete);
$_SESSION['msg']='Record Deleted Succesfully!';
header('Location:register.php'); 
die();
}

?>


<?php include "header.php"; ?>

<div class="admin-content">

<div class="button-group">
<a href="add_bus.php" class="btn btn-big">Manage Booked</a>
</div>

<div class="card-body">
<h4 class="box-title">Register</h4>
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
        <th>Register Id</th>
        <th>Userid</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Price</th>
        <th>Status</th>
        <th>Message</th>
      
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php 
                while($row=mysqli_fetch_assoc($res)) {
    ?>
        <tr> 
                <td><?php echo $row['register_id'] ?></td>
                <td><?php echo $row['userid'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><?php echo $row['contact'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['message'] ?></td>


                
    
        <td><a href="register.php?id=<?php echo $row['register_id'] ?>" class="badge badge-delete">Delete</a></td>


                
</tr>
<?php } ?>


    </tbody>
</table>
</div>

</div>
 </div>

</body>
</html>


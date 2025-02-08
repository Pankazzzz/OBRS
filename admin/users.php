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
$sql="SELECT * FROM usertable";
$res=mysqli_query($con,$sql);
?>


<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$delete="DELETE FROM usertable where id='$id' ";
$res_delete=mysqli_query($con,$delete);
$_SESSION['msg']='Record Deleted Succesfully!';
header('Location:users.php'); 
die();
}
?>



<?php include "header.php"; ?>

<div class="admin-content">
<div class="button-group">
<a href="" class="btn btn-big">Manage Users</a>
</div>

<div class="card-body">
<h4 class="box-title">Users </h4>
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
        <th>Name</th> 
        <th>Email</th>
        <th>Status</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php
            while($row=mysqli_fetch_assoc($res)) {
    ?>
        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['userid'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['status'] ?></td>
        <td><a href="users.php?id=<?php echo $row['id'] ?>" class="badge badge-delete">Delete</a></td>
</tr>
<?php } ?>

</tbody>
</table>
</div>
</div>
 </div>
</body>
</html>


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
$sql="SELECT * FROM contact_us";
$res=mysqli_query($con,$sql);

?>


<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$delete="DELETE FROM contact_us where id='$id' ";
$res_delete=mysqli_query($con,$delete);
$_SESSION['msg']='Record Deleted Succesfully!';
header('Location:contact_us.php'); 
die();
}
?>



<?php include "header.php"; ?>

<div class="admin-content">

<div class="button-group">
<a href="" class="btn btn-big">Manage messages</a>
</div>

<div class="card-body">
<h4 class="box-title">Messages</h4>
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
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Message</th>
        <th>Added On</th>
      
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    <?php
            while($row=mysqli_fetch_assoc($res)) {
    ?>
        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['mobile'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['comment'] ?></td>
        <td><?php echo $row['added_on'] ?></td>
        
        <td><a href="contact_us.php?id=<?php echo $row['id'] ?>" class="badge badge-delete">Delete</a></td>
</tr>
<?php } ?>





    </tbody>
</table>
</div>

</div>
 </div>

</body>
</html>


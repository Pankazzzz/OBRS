<?php include "db.php";  ?>
<?php session_start(); ?>

<?php include "header.php";  ?>



<?php
$result='';
$info='';
if(isset($_POST['submit']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);    
    $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
    $message=mysqli_real_escape_string($con,$_POST['message']);
    $added_on = date('d-m-y');

    $query = "INSERT INTO contact_us(name,email,mobile,comment,added_on) VALUES('{$name}','{$email}','{$mobile}','{$message}',now())" ;
    $result = mysqli_query($con,$query);
    if(!$result)
    {
                die("Query Failed" . mysqli_error($con));
                $info="Try again";
    }  
   
$info="Your message succesfully sent";
}
?>


<body>

    <div class="contact-container contact-body">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2 class="contact-line">Contact Us</h2>
                <form action="contact.php" method="post">

        

                <input type="text" class="field" name="name" placeholder="Your Name" required>
                <input type="text" class="field" name="email" placeholder="Your Email" required>
                <input type="text" class="field" name="mobile" placeholder="Phone" required>
                <textarea placeholder="Message" name="message" class="field" required></textarea >
                
                <input type="submit" class="contact-bttn" name="submit">
      <?php         
                if($info)
                { ?>
                
                    <div class='bg-msg'>
                    <p class='bg-success'><?php echo $info; ?></p>
                    </div>
                
               <?php } ?>
                </form>
               
                
            </div>
        </div>
    </div>



    <script src="javascript/sandboxx.js"></script>

</html>

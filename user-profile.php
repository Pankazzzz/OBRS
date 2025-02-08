
<?php include "db.php";  ?>


<?php session_start(); ?>


<?php 
$msg='';
$available_seats='';
$success='';
$userid_register='';
$name='';
$email='';
$address='';
$contact='';
$price='';
$status='';
$email_register='';
$seats=array();
$date_user='';
$arrival_user='';
$destination_user='';
$time_user='';


if(isset($_SESSION['email']) && isset($_SESSION['userid']))
{
    $userid=$_SESSION['userid'];
    $email=$_SESSION['email'];
    $sql="select * from register where userid='$userid' and email='$email' ";
    $res=mysqli_query($con,$sql);   
    $count=mysqli_num_rows($res);
    while($row2=mysqli_fetch_assoc($res))
    {
    $userid_register=$row2['userid'];
    $name=$row2['name'];
    $email_register=$row2['email'];
    $address=$row2['address'];
    $contact=$row2['contact'];
    $price=$row2['price'];
    $status=$row2['status'];
    }

    if($count>0)
    {
    $success="Your Profile";
    $msg='';
                    $sql1="select * from seat where userid='$userid' ";
                    $res1=mysqli_query($con,$sql1);        
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                    $date_user=$row1['date'];
                    $arrival_user=$row1['arrival'];
                    $destination_user=$row1['destination'];
                    $time_user=$row1['time'];
                    array_push($seats,$row1['number']);
                    }
    }
    else
    {
      $success='';
      $msg="You have not booked yet yet.";	
    }
}
else
    {
      $success='';
      $msg="You have not login yet yet.";	
    }





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>OBRS!</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>


*{
    margin:0;
    font-family: 'Poppins', sans-serif;
    padding:0;
    box-sizing:border-box;
}
    
body
{
    background-color:#F0F3F4;;
    font-family:sans-serif;
}

    .nav-bar
    {  
        width: 100%;
        z-index: 2;
        background: #339D70;
        padding: 10px 0;
        transition: all 0.3s ease;
        
    }
    
    
    .nav-contents
    {
        max-width: 100%;
        margin: auto;
        padding: 0px 25px;
        
    }
    
    .nav-bar .nav-contents
    {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }


    .nav-bar .logo a
{
  
    color: #fff;
    font-size: 30px;
    font-weight: 600;
    text-decoration: none;
}

.nav-bar .menu-lists
{
    display: inline-flex;
}
  
.menu-lists li
{
    list-style: none;
    margin: 0px;;
    padding: 0;
    
}
  
.nav-bar ul{
  
  padding-bottom: 0px;
  margin-bottom: 0px;
}
    
    
.nav-bar .logo a
{
  
    color: #fff;
    font-size: 30px;
    font-weight: 600;
    text-decoration: none;
}

.print-btn
{
    border:2px solid black !important;
         width:130px;
         text-decoration:none;
         line-height:35px;
         display:inline-block;
         background-color:#FF1046;
         font-weight:medium;
         color:#ffffff;
         text-align:center;
         vertical-align:middle;
         user-select:none;
         border:1px solid transparent;
         font-size:14px;
         opacity:1;
         cursor:pointer;
}




.nav-bar .menu-lists
{
    display: inline-flex;
}
  
.menu-lists li
{
    list-style: none;
    margin: 0px;;
    padding: 0;
    
}
  
.nav-bar ul{
  
  padding-bottom: 0px;
  margin-bottom: 0px;
}

.menu-lists li a
{
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    margin-left: 25px;
     text-decoration: none;
     font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    transition: all 0.3s ease;
}
  
.menu-lists li a:hover
{
    color: black;
}

.icon
{
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    display: none;
}
  
.menu-lists .cancel-btn
{
    position: absolute;
    right: 30px;
    top: 20px;
}

@media (max-width: 1230px)
{
    .nav-contents{
      padding: 0 25px;
    }
}

@media (max-width: 1100px) 
{
    .nav-contents{
      padding: 0 40px;
    }
}

@media (max-width: 900px) 
{
    .nav-contents{
      padding: 0 30px;
    }
}

@media (max-width: 868px) 
{
    body.disabled{
      overflow: hidden;
    }

    .icon{
      display: block;
    }
    
    .icon.hide{
      display: none;
    }

    .nav-bar .menu-lists{
        position: fixed;
        height: 100vh;
        width: 100%;
        max-width: 400px;
        left: -100%;
        top: 0px;
        display: block;
        padding: 40px 0;
        text-align: center;
        background: #222;
        transition: all 0.3s ease;
    }

    
    .nav-bar.show .menu-lists{
      left: 0%;
    }
    .nav-bar .menu-lists li{
        margin-top: 45px;
    }

    .nav-bar .menu-lists li a{
        font-size: 23px;
        margin-left: -100%;
        transition: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    
    .nav-bar.show .menu-lists li a{
        margin-left: 0px;
      }     
      
}


@media (max-width: 380px) 
{
    .nav-bar .logo a{
      font-size: 27px;
    }
}




.table-container{
    
    padding:0 10%;
    margin-top: 20px;
}
    
    .table-container .warning-heading{
        font-size:25px;
        font-family:Georgia, 'Times New Roman', Times, serif;
        text-align:center;
        color:black;
        background-color: lightpink;
        margin-bottom:40px;
        margin-top: 20px;;
        }

        
    .table-container .success-heading{
        font-size:25px;
        font-family:Georgia, 'Times New Roman', Times, serif;
        text-align:center;
        color:black;
        background-color: lightgreen;
        margin-bottom:40px;
        margin-top: 20px;;
        }
        
        .table{
        width:100%;
        border-collapse:collapse;
        }
        
        .table thead{
        background-color:#ee2828;
        }
        
        .table thead tr th{
        font-size:14px;
        font-weight:600;
        letter-spacing:0.35px;
        color:#FFFFFF;
        opacity:1;
        padding:12px;
        vertical-align:top;
        border:1px solid #dee2e685;
        }
        
        .table tbody tr td{
        font-size:14px;
        letter-spacing:0.35px;
        font-weight:normal;
        color:#f1f1f1;
        background-color:#3c3f44;
        padding:8px;
        text-align:center;
        border:1px solid #dee2e685;
        }
        
        .table .text-open{
        font-size:14px;
        font-weight:bold;
        letter-spacing:0.35px;
        color:#ff1046;
        }
        
        .table  tbody tr td .table-btn{
         width:130px;
         text-decoration:none;
         line-height:35px;
         display:inline-block;
         background-color:#FF1046;
         font-weight:medium;
         color:#ffffff;
         text-align:center;
         vertical-align:middle;
         user-select:none;
         border:1px solid transparent;
         font-size:14px;
         opacity:1;
        }
        
        @media (max-width:1550px)
        {
        .table thead{
        display:none !important;
        }
        
        .table, .table tbody, .table tr, .table td 
        {
        display:block !important;
        width:100% !important;
        }
        
        .table tr{
        margin-bottom:15px !important;
        }
        
        .table tbody tr td{
        text-align:right !important;
        padding-left:50% !important;
        position:relative !important;
        z-index: -1 !important;
        }
        
        .table td:before{
        content:attr(data-label) !important;
        position:absolute !important;
        z-index: -1 !important;
        left:0 !important; 
        width:50% !important;
        padding-left:15px !important;
        font-weight:600px !important;
        font-size:14px !important;
        text-align:left !important;
        }
        

    
    
    
    
    </style>
</head>
<body>

<nav class="nav-bar">

        <div class="nav-contents">
          <div class="logo">
            <a href="index.php">OBRS</a>
          </div>
          <ul class="menu-lists">
            <div class="icon cancel-btn">
              <i class="fas fa-times"></i>
            </div>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="service.php">Services</a></li>
            <li><a href="signup-user.php">Signup</a></li>
            <li><a href="login-user.php">Login</a></li>
            <li><a href="login.php">Admin</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php
if(isset($_SESSION['userid']) && isset($_SESSION['email']))
{ ?>
  <li><a href="user-profile.php">Profile</a></li>
<?php } ?>

<?php
    if(isset($_SESSION['userid']) && isset($_SESSION['email']))
{ ?>
  <li><a href="logout.php">Logout</a></li>
<?php } ?>


          </ul>
          <div class="icon menu-btn">
            <i class="fas fa-bars"></i>
          </div>
        </div>
 </nav>


 
 
 
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
    <th>User Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Date Of Journey</th>
    <th>Arrival</th>
    <th>Destination</th>
    <th>Seats</th>
    <th>Time/th>
    <th>Price</th>
    <th>Status</th>


               

    </tr>
    </thead>
    
    <tbody>
    
    
    <tr>
    <td data-label="Bus"><img src="buss.png"  height="100" width="180"></td>
    <td data-label="Userid"> <?php echo $userid_register ?></td>
    <td data-label="Name"> <?php echo $name ?></td>
    <td data-label="Email"><?php echo $email_register ?></td>
    <td data-label="Address"><?php echo $address ?></td>
   
    <td data-label="Contact"><?php echo $contact ?></td>
    <td data-label="Date"><?php echo $date_user ?></td>
    <td data-label="Arrival"><?php echo $arrival_user ?></td>
    <td data-label="Destination"><?php echo $destination_user ?></td>
    
    <td data-label="Seats">
    <?php
    foreach ($seats as $value) 
    {
        echo "$value <br>";
    }  
    ?>
    </td>

    <td data-label="Time"><?php echo $time_user ?></td>

    <td data-label="Price"><?php echo $price ?></td>
    <td data-label="Status" ><?php  echo $status ?></td>
 
    

    
    </tr>
    
    

    
 <form>
  <input type="button" class="print-btn" onclick="window.print()" value="Print Your Ticket!"/>
</form>
    </tbody>
    </table>
    </div>
    
    </body>
    
    <script src="javascript/sandboxx.js"></script>
    </body>
    </html>
    

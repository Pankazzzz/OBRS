<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['userid']);
header('location:index.php');
die();
?>
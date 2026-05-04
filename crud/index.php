<?php 
session_start();
// check if user is logged in 
if(!isset($_SESSION['username'])){
header('location:signin.php');
exit();
}



?>

<a href = "logout.php" > logout </a>



<h2>Welcome to my homepage<?=$_SESSION['username'];?></h2>
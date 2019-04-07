<?php
session_start();

if(isset($_SESSION['username'])){
    echo "Welcome ". $_SESSION['username'];
}else{
    //if not logged in go back to login page
    header('Location:login.php');
}
?>
<a href="logout.php">logout</a>
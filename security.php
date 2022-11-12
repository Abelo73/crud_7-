<?php
//session_start();

if(!$_SESSION['fullname']){
    header('location:login.php');
}

?>
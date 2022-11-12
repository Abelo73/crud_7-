<?php
session_start();
include('connect.php');
include('security.php');

if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    $delete = "DELETE FROM admin_table where id = '$id'";

    $result = mysqli_query($conn,$delete);
    if($result){
        //echo "Deleted successfuly";
        header('location:display_admin.php');
        }
    }else{
        echo  "Faild to delete";
    }



?>
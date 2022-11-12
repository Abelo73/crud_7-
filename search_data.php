<?php
session_start();
include('connect.php');
include('security.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search data history</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>

    <body>
        <div class="container " style="max-width:70% ;">
            <div class="card  text-center bg-light  m-auto mt-5  " style="  border:dashed red;">
                <h2 class="bg-light text-dark text-uppercase">Full Information</h2>
                <div class=" align-items-center mx-lg-5 ">
                    <div class="card card-body">
                        <div class="bg-light text-start text-dark p-2">

                            <?php

$data =$_GET['id'];
//echo $data;

$sql ="SELECT *FROM users_table where id = '$data'";

$result = mysqli_query($conn,$sql);

if($result){
    $row = mysqli_fetch_assoc($result);
    echo "ID number: ". $row['id'];
    echo"<br>";
    echo "<b>Full Name:</b> ". '<i><b>'.$row['fullname'].'</i></b>';echo"<br>";
    echo "Email ID: ". $row['email'];echo"<br>";
    echo "Mobile Number: ". $row['mobile'];echo"<br>";
    echo "Bank Account: ". $row['bank_account'];echo"<br>";
    echo "Age: ". $row['age'];echo"<br>";
    echo "Sex: ". $row['sex'];echo"<br>";
    echo "User Type: ". $row['user_type'];echo"<br>";
    echo "Registration Date: ". $row['created_date'];echo"<br>";
    //echo $row[''];"<br>";

   // $id = $row['id'];
}


 ?>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-2"><a href="admin_profile.php"
                    class="text-light text-decoration-none">Back</a></button>
        </div>
    </body>

</html>
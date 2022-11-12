<?php

session_start();
include('connect.php');
include('security.php');

//if the submit button is clicked

if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $reciver_name = mysqli_real_escape_string($conn, $_POST['reciver_name']);
    $reciver_account = mysqli_real_escape_string($conn, $_POST['reciver_account']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);


    //inserting the comment to the leave comment table

    $sql = "INSERT INTO pay_penality(fullname,mobile,reciver_name,reciver_account,amount)  values('$fullname','$mobile','$reciver_name','$reciver_account','$amount')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $messages[] = "Penality Payment  done successfuly";
        header('location:view_penality_transaction.php');
    } else {
        $errors[] = "Faild to send Pay";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pay Penality</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container my-5 shadow p-3">
            <h3 class="text-center text-dark text-uppercase">Pay Penality</h3>
            <form class="form-group" method="POST">
                <div class="messages">
                    <?php
                if (isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }

                ?>
                </div>
                <div class="errors">
                    <?php
                if (isset($errors)) {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }


                ?>


                </div>
                <div class="">
                    <label>Full Name</label>
                    <input type="text" name="fullname" placeholder="Enter Full Name" class="form-control">
                </div>


                <div class=" ">
                    <label>Mobile</label>
                    <input type="text" name="mobile" placeholder="Enter mobile" class="form-control">
                </div>
                <div class=" ">
                    <label>Reciver Name</label>
                    <input type="text" name="reciver_name" placeholder="Enter Reciver Name" class="form-control">
                </div>
                <div class=" ">
                    <label>Reciver Account</label>
                    <input type="text" name="reciver_account" placeholder="Enter Reciver Account" class="form-control">
                </div>
                <div class=" ">
                    <label>Amount</label>
                    <input type="number" name="amount" placeholder="Enter Amount in BIRR" class="form-control">
                </div>



                <button class="btn btn-primary mt-2" type="submit" name="submit">Submit</button>
                <div>
                    <a href="user_profile.php" class="btn btn-warning mt-2"> back</a>
                </div>
            </form>
        </div>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

</html>
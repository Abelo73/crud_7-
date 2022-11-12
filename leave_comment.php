<?php
session_start();
include('security.php');
include('connect.php');

//if the submit button is clicked

if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $leave_comment = mysqli_real_escape_string($conn, $_POST['leave_comment']);

    //inserting the comment to the leave comment table

    $sql = "INSERT INTO leave_comment(fullname,email,mobile,comment)  values('$fullname','$email','$mobile','$leave_comment')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
       // $messages[] = "Comment sent successfuly";
        header('location:user_profile.php');
    } else {
        $errors[] = "Faild to send comment";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration page</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container my-5 shadow p-3">
            <h3 class="text-center text-dark text-uppercase">Leave your comment to the Admin</h3>
            <form class="form-group" method="POST">
                <div class="message">
                    <?php
                if (isset($message)) {
                    foreach ($message as $message) {
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
                    <input type="text " name="fullname" placeholder="Enter Full Name" class="form-control">
                </div>
                <div class=" ">
                    <label>Email</label>
                    <input type="email " name="email" placeholder="Enter email" class="form-control" value="">
                </div>

                <div class=" ">
                    <label>Mobile</label>
                    <input type="text " name="mobile" placeholder="Enter mobile" class="form-control">
                </div>
                <div>
                    <label>Comment</label>
                    <textarea name="leave_comment" class="form-control text-body" placeholder="leave your comment here!"
                        required>

                    </textarea>
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
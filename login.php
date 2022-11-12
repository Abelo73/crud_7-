<?php
include('connect.php');
if (isset($_POST['login'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);

    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);


    if (empty($fullname) ||  empty($password_1 || empty($user_type))) {
        $errors[] = "fullname, user type and password are required";
    } elseif ($user_type == "User") {
        //login as user

        $sql  = "SELECT * FROM users_table where fullname = '$fullname' and password ='$password_1' limit 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)) {
            $rows = mysqli_fetch_assoc($result);
           // $fullname = $rows['fullname'];
            $email = $rows['email'];
            $mobile = $rows['mobile'];
            $photo = $rows['photo'];
            //echo "login success!";

            session_start();
            //$_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            $_SESSION['photo'] = $photo;
           


            header('location:user_profile.php');
        } else {
            $errors[] = "Incorrect Username, password and User type";
        }
    } elseif ($user_type == "Admin") {
        //login as admin
        $sql  = "SELECT * FROM admin_table where fullname = '$fullname' and password ='$password_1' limit 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)) {

            $rows = mysqli_fetch_assoc($result);
            $fullname = $rows['fullname'];
            $email = $rows['email'];
            $mobile = $rows['mobile'];
            $photo = $rows['photo'];

            //echo "login success!";


            session_start();
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            $_SESSION['photo'] = $photo;
            $_SESSION['mobile'] = $mobile;
            $_SESSION['photo'] = $_POST['photo'];

            header('location:admin_profile.php');
        } else {
            $errors[] = "Incorrect username, password and Admin";
        }
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
            <h3 class="text-center text-dark text-uppercase bg-priamry">Register Here</h3>
            <form class="form-group" method="POST" action="login.php">

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

                <div>
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter fullname">
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="password_1" class="form-control" placeholder="Enter password">
                </div>
                <select class="form-select" name="user_type">
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>

                <button class="btn btn-primary mt-2" type="submit" name="login">Login</button>
                <!-- Not yet an account?<a href="user.php"> Register</a> -->
            </form>
        </div>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

</html>
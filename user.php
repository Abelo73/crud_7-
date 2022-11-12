<?php
session_start();

include('connect.php');
include('security.php');


//if the submit button is clicked

if (isset($_POST['submit']) && isset($_FILES['my_images'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $bank_account = mysqli_real_escape_string($conn, $_POST['bank_account']);

    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    $img_name  = $_FILES['my_images']['name'];
    $img_size  = $_FILES['my_images']['size'];
    $img_type  = $_FILES['my_images']['type'];
    $tmp_name  = $_FILES['my_images']['tmp_name'];
    $error  = $_FILES['my_images']['error'];


    //validating
    if ($password_1 != $password_2) {
        $errors[] = "Password deosnot match";
    } elseif ($usertype == "Admin") {
        //checking the if the data is exists before saving to the database

        //checking if the user is exists in the admin table?

        $sql = "SELECT *FROM admin_table where fullname = '$fullname' or email = '$email' limit 1 ";
        $result = mysqli_query($conn, $sql);

        $fetch_user = mysqli_fetch_assoc($result);
        if ($fetch_user['email'] === $email) {
            $errors[] =  "Email is already exists";
        } else {

            //validating the photo before inserting to the database.

            if($error===0){
                if($img_size>1250000){
                    $errors[] ="Too large file";
        
                }else{
                     echo "Not more than 1mb";
                    $im_ext = pathinfo($img_name,PATHINFO_EXTENSION);
                    // echo $im_ext;
                    $img_ex_loc = strtolower($im_ext);
                    $allowed_ext = array("jpg","jpeg","png");
        
                    if(in_array($img_ex_loc,$allowed_ext)){
                        $new_img_name = uniqid("IMG-",true).'.'.$img_ex_loc;
                        $img_uploaded_path = "uploads/".$new_img_name;
                        move_uploaded_file($tmp_name,$img_uploaded_path);
                        echo "Allowed extenstions you can insert it";
        
                        //inserting into database 
        
                        // $sql ="INSERT INTO admin_table(fullname,email,user_type,mobile,bank_account,age,photo,password,created_date) VALUES('$fullname','$email','$usertype','$mobile','$bank_account','$age','$new_img_name','$password_1')";
        
                        // $result =mysqli_query($conn,$sql);
        
                        
                    
            //register to the  database
            $password = $password_1;
            $sql = "INSERT INTO admin_table(fullname,email,user_type,mobile,bank_account,age,photo,password)  values('$fullname','$email','$usertype','$mobile','$bank_account','$age','$new_img_name','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                //echo "Data inserted Success";
                header('location:display_admin.php');
            } else {
                $errors[] = "Data Not inserted";
            }
         }
       }
      }
    }


    } elseif ($usertype == "User") {

        //checking the if the data is exists before saving to the database


        //checking if the user is exists in the admin table?

        $sql = "SELECT *FROM users_table where fullname = '$fullname' or email = '$email' limit 1 ";
        $result = mysqli_query($conn, $sql);

        $fetch_user = mysqli_fetch_assoc($result);
        if ($fetch_user['email'] === $email) {
            $errors[] = "Email is already exists";
        } else {
            //register to the  database
            $password = $password_1;
            $sql = "INSERT INTO users_table(fullname,email,user_type,mobile,bank_account,age,password)  values('$fullname','$email','$usertype','$mobile','$bank_account','$age','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                //echo "Data inserted successfuly";
                header('location:display_user.php');
            } else {
                $errors[] = "Data Not inserted into User table";
            }
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
            <h3 class="text-center text-dark text-uppercase">Register Here</h3>
            <form class="form-group" method="POST" enctype="multipart/form-data">
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
                    <label>Select User type</label>
                    <select class="form-select" name="usertype">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <div class=" ">
                    <label>Mobile</label>
                    <input type="text " name="mobile" placeholder="Enter mobile" class="form-control">
                </div>
                <div class=" ">
                    <label>Bank Account</label>
                    <input type="number " name="bank_account" placeholder="Enter Bank account" class="form-control">
                </div>

                <div class=" ">
                    <label>Sex</label><br>
                    <input type="radio" name="sex" value="Female">Female
                    <input type="radio" name="sex" value="Male">Male
                </div>
                <div class=" ">
                    <label>Age</label><br>
                    <input type="number" name="age" class="form-control">

                </div>
                <div>
                    <label>Photo</label>
                    <input type="file" name="my_images" class="form-control">
                </div>
                <div class=" ">
                    <label>Password</label>
                    <input type="password" name="password_1" placeholder="Enter Password" class="form-control">
                </div>
                <div class=" ">
                    <label>Confirim Password</label>
                    <input type="password" name="password_2" placeholder="Conforim Password" class="form-control">
                </div>
                <button class="btn btn-primary mt-2" type="submit" name="submit">Register</button>
                Already a account?<a href="login.php"> Login</a>
            </form>
        </div>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

</html>
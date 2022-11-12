<?php
include('connect.php');
include('security.php');


$id = $_GET['id'];

$sql = "SELECT *FROM users_table where id = $id";
$result  = mysqli_query($conn,$sql);
$rows = mysqli_fetch_assoc($result);

                           
     $fullname =$rows['fullname'];
     $email =$rows['email'];
     $mobile =$rows['mobile'];
     $bank_account =$rows['bank_account'];
     $age = $rows['age'];
     $password =$rows['password'];

     $password_1 =$rows['password'];
   
   
     $user_type =$rows['user_type'];

if(isset($_POST['update'])){
    
    $id = $_GET['id'];
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $bank_account = mysqli_real_escape_string($conn, $_POST['bank_account']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    //validating
    if ($password_1 != $password_2) {
        $errors[] = "Password deosnot match";
    
    }elseif(empty($fullname)||empty($mobile)||empty($email)||empty($user_type)){
        echo  "All Fields are requred";
    }else{
        $update = "UPDATE users_table SET id =$id, fullname ='$fullname', email = '$email',user_type='$user_type',mobile='$mobile',bank_account='$bank_account',age ='$age',password ='$password_1' where id = $id";

        $result = mysqli_query($conn,$update);
        if($result){
           // echo "Update success";
           header('location:display_user.php');
        }else{
            echo "Faild To Update";
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
                    <input type="text " name="fullname" placeholder="Enter Full Name" class="form-control"
                        value="<?php echo $fullname; ?>">
                </div>
                <div class=" ">
                    <label>Email</label>
                    <input type="email " name="email" placeholder="Enter email" class="form-control"
                        value="<?php echo $email; ?>">
                </div>
                <div class=" ">
                    <label>Select User type</label>
                    <select class="form-select" name="user_type">
                        <option value="<?php echo $user_type; ?>">Admin</option>
                        <option value="<?php echo $user_type; ?>">User</option>
                    </select>
                </div>
                <div class=" ">
                    <label>Mobile</label>
                    <input type="text " name="mobile" placeholder="Enter mobile" class="form-control"
                        value="<?php echo $mobile; ?>">
                </div>
                <div class=" ">
                    <label>Bank Account</label>
                    <input type="number " name="bank_account" placeholder="Enter Bank account" class="form-control"
                        value="<?php echo $bank_account; ?>">
                </div>

                <div class=" ">
                    <label>Sex</label><br>
                    <input type="radio" name="sex" value="<?php echo $sex; ?>">Female
                    <input type="radio" name="sex" value="<?php echo $sex; ?>">Male
                </div>
                <div class=" ">
                    <label>Age</label><br>
                    <input type="number" name="age" class="form-control" value="<?php echo $age; ?>">

                </div>
                <div class=" ">
                    <label>Password</label>
                    <input type="text" name="password_1" placeholder="Enter Password" class="form-control"
                        value="<?php echo $password_1; ?>">
                </div>
                <div class=" ">
                    <label>Confirim Password</label>
                    <input type="text" name="password_2" placeholder="Conforim Password" class="form-control"
                        value="<?php echo $password_1; ?>">
                </div>
                <button class="btn btn-primary mt-2" type="submit" name="update">Update</button>
                Already a account?<a href="display_admin.php"> Back</a>
            </form>
        </div>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

</html>
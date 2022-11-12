<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Users detials</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        <div class="container my-5 shadow p-3">
            <h3 class="text-center text-danger text-uppercase">Users Details</h3>
            <!-- <button class="btn btn-success mb-2 align-self-center justify-content-center ms-auto"><a href="user.php"
                    class="text-light text-decoration-none">Add user</a> -->

            <button class="btn btn-primary mb-2"><a href="admin_profile.php"
                    class="text text-light text-decoration-none">Back</a></button>
            </button>


            <!-- 
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile</th>
                <th scope="col">Bank Account</th>
                <th scope="col">Age</th>
                <th scope="col">Photo</th>
                <th scope="col">Password</th>
                <th scope="col">Created Date</th>
                <th scope="col">User Type</th>
            </tr> -->
            <div class="container  " style=' max-width:70% ;'>
                <div class="card m-auto bg-light my-5" style="  border:dashed red;">
                    <div>
                        <div class="card align-items-center p-2 m-2">

                            <?php
                    session_start();
                    include('connect.php');
                    include('security.php');
                  $id = $_GET['id'];

       $sql = "SELECT *FROM admin_table where id = '$id' ";
       $result  = mysqli_query($conn,$sql);


                    if ($result) {
                        $rows = mysqli_fetch_assoc($result);

                        if($rows['photo']==""){
                            $photo =  "<img style='width:150px ; height:100%; border-radius: 50%;'  src  = 'uploads/default.jpg' >";
                            echo "<br>"; 
                        }else{
                            $photo =  "<img style='width:150px ; height:100%; border-radius: 50%;'  src  = 'uploads/".$rows['photo']." ' >";
                            echo "<br>";
                        }
                            $id = $rows['id'];
                            $fullname = $rows['fullname'];
                            $email = $rows['email'];
                            $mobile = $rows['mobile'];
                            $bank_account = $rows['bank_account'];
                            $age = $rows['age'];
                            //$photo = $rows['photo'];
                            $password = $rows['password'];
                            $created_date = $rows['created_date'];
                            $usertype = $rows['user_type'];
                            $row = mysqli_fetch_assoc($result);
                            echo $photo;
                            echo "<b></b> ". '<b>'.$rows['fullname'].'</i></b>';  
                           // echo"<br>";
                           // echo "ID number: ". $rows['id'];
                            //echo"<br>";
                           // echo "<b>Full Name:</b> ". '<i><b>'.$rows['fullname'].'</i></b>';                        
                            //echo"<br>";
                            echo "Full Name: ". $rows['fullname'];echo"<br>";
                            echo "Email ID: ". $rows['email'];echo"<br>";
                            echo "Mobile Number: ". $rows['mobile'];echo"<br>";
                            echo "Bank Account: ". $rows['bank_account'];echo"<br>";
                            echo "Age: ". $rows['age'];echo"<br>";
                            //echo "Sex: ". $rows['sex'];echo"<br>";
                            echo "User Type: ". $rows['user_type'];echo"<br>";
                            echo "Registration Date: ". $rows['created_date'];echo"<br>";
                        
                        }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <img src="" style='width:20px ; height:20px; border-radius: 50%;'> -->
            <!-- <table class="table d-table-cell">
                        <tr>
                            
                            <td>Abel</td>
                            <td>$fullname</td>
                        </tr>
                    </table> -->

        </div>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

</html>
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

            <button class="btn btn-primary mb-2"><a href="user_profile.php"
                    class="text text-light text-decoration-none">Back</a></button>
            </button>
            <table class="table">


                <tr>
                    <th scope="col">ID</th>


                    <th scope="col">Full Name</th>

                    <th scope="col">Email</th>

                    <th scope="col">Mobile</th>

                    <th scope="col">Bank Account</th>

                    <th scope="col">Age</th>

                    <th scope="col">Password</th>

                    <th scope="col">Created Date</th>

                    <th scope="col">User Type</th>
                </tr>

                <tbody>
                    <?php
                    session_start();
                    include('connect.php');
                   include('security.php');
      $id = $_GET['id'];

       $sql = "SELECT *FROM users_table where id = $id";
       $result  = mysqli_query($conn,$sql);


                    if ($result) {
                        $rows = mysqli_fetch_assoc($result);
                            $id = $rows['id'];
                            $fullname = $rows['fullname'];
                            $email = $rows['email'];
                            $mobile = $rows['mobile'];
                            $bank_account = $rows['bank_account'];
                            $age = $rows['age'];
                            $password = $rows['password'];
                            $created_date = $rows['created_date'];
                            $usertype = $rows['user_type'];


                            echo "
                            <tr>
                            <th>$id</th>
                            <td>$fullname</td>
                            <td>$email</td>
                            <td>$mobile</td>
                            <td>$bank_account</td>
                            <td>$age</td>
                            <td>$password</td>
                            <td>$created_date</td>
                            <td>$usertype</td>
                        </tr>
                            ";
                        }
                    


                    ?>

                    <!-- <table class="table d-table-cell">
                        <tr>
                            <td>Abel</td>
                            <td>$fullname</td>
                        </tr>
                    </table> -->
                </tbody>

            </table>
        </div>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

</html>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Records page</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        <div class="container my-5 shadow p-3">
            <h3 class="text-center text-danger text-uppercase">User Records</h3>
            <button class="btn btn-success mb-2 align-self-center justify-content-center ms-auto"><a href="user.php"
                    class="text-light text-decoration-none">Add user</a>

                <button class="btn btn-primary mb-2"><a href="admin_profile.php"
                        class="text text-light text-decoration-none">.Back</a></button>
            </button>
            <table class="table">
                <tr>
                    <thead class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>

                        <th scope="col">Created Date</th>
                        <th scope="col">Actions</th>
                    </thead>
                    <tbody>
                        <?php
                   session_start();
                   include('connect.php');
                   include('security.php');
                    $sql = "SELECT * FROM users_table";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $id = $rows['id'];
                            $fullname = $rows['fullname'];
                           
                            $password = $rows['password'];
                            $usertype = $rows['user_type'];
                            $created_date = $rows['created_date'];
                          


                            echo "
                            <tr>
                            <th>$id</th>
                            <td>$fullname</td>
                            <td>$usertype</td>
                            
                            <td>$created_date</td>
                            
                            <td> <button class='btn btn-primary'>
                            <a href='user_member_details.php?id=$id'
                            class='text-light text-decoration-none'>View Descriptions</a></button></td>
                        </tr>
                            ";
                        }
                    }


                    ?>




                    </tbody>
                </tr>
            </table>
        </div>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

</html>
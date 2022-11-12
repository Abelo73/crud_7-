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
            <h3 class="text-center text-danger text-uppercase">Admin Records</h3>
            <button class="btn btn-warning mb-2 align-self-center justify-content-center ms-auto"><a
                    href="admin_profile.php" class="text-light text-decoration-none">Back</a>
            </button>
            <button class="btn btn-success mb-2 align-self-center justify-content-center ms-auto"><a href="user.php"
                    class="text-light text-decoration-none">Add Members</a>
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
                    $sql = "SELECT * FROM admin_table";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $id = $rows['id'];
                            $fullname = $rows['fullname'];
                            $email = $rows['email'];
                           
                            $created_date = $rows['created_date'];
                            echo "
                            <tr>
                            <th>$id</th>
                            <td>$fullname</td>
                            <td>$email</td>
                           
                       
                            
                            <td>$created_date</td>
                           
                            <td>
                                
                                <button class='btn btn-danger'><a href='delete_user.php?id=$id'
                                        class='text-light text-decoration-none'>Delete</a></button>
                                        <button class='btn btn-danger'>
                                        <a href='edit_admin.php?id=$id'
                                        class='text-light text-decoration-none'>Edit</a></button>
                                        <button class='btn btn-primary'>
                                        <a href='view_user_details.php?id=$id'
                                        class='text-light text-decoration-none'>View Descriptions</a></button>
                            </td>
                           
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
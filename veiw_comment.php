<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>users comment</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        <div class="container my-5 shadow p-3">
            <h3 class="text-center text-danger text-uppercase">Users comments</h3>
            <button class="btn btn-success mb-2 align-self-center justify-content-center ms-auto"><a
                    href="admin_profile.php" class="text-light text-decoration-none">Back</a>
            </button>
            <table class="table">
                <tr>
                    <thead class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Date</th>

                    </thead>
                    <tbody>
                        <?php
                        session_start();
                    include('connect.php');
                    include('security.php');
                    $sql = "SELECT * FROM leave_comment";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $id = $rows['id'];
                            $fullname = $rows['fullname'];
                            $email = $rows['email'];
                            $mobile = $rows['mobile'];
                            $comment = $rows['comment'];
                            $comment_date = $rows['comment_date'];



                            echo "
                            <tr>
                            <th>$id</th>
                            <td>$fullname</td>
                            <td>$email</td>
                            <td>$mobile</td>
                            <td>$comment</td>
                            <td>$comment_date</td>
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
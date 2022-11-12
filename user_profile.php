<?php 
session_start();
include('connect.php');

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
                <div class="container">
                    <a href="admin_profile.php" class="navbar-brand">
                        <span class="fw-bold text-light">
                            <?php 
                           
                            include('connect.php');
                           // include('security.php');
                            echo $_SESSION['fullname'];?>
                        </span>
                        <div>
                            <form method="POST" action="logout.php">
                                <button class="btn btn-danger" name="logout">Logout</button>
                            </form>
                        </div>
                    </a>

                    <button type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" class="navbar-toggler">
                        <span class="navbar-toggler-icon  text-light"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="main-nav">
                        <ul class="navbar-nav ms-auto">


                            <li class="nav-item"><a href="display_user.php" class="nav-link">User Members</a></li>



                            <li class="nav-item"><a href="leave_comment.php" class="nav-link">Leave Comment</a></li>
                            <li class="nav-item"><a href="user_profile.php" class="nav-link">User Porfile</a></li>
                            <li class="nav-item"><a href="pay_ekub.php" class="nav-link">Pey Ekub Money</a>
                            </li>
                            <li class="nav-item"><a href="pay_penality.php" class="nav-link">Pey Penality</a>
                            </li>
                            <li class="nav-item"><a href="display_user.php" class="nav-link">View Users</a>
                                View
                            </li>
                            <li class="nav-item"><a href="pay_ekub.php" class="nav-link"></a>
                            </li>


                            </li>
                        </ul>

                    </div>

                </div>


        </div>

        </nav>
        </div>



        <div class="container border border-2">

            <h3 class="text-primary text-center">
                <?php
            //session_start();
            include('security.php');

            ?>
                <div class="text-center bg-dark text-white p-3 rounded-3">
                    <h3>Welcome
                        <span class="text-primary text-uppercase fw-bolder"><?php echo $_SESSION['fullname'];  ?></span>
                    </h3>
                    <p class="text-light text-center">Congiratulations, You are in <?php echo $_SESSION['fullname'];?>
                        Dashboard!</p>
                </div>

                <h2 class="text-uppercase">Welcome to the hompage</h2>
                <div>



                    <div class="col m-2 card card-body text-center text-light bg-primary">
                        <h5>Total Users</h5>
                        <div class="card-title text-light text-center">
                            <div class=" badge bg-warning rounded-circle ">
                                <?php
                            include('connect.php');
                            $sql = "SELECT id FROM users_table order by id";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_num_rows($result);

                            if ($row) {
                                echo "<h1>$row</h1>";
                            } else {
                                echo "Fail";
                            }

                            ?>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

</html>
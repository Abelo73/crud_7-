<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin page</title>
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
                            session_start();
                            include('security.php');
                            include('connect.php');
                            
                            echo $_SESSION['mobile'];
                           echo '<img src="uploads/$_SESSION["photo"]";>
                           
                           ';
                            //echo $photo;  
                            
                            
                            ?>
                            <div>
                                <form method="POST" action="logout.php">
                                    <button class="btn btn-danger" name="logout">Logout</button>
                                </form>
                            </div>
                        </span>
                    </a>

                    <button type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" class="navbar-toggler">
                        <span class="navbar-toggler-icon  text-light"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="main-nav">
                        <ul class="navbar-nav ms-auto">
                            <div>
                                <div>
                                    <form class="form-control" method="POST" action="search_user.php">
                                        <input type="text" name="search" class="" placeholder="Search...">
                                        <button class="btn btn-secondary" name="submit" type="submit">Search</button>
                                    </form>
                                </div>
                                <li class="nav-item"><a href="display_admin.php" class="nav-link">Admin Members</a></li>
                                <li class="nav-item"><a href="display_user_admin.php" class="nav-link">User Members</a>
                                </li>

                                <li class="nav-item"><a href="veiw_comment.php" class="nav-link">View Comments</a></li>
                                <li class="nav-item"><a href="admin_profile.php" class="nav-link">Admin Porfile</a></li>
                                <li class="nav-item"><a href="view_ekub_transaction_admin.php"
                                        class="nav-link">view_ekub_transaction</a>
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
                        <span class="text-primary text-uppercase fw-bolder"><?php echo $_SESSION['mobile'];  ?></span>
                    </h3>
                    <p class="text-light text-center">Congiratulations, You are in Admin
                        Dashboard!</p>

                    <img src="uploads/<?=$_SESSION['photo'] ?>">
                </div>

                <h2 class="text-uppercase">Welcome to the hompage</h2>

                <div class="row-6 p-3">
                    <div class="col m-2 card card-body  text-center text-light bg-primary">
                        <h5>Total Admin</h5>
                        <div class=" text-light text-center">
                            <?php
                        include('connect.php');
                        $sql = "SELECT id FROM admin_table order by id";
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
                    <div class="col m-2 card card-body text-center text-light bg-primary">
                        <h5>Total Users</h5>
                        <div class="card-title text-light text-center">
                            <div class=" badge bg-warning rounded-circle ">
                                <?php
                           
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
                <!-- <button class="btn btn-secondary mb-2"><a href="login.php"
                        class="text-light text-decoration-none">Login</a></button> -->

        </div>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

</html>
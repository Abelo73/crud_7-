<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>search</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="jquery/jquery-3.6.1.slim.min.js"></script>
    </head>

    <body>

        <div class="container my-4">
            <form class="form-control" method="POST">
                <input type="text" name="search" id="live_search" class="" placeholder="Search...">
                <button class="btn btn-secondary" name="submit" type="submit">Search</button>

            </form>
            <div>
                <table class="table table-bordered">
                    <?php
            include('connect.php');


            if(isset($_POST['submit'])){
                $search = $_POST['search'];

                $sql = "SELECT * FROM users_table where id like '%$search%' or fullname like '%$search%' or mobile like '%$search%'";
                $result = mysqli_query($conn,$sql);
                // $fetch_users = mysqli_fetch_assoc($result);


                if($result){
                   if($row =mysqli_num_rows($result)){

                //echo $row;

                echo "<tr> <thead>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Banck Account</th>
               </thead>
                </tr>
                ";
                while($row = mysqli_fetch_assoc($result)){

                    $id = $row['id'];
                    $fullname= $row['fullname'];
                    $email= $row['email'];
                    $mobile= $row['mobile'];
                    $bank_account= $row['bank_account'];
                    echo "<tbody>
                    <tr>
                    <td><a href='search_data.php?id=$id'>$id</a></td>
                
                    <td>$fullname</td>
                    <td>$email</td>
                    <td>$mobile</td>
                    <td>$bank_account</td>
                    </tr>
                    </tbody>";
                }
                
                }
                
                }else{
                    echo "NO data";
                }

            }
            
            
            
            
            ?>
                </table>
                <button class="btn btn-primary"><a href="admin_profile.php"
                        class="text-light text-decoration-none">Back</a></button>
            </div>

        </div>
        <!-- <script src="bootstrap.bundle.min.js">
        </script> -->
        <script src="jquery/jquery-3.6.1.slim.min.js"></script>
        <script src="text/javascript">
        $(document).ready(function() {
            $("#live_search").ready(function() {

                $("#live_search").keyup(function() {
                    var input = $(this).val();

                    alert(input);
                });


            });
        });
        </script>

    </body>

</html>
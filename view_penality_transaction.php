<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View transaction</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        <div class="container my-5 shadow p-3">
            <h3 class="text-center text-danger text-uppercase">View payment Transaction</h3>
            <button class="btn btn-success mb-2 align-self-center justify-content-center ms-auto"><a
                    href="user_profile.php" class="text-light text-decoration-none">Back</a>
            </button>
            <table class="table">
                <tr>
                    <thead class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Reciver Name</th>
                        <th scope="col">Reciver Account</th>
                        <th scope="col">Amount(ETB)</th>
                        <th scope="col">Peyment Date</th>



                    </thead>
                    <tbody>
                        <?php
                    include('connect.php');
                    $sql = "SELECT * FROM pay_penality";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $id = $rows['id'];
                            $fullname = $rows['fullname'];
                            $mobile = $rows['mobile'];
                            $reciver_name = $rows['reciver_name'];
                            $reciver_account = $rows['reciver_account'];
                            $amount = $rows['amount'];
                            $penality_date = $rows['penality_date'];

                            echo "
                            <tr>
                            <th>$id</th>
                            <td>$fullname</td>
                            <td>$mobile</td>
                            <td>$reciver_name</td>
                            <td>$reciver_account</td>
                            <td>$amount</td>
                            <td>$penality_date</td>
                           
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
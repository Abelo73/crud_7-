<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload photo</title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>

    <body>

        <div class="container my-5 bg-light" style="max-width:400px;">
            <h1 class="text-center">User Registration</h1>
            <form method="POST" action="upload_img.php" enctype="multipart/form-data">
                <div>
                    <label>Full Name</label>
                    <input type="text" name="fullname" placeholder="Enter Full Name" class="form-control">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter Email" class="form-control">
                </div>

                <div>
                    <label>Usertype</label>
                    <input type="text" name="usertype" placeholder="Enter User Type" class="form-control">
                </div>
                <div>
                    <label>Photo</label>
                    <input type="file" name="my_images" class="form-control">
                </div>
                <div>
                    <label>Password</label>
                    <input type="password_1" name="password_1" placeholder="Enter password" class="form-control">
                </div>
                <div>
                    <label>Conforim Password</label>
                    <input type="password_2" name="password_2" placeholder="Conforim password" class="form-control">
                </div>
                <button class="btn btn-primary mt-2" name="submit" type="submit">Register</button>
            </form>
        </div>

    </body>

</html>
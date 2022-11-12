<?php

include('connect.php');

if(isset($_POST['submit']) && isset($_FILES['my_images'])){
   // echo "Heloo";
//    echo "<pre>";
//    print_r($_FILES['my_images']);
//    echo "</pre>";
     $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
     $email = mysqli_real_escape_string($conn,$_POST['email']);
     $usertype = mysqli_real_escape_string($conn,$_POST['usertype']);
    
     $password_1 = mysqli_real_escape_string($conn,$_POST['password_1']);
     $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $img_name  = $_FILES['my_images']['name'];
    $img_size  = $_FILES['my_images']['size'];
    $img_type  = $_FILES['my_images']['type'];
    $tmp_name  = $_FILES['my_images']['tmp_name'];
    $error  = $_FILES['my_images']['error'];


    if($error===0){
        if($img_size>125000){
            $em  ="Too large file";

        }else{
            // echo "Not more than 1mb";
            $im_ext = pathinfo($img_name,PATHINFO_EXTENSION);
            // echo $im_ext;
            $img_ex_loc = strtolower($im_ext);
            $allowed_ext = array("jpg","jpeg","png");

            if(in_array($img_ex_loc,$allowed_ext)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_loc;
                $img_uploaded_path = "uploads/".$new_img_name;
                move_uploaded_file($tmp_name,$img_uploaded_path);

                //inserting into database 

                $sql ="INSERT INTO users(fullname,email,usertype,photo,password) VALUES('$fullname','$email','$usertype','$new_img_name','$password_1')";

                $result =mysqli_query($conn,$sql);

                if($result){
                    echo "Data inserted successfuly";
                }else{
                    echo "Fial to insert photo";
                }
            }
            
        }

    }else{
        $em=  "Unkouwn Error occured";
    }

}else{
    echo "<pre>";
}

?>
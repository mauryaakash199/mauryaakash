<?php 
    include("connection.php");
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operation</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="title">
                Registration Form
            </div>
            <div class="form">

                <div class="input_field">
                    <label>Upload Image</label>
                    <input type="file" name="uploadfile" style="width: 100%;">

                </div>

                <div class="input_field">
                    <label>First Name</label>
                    <input type="text" class="input" name="fname" required>
                </div>
                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text" class="input" name="lname" required>
                </div>
                <div class="input_field">
                    <label>Password</label>
                    <input type="password" class="input" name="password" required>
                </div>
                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" class="input" name="conpassword" required>
                </div>
                <div class="input_field">
                    <label>Gender</label>
                    <div class="custom_select" required>
                        <select name="gender">
                            <option></option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="input_field">
                    <label>Email Address</label>
                    <input type="email" class="input" name="email" required>
                </div>
                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" class="input" name="phone" required>
                </div>

                <div class="input_field"    >
                    <label style="margin-right: 90px;">Caste</label>
                    <input type="radio" name="r1" value="General" required ><label style="margin-left:5px;">General</label>
                    <input type="radio" name="r1" value="OBC" required ><label style="margin-left:5px;">OBC</label>
                    <input type="radio" name="r1" value="SC" required ><label style="margin-left:5px;">SC</label>
                    <input type="radio" name="r1" value="ST" required ><label style="margin-left:5px;">ST</label>
                    
                </div>

                <div class="input_field"    >
                    <label style="margin-right: 90px;">Language</label>
                    <input type="checkbox" name="language[]" value="Hindi"><label style="margin-left:5px;">Hindi</label>
                    <input type="checkbox" name="language[]" value="Urdu"><label style="margin-left:5px;">Urdu</label>
                    <input type="checkbox" name="language[]" value="English"><label style="margin-left:5px;">English</label>
                    
                </div>

                <div class="input_field">
                    <label>Address</label>
                    <textarea class="textarea" name="address" required></textarea>
                </div>
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required>
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree terms and condition</p>
                </div>
                <div class="input_field">
                    <input type="submit" value="Register" class="btn" name="register">
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php

if($_POST['register'])
{


// print_r($_FILES["uploadfile"])
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
// echo $filename;
$folder = "image/".$filename;
// echo $folder;
move_uploaded_file($tempname, $folder);






    $fname       = $_POST['fname'];
    $lname       = $_POST['lname'];
    $password    = $_POST['password'];
    $conpassword = $_POST['conpassword'];
    $gender      = $_POST['gender'];
    $email       = $_POST['email'];
    $phone       = $_POST['phone'];
    $caste       = $_POST['r1'];
    
    $lang        = $_POST['language'];  
    $lang1       = implode(",",$lang);
    $address     = $_POST['address'];
    echo"$lang1";

    // if($fname != "" && $lname !="" && $password !="" && $conpassword !="" && $gender !="" &&
    // $email !="" && $phone !="" && $address !="")
    // {

    $query = "INSERT INTO form (std_image,fname,lname,password,conpassword,gender,email,phone,caste,language,address)
     values('$folder','$fname','$lname','$password','$conpassword','$gender','$email','$phone','$caste','$lang1','$address')";
    $data = mysqli_query($conn,$query);
    if($data)
    {
        echo "<script> alert('Data insert successfully....?')</script>";
    }   
    else{
        echo "<script>alert('Data Faield');</script>".mysqli_connect_error();
    }
}
// else{
//     echo "<script>alert('Please fill the form');</script>";
// }
// } 
?>






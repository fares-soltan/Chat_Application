<?php
session_start();
include("include/Database_connection.php");
$error = false;
if(isset($_POST['register'])){
    $name =htmlentities(mysqli_real_escape_string($connect,$_POST['user_name']));
    $email =htmlentities(mysqli_real_escape_string($connect,$_POST['user_email']));
    $password =htmlentities(mysqli_real_escape_string($connect,$_POST['user_password']));
     $check_name= "select * from users where user_name='$name'";
     $run_name = mysqli_query($connect,$check_name);
     $check_name_for_signup =mysqli_num_rows($run_name);
     $check_email= "select * from users where user_email='$email'";
     $run_email = mysqli_query($connect,$check_email);
     $check_email_for_signup =mysqli_num_rows($run_email);
     $rand =rand(1,3);
    if($rand == 1){
        $profile_pic ="images/profile1.png";
    }elseif($rand == 2){
        $profile_pic ="images/profile2.png";
    }elseif($rand == 3){
        $profile_pic ="images/profile3.png";
    }
     if(strlen($name)< 4){
           $error = "Enter your Name Greater than 4 Characters";
     }elseif (strlen($password)<8){
        $error = "Enter your Password Greater than 8 numbers"; 
     }elseif ($check_name_for_signup ==1){
          $error = "Username Already exists";
     }elseif($check_email_for_signup ==1){
         $error = "Email Already exists";
     }else{
     $query = "INSERT INTO users(user_name,user_email,user_password,user_profile) ";
     $query.="VALUES('$name','$email','$password','$profile_pic')";
     $result = mysqli_query($connect,$query);
     if($result){
         echo"Congratulations ur acc has been created";
         header("location: login.php");
     }
    }
}
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat App</title>
  <link rel="stylesheet" href="src/register.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="src/login.css">
</head>

<body>
 <div class="containter">
 <br>
 <br>
 <h1 class ="text-center">Chat App</h1>
 <div class="row justify-content-md-center">
    <div class="col col-md-4 mt-5">
        <div class="card">
          <div class="card-header text-center">Register
                              <?php 
                 if($error){
                     echo "<br>"."<h5 style='color:red;'>$error</h5>";
                      } 
                 ?>
            </div>
          <div class="card-body">
            <form method="post" id="register_form">
             <div class="form-group">
                 <label>Enter ur Name</label>
                 <input type="text" name="user_name" id="user_name" class="form-control" required>
             </div>
             <div class="form-group">
                 <label>Email :</label>
                 <input type="email" name="user_email" id="user_email" class="form-control" required>
             </div>
             <div class="form-group">
                 <label>Password</label>
                 <input type="password" name="user_password" id="user_password" class="form-control" maxlength="12" min="6" required>
             </div>
                <br>
             <div class="form-group text-center">
                 <input type="submit" name="register" class="btn btn-success" value="Register">
                 <br>
                 <a href="login.php"  class="small">Login</a>
             </div>
            </form>           
          </div>
        </div>
    </div>
 </div>
 </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

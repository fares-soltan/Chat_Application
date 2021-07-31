<?php
session_start();
include("include/Database_connection.php");
$error = false;
if(isset($_POST['login'])){
$email_login =htmlentities(mysqli_real_escape_string($connect,$_POST['login_email'])); 
$password_login=htmlentities(mysqli_real_escape_string($connect,$_POST['login_password']));
    
$select_user = "select * from users where user_email='$email_login' AND user_password ='$password_login'";
$query = mysqli_query($connect,$select_user);
$check_user =mysqli_num_rows($query);

    if($check_user == 1){
        $_SESSION['user_email']=$email_login;
        $update_status =mysqli_query($connect,"UPDATE users SET user_status='Online' WHERE user_email='$email_login'");
        $user=$_SESSION['user_email'];
        
        $get_user = "select * from users where user_email='$user'";
         $run_user =mysqli_query($connect,$get_user);
         $row = mysqli_fetch_array($run_user);
         $user_name = $row['user_name'];
        header("location:chatroom.php?name=".urlencode($user_name));
    }else{
        $error ="Please Check email and password";
    }
}
?>
<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat App</title>
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
          <div class="card-header text-center">Login
                 <?php 
                 if($error){
                     echo "<br>"."<h5 style='color:red;'>$error</h5>";
                      } 
                 ?>
            </div>
          <div class="card-body">
            <form method="post" id="login_form">
             <div class="form-group">
                 <label>Email :</label>
                 <input type="email" name="login_email" id="user_email" class="form-control" required>
             </div>
             <div class="form-group">
                 <label>Password</label>
                 <input type="password" name="login_password" id="user_password" class="form-control" maxlength="12" required>
             </div>
                <br>
             <div class="form-group text-center">
                 <input type="submit" name="login" class="btn btn-success" value="Login">
                 <br>
                 <a href="register.php"  class="small">Create Account</a>
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

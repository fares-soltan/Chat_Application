<!DOCTYPE html>
<?php 
session_start();
ob_start();
include("Database_connection.php");
include("back_add_friends.php");
if(!isset($_SESSION['user_email'])){
    header("location:../login.php");
}
?>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Friends</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="../src/add_friends.css">
</head>

<body>
<div class="container py-5">
    <div class="row text-center text-white">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4">Add Friends</h1>
            <p class="lead mb-0">You can search for people and chat with them</p>
            <form class="form-inline" action="">
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="search_query" aria-describedby="emailHelp" placeholder="Search ur Friend" required>
                    <small id="emailHelp" class="form-text text-muted">Please check the name before searching</small>
                </div>
                <button type="submit" class="btn btn-danger mb-2" name="search_btn">Search</button>
            </form>
        </div>
    </div>
</div><!-- End -->


<div class="container">
    <div class="row text-center">
        <?php search_user(); ?>
        
    </div>
</div> 
</body>
</html>
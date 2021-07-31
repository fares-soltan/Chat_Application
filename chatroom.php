<!DOCTYPE html>
<?php 
session_start();
ob_start();
include("include/Database_connection.php");
if(!isset($_SESSION['user_email'])){
    header("location:login.php");
}
?>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Room</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="src/chatroom.css">
</head>
<body>
<div class="container">
  <div class="row no-gutters">
      <!--gettin the user information who is logged in -->
            <?php
                $user=$_SESSION['user_email'];
                $get_user ="select * from users where user_email='$user'";
                $run_user = mysqli_query($connect,$get_user);
                $row = mysqli_fetch_array($run_user);
               
                $user_id=$row['id'];
                $user_name =$row['user_name'];
    
            ?>
               <!-- getting the user data on which user click-->
               <?php
                if(isset($_GET['name'])){
                      global $connect;
                     $get_username=$_GET['name'];
                     $get_user= "select * from users where user_name='$get_username'";
                     $run_user=mysqli_query($connect,$get_user);
                     $row_user =mysqli_fetch_array($run_user);
                     
                     $username= $row_user['user_name'];
                     $user_profile_image = $row_user['user_profile'];
                     
                 }else{
                   header("location:login.php"); 
                }
               $total_messages = "select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username')";
               $run_messages =mysqli_query($connect,$total_messages);
               $total = mysqli_num_rows($run_messages);
               
               ?>
    <div class="col-md-4 border-right" style='
    overflow-y: scroll;
    scroll-behavior: smooth;
    height: 700px;
    overflow-x: hidden;'>
      <div class="settings-tray mx-sm-3 mb-2">

            <form method="post" class="form-inline">
                 <div class="form-group mx-sm-3 mb-2">
                   <button class=" btn btn-danger col-md-6" style="width:160px; margin-left:80px;" name="name">Find friends</button>
                  </div>
                </form>
          <?php 
            if(isset($_POST['name'])){
                header("location:include/add_friends.php");
            }
          ?>
      </div>
        
     <?php include("include/get_users_data.php"); ?>  
    </div>

    <div class="col-md-8">
      <div class="settings-tray">
        <div class="friend-drawer no-gutters friend-drawer--grey">
          <img class="profile-image" src="<?php echo "$user_profile_image"; ?>" alt="">
          <div class="text">
            <h6><?php echo "$username"; ?></h6>
            <p class="text-muted"><?php
                $login_status=mysqli_query($connect,"select * from users where user_name='$username'");
                $row =mysqli_fetch_array($login_status);
                $login=$row['user_status'];
                if($login=="Online"){
                echo "Online";
              }else{
                 echo "Offline";

                 }
                ?></p>
          </div>
            <form method="post">
                       <span class="total"><?php echo $total; ?>messages</span>
                       <button name="logout" class ="btn btn-danger">Logout</button>
            </form>
            <?php 
                    if(isset($_POST['logout'])){
                        $update_msg = mysqli_query($connect,"UPDATE users SET user_status='Offline' WHERE user_name='$user_name'");
                        
                        header("location:logout.php");
                        exit();
                    }
                   ?>
        </div>
      </div>
      <div class="chat-panel" style="
    overflow-y: scroll;
    scroll-behavior: smooth;
    height: 550px;
    overflow-x: hidden;">
        <?php 
                $updat_msg=mysqli_query($connect,"UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND receiver_username='$user_name'");
               
                $sel_msg ="select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";
                $run_msg = mysqli_query($connect,$sel_msg);
                while ($row = mysqli_fetch_array($run_msg)){
                  $sender_username =$row['sender_username'];
                  $receiver_username =$row['receiver_username'];
                  $msg_content = $row['msg_content'];
                  $msg_date = $row['msg_date'];
               ?>
                   <?php 
                    if($user_name==$sender_username && $username==$receiver_username){
                        echo "
                        
                            <div class='row no-gutters'>
                              <div class='col-md-3 offset-md-9'>
                                <div class='chat-bubble chat-bubble--right'>
                                          $msg_content
                                </div>
                              </div>
                            </div>
                        
                        ";
                    }elseif($username==$sender_username && $user_name==$receiver_username){
                        echo "
                        
                          <div class='row no-gutters'>
                              <div class='col-md-3'>
                                <div class='chat-bubble chat-bubble--left'>
                                     $msg_content
                                </div>
                              </div>
                            </div>
                        
                        ";
                    }
                   
                   
                   ?>
          <?php }?>
        </div>
        
          
            
                <form method="post" class="form-inline">
                 <div class="form-group mx-sm-3 mb-2">
                  <input class="form-control" type="text" name="msg_content" placeholder="Type your message here...">
                     <br>
                   <button class=" btn btn-danger md-2" style="float:right; margin-bottom:5px;" name="submit">Send</button>
                  </div>
                </form>    

          
        
      </div>
    </div>
  </div>
<?php 
     if(isset($_POST['submit'])){
         $msg = htmlentities($_POST['msg_content']);
         if($msg == ""){
             echo "
             <div class='alert alert-danger'>
              <strong><center>Message was unable to send</center></strong>
             </div>
             ";
         }elseif(strlen($msg)>100){
            echo "
             <div class='alert alert-danger'>
              <strong><center>Message is Too long use only 100 characters</center></strong>
             </div>
             ";
         }else{
             $insert="INSERT INTO users_chat (sender_username, receiver_username, msg_content, msg_stauts,msg_date) VALUES('$user_name','$username','$msg','unread',NOW())";
             $run_insert =mysqli_query($connect,$insert);
         }
         
     }
    
    
    
    
    ?>   
    
    
    
    
    
    
<script>
  $( '.friend-drawer--onhover' ).on( 'click',  function() {
  
  $( '.chat-bubble' ).hide('slow').show('slow');
  
});</script>
</body>
</html>
<?php include("database/Database_connection.php"); ?>
<?php 
$users="select * from users";
$run_users =mysqli_query($connect,$users);
while($row_users=mysqli_fetch_array($run_users)){
    $user_id=$row_users['id'];
    $user_names=$row_users['user_name'];
    $user_profile=$row_users['user_profile'];
    $login=$row_users['user_status'];
    $login_check = $login == "Online" ? "Online":"Offline";
    echo "<a href='chatroom.php?name=$user_names' style='text-decoration:none;'>
    <div class='friend-drawer friend-drawer--onhover'>
    
        <img class=''profile-image' src='$user_profile' alt=''>
        <div class='text'>
          <h6 style='color:black'>$user_names</h6>
        </div>
        <span class='time text-muted small'>$login_check</span>
      </div>
      <hr>
     </a>";
}


?>
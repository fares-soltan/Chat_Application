<?php 

function search_user(){
    global $connect;
    if(isset($_GET['search_btn'])){
        $serach_query =htmlentities($_GET['search_query']);
        $get_user = "select * from users where user_name='$serach_query' ";
        $run_user = mysqli_query($connect,$get_user);
        while($row_users=mysqli_fetch_array($run_user)){
            $user_id=$row_users['id'];
            $user_names=$row_users['user_name'];
            $user_profile=$row_users['user_profile'];
            $login=$row_users['user_status'];
            $login_check = $login == "Online" ? "Online":"Offline";
            echo "
                    <div class='col-xl-3 col-sm-6 mb-5'>
                    <div class='bg-white rounded shadow-sm py-5 px-4'><img src='../$user_profile' width='70' class='img-fluid rounded-circle mb-3 img-thumbnail shadow-sm'>
                        <h5 class='mb-0'>$user_names</h5><span class='small text-uppercase text-muted'>$login_check</span>
                        <form method='post'>
                        <input type='submit' name='add' class='btn btn-danger' value='Chat Now' style='margin-top:10px;'>
                        </form>
                    </div>
                </div>";
        }
    }else{
        $get_user = "SELECT * FROM USERS";
        $run_user = mysqli_query($connect,$get_user);
        while($row_users=mysqli_fetch_array($run_user)){
    $user_id=$row_users['id'];
    $user_names=$row_users['user_name'];
    $user_profile=$row_users['user_profile'];
    $login=$row_users['user_status'];
    $login_check = $login == "Online" ? "Online":"Offline";
    echo "
            <div class='col-xl-3 col-sm-6 mb-5'>
            <div class='bg-white rounded shadow-sm py-5 px-4'><img src='../$user_profile' width='70' class='img-fluid rounded-circle mb-3 img-thumbnail shadow-sm'>
                <h5 class='mb-0'>$user_names</h5><span class='small text-uppercase text-muted'>$login_check</span>
                <form method='post'>
                </form>
            </div>
        </div>";
}
    }
    if(isset($_POST['add'])){
         header("location:../chatroom.php?name=".urlencode($user_names));
    }
}

?>
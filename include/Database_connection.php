<?php
$connect =mysqli_connect('localhost','root','','chat');
if(!$connect){
    die("database not connect".mysqli_error());
}
?>
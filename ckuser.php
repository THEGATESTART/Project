<?php 
require_once('connect.php');

    $username = trim($_GET["username"]);
    $email = trim($_GET["email"]);
    $sql = "SELECT * FROM user_tb WHERE userName='$username' or emailTxt='$email'";
    $query = mysqli_query($con, $sql);
    $ck = mysqli_num_rows($query);
    
    if($ck > 0)
    echo "1";
    else
    echo "2";    
?>
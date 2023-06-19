<?php 
require_once('connect.php'); 

    $email = trim($_GET["email"]);
    $sql = "SELECT * FROM user_db WHERE email='$email'";
    $query = mysqli_query($con, $sql);
    $ck = mysqli_num_rows($query);
    
    if($ck > 0)
    echo "1";
    else
    echo "2";    
?>
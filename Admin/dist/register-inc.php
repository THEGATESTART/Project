<?php
    session_start();
    require ('connect.php');

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['ad_username'] = $username;
        
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO admin_tb (userName, passWord) 
                VALUES('$username', '$hashedPwd')";
        $result = mysqli_query($con, $sql);
        header("Location: index.php?regis=success");
        exit();
    }else{
        header("Location: register.php?regis=error");
        exit();
    }
?>

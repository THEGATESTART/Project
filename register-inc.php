<?php
    require ('connect.php');

    if($_POST){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_tb (firstName, lastName, userName, passWord, phoneNumber, emailTxt) 
                VALUES('$first_name', '$last_name', '$username', '$hashedPwd', '$phone', '$email')";
        $result = mysqli_query($con, $sql);


        echo $sql;
        exit();
    }else{
        header("Location: index.php");
        exit();
    }
?>

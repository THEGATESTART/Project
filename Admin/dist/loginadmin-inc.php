<?php

    session_start();

    if(isset($_POST['submit'])){

        require ('connect.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            header("Location: login.php?login=empty");
            exit();
        }else{
            $sql = "SELECT * FROM admin_db WHERE admin_user='$username'";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result); //check value fron database
            if($resultCheck > 1){
                header("Location: login.php?login=error");
                exit();
            }else{
                if($row = mysqli_fetch_assoc($result)){
                    //D-hasihing the password
                    $hashedPwdCheck = password_verify($password, $row['admin_pass']);
                    if($hashedPwdCheck == false){
                        header("Location: login.php?login=failed");
                        exit();
                    }elseif($hashedPwdCheck == true){
                        $_SESSION['ad_id'] = $row['admin_id'];
                        $_SESSION['ad_username'] = $row['admin_user'];
                        header("Location: index.php?login=success");
                        exit();
                    }
                }
            }
        }
    }else{
        header("Location: login.php?login=error");
        exit();
    }
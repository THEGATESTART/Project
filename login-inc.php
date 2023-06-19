<?php
    session_start();

    if(isset($_POST['submit'])){

        require ('connect.php');

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            header("Location: index.php?login=empty");
            exit();
        }else{
            $sql = "SELECT * FROM user_tb WHERE userName='$username'";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck < 1){
                header("Location: index.php?login=error");
                exit();
            }else{
                if($row = mysqli_fetch_assoc($result)){
                    //D-hasihing the password
                    $hashedPwdCheck = password_verify($password, $row['passWord']);
                    if($hashedPwdCheck == false){
                        header("Location: index.php?login=failed");
                        exit();
                    }elseif($hashedPwdCheck == true){
                        $_SESSION['u_id'] = $row['userID'];
                        $_SESSION['u_first'] = $row['firsName'];
                        $_SESSION['u_last'] = $row['lastName'];
                        $_SESSION['u_username'] = $row['userName'];
                        $_SESSION['u_phone'] = $row['phonenumber'];
                        $_SESSION['u_email'] = $row['emailTxt'];
                        header("Location: index.php?login=success");
                        exit();
                    }
                }
            }
        }
    }else{
        header("Location: index.php?login=error");
        exit();
    }
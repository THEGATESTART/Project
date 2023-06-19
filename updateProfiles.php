<?php
    session_start();
    include 'connect.php';

    if($_POST){
        $first = $_POST['first_name'];
        $last = $_POST['last_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $u_id = $_SESSION['u_id'];

        $sql = "UPDATE user_db set first_name='$first', last_name='$last', phone='$phone', email='$email' where "."user_id"." = '$u_id'";
        $query = mysqli_query($con, $sql);
        header("Location: profiles.php?update=success");
    }else{
        header("Location: profiles.php");
        exit();
    }
?>
<?php
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "user";

    $obj_con = mysqli_connect($hostName, $username, $password, $dbName);

    if (!$obj_con) {
        header("location:error.php");
        exit();
    }

    mysqli_query($obj_con,"SET NAMES UTF8");

    $str_sql = "select * from user_tb";
    $obj_rs = mysqli_query($obj_con,$str_sql);

?>
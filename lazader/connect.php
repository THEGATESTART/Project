<?php
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "lazader";

    $con = mysqli_connect($hostName, $username, $password, $dbName);
    // mysqli_close($con);

    if (!$con) {
        header("location:error.php");
        exit();
    }

    mysqli_query($con,"SET NAMES UTF8");

    $sqlGet = "select * from product_tb";
    $sqlRs = mysqli_query($con,$sqlGet);

?>
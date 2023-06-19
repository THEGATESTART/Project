<?php
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "company";

    $obj_con = mysqli_connect($hostName, $username, $password, $dbName);

    if (!$obj_con) {
        header("location:error.php");
        exit();
    }

    mysqli_query($obj_con,"SET NAMES UTF8");

    $str_sql = "select * from customer_db";
    $obj_rs = mysqli_query($obj_con,$str_sql);

    // For Men
    $str_sqlmen = "select * from customer_db where cust_gender = 'ชาย'";
    $obj_rsmen = mysqli_query($obj_con,$str_sqlmen);

    // For Women
    $str_sqlwomen = "select * from customer_db where cust_gender = 'หญิง'";
    $obj_rswomen = mysqli_query($obj_con,$str_sqlwomen);

    // For Men Less
    $str_sqlmenless = "select * from customer_db where cust_gender = 'ชาย' and cust_weight < 50";
    $obj_rsmenless = mysqli_query($obj_con,$str_sqlmenless);

    // For Men More
    $str_sqlmenmore = "select * from customer_db where cust_gender = 'ชาย' and (cust_weight > 51) and (cust_weight < 90)";
    $obj_rsmenmore = mysqli_query($obj_con,$str_sqlmenmore);

    // For Women Less
    $str_sqlwomenless = "select * from customer_db where cust_gender = 'หญิง' and cust_weight < 50";
    $obj_rswomenless = mysqli_query($obj_con,$str_sqlwomenless);

     // For Women More
     $str_sqlwomenmore = "select * from customer_db where cust_gender = 'หญิง' and (cust_weight > 51) and (cust_weight < 90)";
     $obj_rswomenmore = mysqli_query($obj_con,$str_sqlwomenmore);
?>
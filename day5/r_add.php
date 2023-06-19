<?php 
    include 'database.php';

    $str_sql = "insert into customer(cust_name, cust_lname, age) values('$_POST[name]', '$_POST[lname]', '$_POST[age]' )";

    if(mysqli_query($obj_con, $str_sql)) {
        header("location: add.php");
        exit();
    }
?>
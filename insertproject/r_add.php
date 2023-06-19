<?php 
    include 'database.php';

    $str_sql = "insert into customer_db(cust_name, cust_lname, cust_age, cust_gender, cust_weight, cust_height) 
    values('$_POST[name]', '$_POST[lname]', '$_POST[age]', '$_POST[gender]', '$_POST[weight]', '$_POST[height]')";

    if(mysqli_query($obj_con, $str_sql)) {
        header("location: add.php");
        exit();
    }
?>
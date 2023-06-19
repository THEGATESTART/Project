<?php

$dbServerName = "localhost";
$dbUsername = "user40";
$dbPassword = "123456";
$dbName = "tutor40";

    $con = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName) or die("Connect failed");
    mysqli_set_charset($con, 'utf8');
?>
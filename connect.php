<?php

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "minibussystem";


    $con = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName) or die("Connect failed");
    mysqli_set_charset($con, 'utf8');
?>
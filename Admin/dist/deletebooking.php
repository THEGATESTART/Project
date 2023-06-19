<?php

    include 'connect.php';
    
    $id = $_POST["id"];

    $sql = "DELETE FROM booking WHERE booking_id='$id'";
    $result = mysqli_query($con, $sql);
?>
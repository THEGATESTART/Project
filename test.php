<?php
    session_start();
    $newdate = $_SESSION['dates'];
    $date = str_replace('/', '-', $newdate);
    $newtime = date('Y-m-d', strtotime($date));
?>
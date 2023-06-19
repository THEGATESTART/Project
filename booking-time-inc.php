<?php
    session_start();

    if($_POST){
        $timed = $_POST['time'];

            $_SESSION['timed'] = $timed;
    }
?>
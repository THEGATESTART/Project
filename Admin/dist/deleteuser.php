<?php

    include 'connect.php';
    
    $id = $_POST["id"]; //ตัวแปร ที่รับต่ามา

    $sql = "DELETE FROM user_db WHERE "."user_id"."='$id'"; //คำสั่ง delete จากตาราง admin_db จาก culumn admin_id=id
    $result = mysqli_query($con, $sql);
?>
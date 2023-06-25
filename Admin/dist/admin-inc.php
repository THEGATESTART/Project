<?php

    session_start();
    //เรียกใช้ไฟล์ที่ติดต่อฐานข้อมูล
    require ('connect.php');

    //เช็คค่าที่รับมาว่า ตรงกับ "changestatus" รึป่าว
    if(isset($_GET['action']) && isset($_GET['action']) && isset($_GET['action']) == 'changestatus'){

        $status_id = $_GET['status_id']; //สร้างตัวแปรเพื่อรับค่าที่ส่งมา
        $booking_id = $_GET['booking_id'];
        $slip_pic = $_GET['slipPic'];

        if($status_id == 0 && $slip_pic == ""){ // ถ้า = 0 
            $status_id = 0;  // ให้เปลี่ยนเป็น 1

        //อัพเดตเข้าตาราง booking set status_book ให้เท่ากับตัวแปร status_id where booking_id = ค่าที่ get มาจากตัวแปร booking_id
        $sql = "UPDATE booking set statusBook='$status_id' where bookingID='$booking_id'"; 
        $query = mysqli_query($con, $sql); //คิวรี่ข้อมูลเข้า database
        header("Location:normalSeat.php?update=Success1"); //link ไปหน้าที่กำหนดไว้
        exit();
        }elseif($status_id == 0 && $slip_pic != ""){
            $status_id = 1;

        $sql = "UPDATE booking set statusBook='$status_id' where bookingID='$booking_id'";
        $query = mysqli_query($con, $sql);
        header("Location:normalSeat.php?update=Success2");
        exit();
        }elseif($status_id == 1 && $slip_pic != ""){
            $status_id = 0;

        $sql = "UPDATE booking set statusBook='$status_id' where bookingID='$booking_id'";
        $query = mysqli_query($con, $sql);
        header("Location:normalSeat.php?update=Success3");
        exit();
        }
    }
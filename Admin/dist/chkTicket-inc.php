<?php 
    include 'connect.php';

    $booking_id = $_REQUEST['chkStatus'];
    $chkStatus = "รับตั๋วแล้ว";
    
    $sql = "UPDATE booking set chkTicket='$chkStatus' where bookingID ='$booking_id'";
    $result = mysqli_query($con,$sql);
    header("Location: chkTicket.php?chk=success");
?>
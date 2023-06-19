<?php 
    session_start();
    require ('connect.php');

    if(isset($_POST['submit'])){

         
        $_SESSION['u_id'];
        $_SESSION['seatDetails'];
        $_SESSION['dates'];
        $_SESSION['sumSeat'];
        $_SESSION['timed'];
        $_SESSION['s_seatNumber'];
        $_SESSION['s_seatChild'];
        $_SESSION['s_seatAdult'];
        $_SESSION['s_seatOlder'];
        $_SESSION['s_allseatprice'];
        $_SESSION['status_book'];

        // upload image
        $ext = pathinfo(basename($_FILES['slip_image']['name']), PATHINFO_EXTENSION);
        $newImgname = 'img_'.uniqid().".".$ext;
        $imagePath = "bookingpic/";
        $uploadPath = $imagePath.$newImgname;

        // uploading
        $success = move_uploaded_file($_FILES['slip_image']['tmp_name'], $uploadPath);

        $slipImage = $newImgname;

        $sql = "INSERT INTO booking ("."user_id".", booking_type, date_booking, seat_total, time_booking, seat_detail, child_seat, adult_seat, old_seat, seat_price, slip_pic, status_book)
         VALUES('{$_SESSION['u_id']}', '{$_SESSION['seatDetails']}', '{$_SESSION['dates']}', '{$_SESSION['sumSeat']}', '{$_SESSION['timed']}', '{$_SESSION['s_seatNumber']}', '{$_SESSION['s_seatChild']}',
         '{$_SESSION['s_seatAdult']}', '{$_SESSION['s_seatOlder']}', '{$_SESSION['s_allseatprice']}', '$slipImage', '{$_SESSION['status_book']}')";
        $result = mysqli_query($con, $sql);
        header("Location: sliprice.php?allbooking=success");
        exit();
    }
?>
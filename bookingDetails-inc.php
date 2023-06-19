<?php 
    session_start();
    require ('connect.php');

    if(isset($_POST['submit'])){

        $_SESSION['seatDetails'];
        $_SESSION['dates'];
        $_SESSION['setseat'];
        $_SESSION['s_allseat'];

        // upload image
       $last = pathinfo(basename($_FILES['slip_pic']['name']), PATHINFO_EXTENSION);
       $newName = 'image_'.uniqid().".".$last;
       $picPath = "bookingpic/";
       $upPath = $picPath.$newName;

       //upload
       $upload = move_uploaded_file($_FILES['slip_pic']['tmp_name'], $upPath);

       $slip = $newName;

        $sql = "INSERT INTO booking (booking_type, date_booking, seat_total, seat_price, slip_pic)
         VALUES('{$_SESSION['seatDetails']}', '{$_SESSION['dates']}', '{$_SESSION['setseat']}', '{$_SESSION['s_allseat']}', '$slip')";
        $result = mysqli_query($con, $sql);
        header("Location: sliprice.php?allbooking=success");
        exit();
    }
?>
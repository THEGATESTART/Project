<?php 
    session_start();
    require ('connect.php');

    if(isset($_POST['submit'])){

        // upload image
        $ext = pathinfo(basename($_FILES['slip_image']['name']), PATHINFO_EXTENSION);
        $newImgname = 'img_'.uniqid().".".$ext;
        $imagePath = "bookingpic/";
        $uploadPath = $imagePath.$newImgname;

        // uploading
        $success = move_uploaded_file($_FILES['slip_image']['tmp_name'], $uploadPath);

        $slipImage = $newImgname;

        $sql = "UPDATE booking set slipPic='$slipImage' where bookingID ='$_REQUEST[booking_id]' ";
        $result = mysqli_query($con,$sql);
        header("Location: statusDetail.php?uploadSuccess");
        exit();
    }
?>
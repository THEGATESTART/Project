<?php

    session_start();
    require ('connect.php');

    if($_POST){

        $_SESSION['u_id'];
        $_SESSION['seatDetail'];
        $_SESSION['dates'];
        $_SESSION['sumSeat'];
        $_SESSION['seatChild'];
        $_SESSION['seatAdult'];
        $_SESSION['seatOlder'];
        $seatNumber = $_POST['seatNumber'];
        $_SESSION['seatNumber'] = $seatNumber;
        $status_book = 0;

        // Converse date for insert to database
        $newdate = $_SESSION['timed'];;
        $date = str_replace('/', '-', $newdate);
        $newtime = date('Y-m-d', strtotime($date));

        $seatchild = $_SESSION['seatChild'];
        $seatchildprice = 15;
        $pricechild_Sum = '';
            if(!is_numeric($pricechild_Sum)) {
                $pricechild_Sum = floatval($seatchild) * floatval($seatchildprice);
            }

        $seatadult = $_SESSION['seatAdult'];
        $seatadultprice = 30;
        $priceadult_Sum = '';
            if(!is_numeric($priceadult_Sum)) {
                $priceadult_Sum = floatval($seatadult) * floatval($seatadultprice);
            }

        $seatold = $_SESSION['seatOlder'];
        $seatoldprice = 15;
        $priceold_Sum = '';
            if(!is_numeric($priceold_Sum)){
                $priceold_Sum = floatval($seatold) * floatval($seatoldprice);
            }

        $allseatprice = $pricechild_Sum + $priceadult_Sum + $priceold_Sum;
        
        if($_SESSION['seatChild'] == ""){
            $_SESSION['seatChild'] = 0;
        }
        if($_SESSION['seatAdult'] == ""){
            $_SESSION['seatAdult'] = 0;
        }
        if($_SESSION['seatOlder'] == ""){
            $_SESSION['seatOlder'] = 0;
        }

        $sql = "INSERT INTO booking ("."userID".", bookType, bookDate, seatTotal, timeBooking, childSeat, adultSeat, oldSeat, seatPrice, slipPic, statusBook)
            VALUES('{$_SESSION['u_id']}', '{$_SESSION['seatDetail']}', '{$_SESSION['dates']}', '{$_SESSION['sumSeat']}', '{$_SESSION['timed']}', '{$_SESSION['seatChild']}',
            '{$_SESSION['seatAdult']}', '{$_SESSION['seatOlder']}', '$allseatprice', '', '$status_book')";
        $query = mysqli_query($con, $sql);
        $seat_booking = mysqli_insert_id($con);

        foreach($_SESSION['seatNumber'] as $new){
            // echo $new;
             if(strstr($new,",")){

                $seat_detail = explode(",",$new);//A1,B1,A2
               
                for($i=0; $i<count($seat_detail); $i++){
                    $sql = "INSERT INTO seatdetail (bookingID, seatNumber) values ('$seat_booking', '$seat_detail[$i]')";
                    $query = mysqli_query($con, $sql);   
                }
            }else{
                $sql = "INSERT INTO seatdetail (bookingID, seatNumber) values ('$seat_booking', '$new')";
                $query = mysqli_query($con, $sql);
            }
        }
    }
?>
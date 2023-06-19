<?php

    session_start();
    require ('connect.php');

    if($_POST){
        $seatDetail = $_POST['seatDetail'];
        $seatDate = $_POST['date'];
        $seatChild = $_POST['child'];
        $seatAdult = $_POST['adult'];
        $seatOlder = $_POST['older'];

        // Check seat type to get database
        $sumSeat = '';
        if(!is_numeric($sumSeat)){
            $sumSeat = intval($seatChild) + intval($seatAdult) + intval($seatOlder);
        }

        $seatPriceAll = 1500;
        
        if($seatDetail == 'seatNormal'){

            $Detail = 'จองตั๋วแบบปกติ';

            $_SESSION['sumSeat'] = $sumSeat;
            $_SESSION['seatDetail'] = $Detail;
            $_SESSION['dates'] = $seatDate;
            $_SESSION['seatChild'] = $seatChild;
            $_SESSION['seatAdult'] = $seatAdult;
            $_SESSION['seatOlder'] = $seatOlder;
            
        }

        if($seatDetail == 'seatAll'){

            $Details = 'จองตั๋วแบบเหมา';

            $_SESSION['sumSeat'] = $sumSeat;
            $_SESSION['seatDetails'] = $Details;
            $_SESSION['dates'] = $seatDate;

            // String to date for insert to database
            $newdate = $seatDate;
            $date = str_replace('/', '-', $newdate);
            $newtime = date('Y-m-d', strtotime($date));

            $sql = "INSERT INTO booking ("."userID ".", bookType, bookDate, seatTotal, timeBooking, seatPrice) VALUES('{$_SESSION['u_id']}', '{$_SESSION['seatDetails']}', '$newtime', '$sumSeat', '', '$seatPriceAll')";
            $query = mysqli_query($con, $sql);
            exit();
        }
    }

?>
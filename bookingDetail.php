<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/ebb408c446.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.17/dist/sweetalert2.all.min.js"></script>

    <title>Minibus Nan</title>

    <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Prompt';

        body {
            font-family: 'Kanit', sans-serif;
        }

        h1,
        h2,
        h3 {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body>

    <?php
    if(isset($_SESSION['u_id'])){
        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <a class="navbar-brand" href="index.php">รถรางน่าน</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">หน้าแรก</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mapNan.php">แผนที่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">ติดต่อ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statusDetail.php">รายละเอียดการจอง</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> บัญชีผู้ใช้
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profiles.php">ข้อมูลผู้ใช้งาน</a>
                        <div class="dropdown-divider"></div>
                    <form action="logout-inc.php" method="POST" class="form-inline my-2 my-lg-0" >
                        <button type="submit" name="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
                    </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>';
    } 
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card mt-4 mb-4 shadow-lg border-0">
                    <div class="card-body">
                        <form action="bookingDetail-inc.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="ml-3">รายละเอียดการจอง</h3>
                                    <hr>
                                </div>
                            </div>
                            <?php

                            include 'connect.php';

                            $booking_id = $_REQUEST['bookingID'];
                            $_SESSION["bookID"] = $booking_id;
                            $sql = "SELECT booking.*, firstName, lastName, emailTxt, phoneNumber, GROUP_CONCAT(seatNumber) FROM booking inner join user_tb on user_tb.userID=booking.userID 
                                inner join seatdetail on seatdetail.bookingID=booking.bookingID where booking.bookingID='$booking_id' order by bookingID";
                            $result = mysqli_query($con, $sql);

                            while($row = mysqli_fetch_array($result)){
                            echo '<div class="row">
                                <div class="col-sm-12">';
                                if($row['statusBook'] == 0 && $row['slipPic'] == null){
                                    echo '<div class="col-sm-12">
                                    <input class="btn btn-danger rounded-pill w-100 p-3" value="ยังไม่ได้ชำระ" readonly>
                                    </div>';
                                    }elseif($row['slipPic'] != "" && $row['statusBook'] == 0){
                                        echo '<div class="col-sm-12">
                                        <input class="btn btn-warning rounded-pill w-100 p-3" value="รอการตรวจสอบ" readonly>
                                     </div>';
                                    }elseif($row['statusBook'] == 1){
                                        echo '<div class="col-sm-12">
                                        <input class="btn btn-success rounded-pill w-100 p-3" value="ชำระเรียบร้อย" readonly>
                                     </div>';
                                    }
                                    echo '</div>
                            </div>';
                            echo '<div class="row justify-content-center">';
                                echo '<div class="col-sm-12">';
                                    echo '<div class="card border-0">';
                                        echo '<div class="card-body">'; 
                                            echo '<div class="row mt-2">';
                                                echo '<div class="col-sm-3">';
                                                    echo "<h5>BOOKING_ID: ".$row['bookingID']."</h5>";                 
                                                echo '</div>';
                                                echo '<div class="col-sm-9">';
                                                    echo "<h5>วันที่: ".$row['bookDate']."</h5>";
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<hr>';
                                            echo '<div class="row">';
                                                echo '<div class="col-sm-3">';
                                                    echo '<h5>รูปแบบการจอง: </h5>';
                                                echo '</div>';
                                                echo '<div class="col-sm-9">';
                                                    echo "<h5>".$row['bookType']."</h5>";
                                                   echo '<hr>';
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<div class="row">';
                                                echo '<div class="col-sm-3"></div>';
                                                echo '<div class="col-sm-2">';
                                                    echo '<p>ผู้จอง</p>';
                                                echo '</div>';
                                                echo '<div class="col-sm-7 rounded" style="background-color: #E2FFF8;">';
                                                    echo "<p class='mt-1'>".$row['firstName']."&nbsp;".$row['lastName']."</p>";
                                                    echo '<div class="form-inline">';
                                                    echo "<p>".$row['emailTxt']."</p>&nbsp;&nbsp;&nbsp;";
                                                    echo "<p>".$row['phoneNumber']."</p>";
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<div class="row mt-2">'; 
                                                echo '<div class="col-sm-3"></div>';
                                                echo '<div class="col-sm-2">';
                                                    echo '<p>รายละเอียดเพิ่มเติม</p>';
                                                echo '</div>';
                                                echo '<div class="col-sm-7 rounded" style="background-color: #E2FFF8;">';
                                                    echo '<div class="row">';
                                                        echo '<div class="col-6">';
                                                            echo "<p class='mt-1'>จำนวนที่จอง:&nbsp; ".$row['seatTotal']."</p>";
                                                        echo '</div>';
                                                        echo '<div class="col-6">';
                                                            echo "<p class='mt-1'>เวลาที่จอง:&nbsp; ".$row['timeBooking']."</p>";
                                                        echo '</div>';
                                                    echo '</div>';
                                                    echo '<div class="row">';
                                                        echo '<div class="col-12">';
                                                            echo "<p class='mt-1'>ตำแหน่งที่นั่งที่จอง:&nbsp; ".$row['GROUP_CONCAT(seatNumber)']."</p>";
                                                        echo '</div>';
                                                    echo '</div>';
                                                    echo '<div class="row">';
                                                        echo '<div class="col-4">';
                                                            echo "<p class='mt-1'>เด็ก:&nbsp; ".$row['childSeat']."</p>";
                                                        echo '</div>';
                                                        echo '<div class="col-4">';
                                                            echo "<p class='mt-1'>ผู้ใหญ่:&nbsp; ".$row['adultSeat']."</p>";
                                                        echo '</div>';
                                                        echo '<div class="col-4">';
                                                            echo "<p class='mt-1'>ผู้สูงอายุ:&nbsp; ".$row['oldSeat']."</p>";
                                                        echo '</div>';
                                                    echo '</div>';
                                                   echo '<div class="row">';
                                                        echo '<div class="col-6">';
                                                       echo "<p class='mt-1'>ราคารวมทั้งหมด:&nbsp; ".$row['seatPrice']."</p>
                                                        </div>
                                                    </div>";
                                                echo '</div>';
                                            echo '</div>';
                                            echo '<div class="row mt-2">';
                                                echo '<div class="col-sm-3"></div>';
                                                echo '<div class="col-sm-2">';
                                                    echo '<p>ใบเสร็จการโอน</p>';
                                                echo '</div>';
                                                echo '<div class="col-sm-7 rounded" style="background-color: #E2FFF8;">';
                                                    if($row['slipPic'] != ''){
                                                        echo "<center><img class='mt-2 mb-2' src='bookingpic/".$row['slipPic']."' height='300'></center>";
                                                    }else{
                                                        echo "";
                                                    }
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row mt-3">';
                                
                                if($row['statusBook'] == 0){
                                    echo '<div class="col-sm-6"></div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-3">
                                        <a href="statusDetail.php" class="btn btn-outline-secondary w-100">ย้อนกลับ</a>
                                    </div>';
                                }elseif($row['statusBook'] == 1){
                                    echo '<div class="col-sm-6"></div>
                                    <div class="col-sm-3">
                                        <a href="statusDetail.php" class="btn btn-outline-secondary w-100">ย้อนกลับ</a>
                                    </div>
                                    <div class="col-sm-3">
                                    <a href="dlslip.php?booking_id='.$row['booking_id'].'" class="btn btn-primary w-100">พิมพ์ตั๋ว</a>
                                    </div>';
                                }
                               echo '</div>';
                        }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-dark p-4 mt-3">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span class="text-white">Copyright &copy; Your Website 2019</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</body>

</html>
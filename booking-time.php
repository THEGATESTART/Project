<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

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
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Prompt', sans-serif;
    }
    </style>

</head>

<body>
    <?php require ('header.php'); ?>

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
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    } else {
        echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <a class="navbar-brand" href="index.php">รถรางน่าน</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">หน้าแรก</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mapping.php">แผนที่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">ติดต่อ</a>
                </li>
            </ul>
                    <button type="submit" name="submit" class="btn btn-primary mr-2 mt-1" data-toggle="modal" data-target="#exampleModal2">เข้าสู่ระบบ</button>
                    <a href="" class="btn btn-success mt-1" data-toggle="modal" data-target="#exampleModal1">สมัครสมาชิก</a>
                </ul>
        </div>
    </nav>';
    }
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mt-4 mb-2 shadow border-0">
                    <div class="card-header border-0">
                        <h1>เวลาเดินทาง</h1>
                    </div>
                    <?php
                        include 'connect.php';

                        $maxseat = 24;
                        $resultSeat = "";
                        $sql = "SELECT seatTotal FROM booking where bookDate='{$_SESSION['dates']}' and timeBooking='09.30' group BY timeBooking";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        if (is_null($row)) {
                            $resultSeat = $maxseat;
                        } else {
                            $sumseat = $row['seatTotal'];
                            $resultSeat = $maxseat - $sumseat;
                        }

                        $resultSeat1 = "";
                        $sql1 = "SELECT seatTotal FROM booking where bookDate='{$_SESSION['dates']}' and timeBooking='10.30' group BY timeBooking";
                        $result1 = mysqli_query($con, $sql1);
                        $row1 = mysqli_fetch_array($result1);
                        if (is_null($row1)) {
                            $resultSeat1 = $maxseat;
                        } else {
                            $sumseat1 = $row1['seatTotal'];
                            $resultSeat1 = $maxseat - $sumseat1;
                        }

                        $resultSeat2 = "";
                        $sql2 = "SELECT seatTotal FROM booking where bookDate='{$_SESSION['dates']}' and timeBooking='13.30' group BY timeBooking";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_array($result2);
                        if (is_null($row2)) {
                            $resultSeat2 = $maxseat;
                        } else {
                            $sumseat2 = $row2['seatTotal'];
                            $resultSeat2 = $maxseat - $sumseat2;
                        }
                
                        $resultSeat3 = "";
                        $sql3 = "SELECT seatTotal FROM booking where bookDate='{$_SESSION['dates']}' and timeBooking='15.30' group BY timeBooking";
                        $result3 = mysqli_query($con, $sql3);
                        $row3 = mysqli_fetch_array($result3);
                        if (is_null($row3)) {
                            $resultSeat3 = $maxseat;
                        } else {
                            $sumseat3 = $row3['seatTotal'];
                            $resultSeat3 = $maxseat - $sumseat3;
                        }
                        
                    ?>
                    <div class="card-body">
                        <form id="timeFrm" action="booking-time-inc.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                <?php
                                    if($resultSeat > 0){
                                        echo '<div class="card card-body shadow border-0 timeBack ">';
                                    }else{
                                        echo '<div class="card card-body bg-warning shadow border-0 timeBack ">';
                                    }
                                    ?>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4>เวลา 9.30 น.</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 style="padding-left: 45px;">ว่าง: <?php if($resultSeat > 0){
                                                    echo $resultSeat;
                                                    }
                                                    if($resultSeat == 0){
                                                        $fullSeat = "full";
                                                        $_SESSION['full1'] = $fullSeat; 
                                                        echo "เต็ม";
                                                    } ?></h4>
                                            </div>
                                        </div>
                                        <?php
                                        if($resultSeat == 0){
                                            echo '<div class="custom-control custom-radio">
                                            <p>ใช้เวลาในการทัวร์รอบตัวเมืองน่าน 1 ชั่วโมง</p>
                                        </div>';
                                        }else{
                                        echo '<div class="custom-control custom-radio">
                                            <input type="radio" id="time1" name="time" class="custom-control-input"
                                                value="09.30">
                                            <label class="custom-control-label" for="time1">จองตั๋ว</label>
                                            <p>ใช้เวลาในการทัวร์รอบตัวเมืองน่าน 1 ชั่วโมง</p>
                                        </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <?php
                                   if($resultSeat1 > 0){
                                    echo '<div class="card card-body shadow border-0 timeBack ">';
                                }else{
                                    echo '<div class="card card-body bg-warning shadow border-0 timeBack ">';
                                }
                                    ?>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4>เวลา 10.30 น.</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 style="padding-left: 45px;">ว่าง: <?php if($resultSeat1 > 0){
                                                    echo $resultSeat1;
                                                    }
                                                    if($resultSeat1 == 0){
                                                        $fullSeat = "full";
                                                        $_SESSION['full2'] = $fullSeat; 
                                                        echo "เต็ม";
                                                    } ?>
                                                </h4>
                                            </div>
                                        </div>
                                        <?php
                                        if($resultSeat1 == 0){
                                            echo '<div class="custom-control custom-radio">
                                            <p>ใช้เวลาในการทัวร์รอบตัวเมืองน่าน 1 ชั่วโมง</p>
                                        </div>';
                                        }else{
                                        echo '<div class="custom-control custom-radio">
                                            <input type="radio" id="time2" name="time" class="custom-control-input"
                                                value="10.30">
                                            <label class="custom-control-label" for="time2">จองตั๋ว</label>
                                            <p>ใช้เวลาในการทัวร์รอบตัวเมืองน่าน 1 ชั่วโมง</p>
                                        </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                <?php
                                    if($resultSeat2 > 0){
                                        echo '<div class="card card-body shadow border-0 timeBack ">';
                                    }else{
                                        echo '<div class="card card-body bg-warning shadow border-0 timeBack ">';
                                    }
                                    ?>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4>เวลา 13.30 น.</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 style="padding-left: 45px;">ว่าง: <?php if($resultSeat2 > 0){
                                                    echo $resultSeat2;
                                                    }
                                                    if($resultSeat2 == 0){
                                                        $fullSeat = "full";
                                                        $_SESSION['full3'] = $fullSeat; 
                                                        echo "เต็ม";
                                                    } ?>
                                                </h4>
                                            </div>
                                        </div>
                                        <?php
                                        if($resultSeat2 == 0){
                                            echo '<div class="custom-control custom-radio">
                                            <p>ใช้เวลาในการทัวร์รอบตัวเมืองน่าน 1 ชั่วโมง</p>
                                        </div>';
                                        }else{
                                        echo '<div class="custom-control custom-radio">
                                            <input type="radio" id="time3" name="time" class="custom-control-input"
                                                value="13.30">
                                            <label class="custom-control-label" for="time3">จองตั๋ว</label>
                                            <p>ใช้เวลาในการทัวร์รอบตัวเมืองน่าน 1 ชั่วโมง</p>
                                        </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    if($resultSeat3 > 0){
                                        echo '<div class="card card-body shadow border-0 timeBack ">';
                                    }else{
                                        echo '<div class="card card-body bg-warning shadow border-0 timeBack ">';
                                    }
                                    ?>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4>เวลา 15.30 น.</h4>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 style="padding-left: 45px;">ว่าง: <?php if($resultSeat3 > 0){
                                                    echo $resultSeat3;
                                                    }
                                                    if($resultSeat3 == 0){
                                                        $fullSeat = "full";
                                                        $_SESSION['full4'] = $fullSeat; 
                                                        echo "เต็ม";
                                                    } ?>
                                                </h4>
                                            </div>
                                        </div>
                                        <?php
                                        if($resultSeat3 == 0){
                                            echo '<div class="custom-control custom-radio">
                                            <p>ใช้เวลาในการทัวร์รอบตัวเมืองน่าน 1 ชั่วโมง</p>
                                        </div>';
                                        }else{
                                        echo '<div class="custom-control custom-radio">
                                            <input type="radio" id="time4" name="time" class="custom-control-input"
                                                value="15.30">
                                            <label class="custom-control-label" for="time4">จองตั๋ว</label>
                                            <p>ใช้เวลาในการทัวร์รอบตัวเมืองน่าน 1 ชั่วโมง</p>
                                        </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"></div>
                                <div class="col-md-3 mt-2">
                                    <a href="index.php" class="btn btn-secondary w-100">กลับไปเลือกวันที่</a>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <input type="submit" class="btn btn-success w-100" value="ดำเนินการต่อ">
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <!-- <footer class="bg-dark p-4 mt-3 fixed-bottom">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span class="text-white">Copyright &copy; Your Website 2019</span>
            </div>
        </div>
    </footer> -->

    <script>
        $(document).ready(function () {
            $('#timeFrm').submit(function (e) {
                
                var timeRound = $('input[name="time"]:checked').val();

                if ($('input[name="time"]:checked').length == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'ตัวเลือกไม่ถูกต้อง',
                        text: 'กรุณาเลือกเวลาให้ถูกต้อง',
                        confirmButtonText: 'ยืนยัน'
                    });
                } else {
                    $.ajax({
                        method: "POST",
                        url: "booking-time-inc.php",
                        data: $("#timeFrm").serialize(),
                        success: function (data) {
                            console.log(data)
                        }
                    });
                        window.location = 'booking-seat.php';
                }
                e.preventDefault();
            });
        });
    </script>

</body>

</html>
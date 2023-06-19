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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

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
    <?php require 'header.php'; ?>

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
            </ul>
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">หน้าแรก</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mapping.php">แผนที่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">ติดต่อ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">คู่มือการใช้งาน?</a>
                </li>
                <li class="nav-item">
                    <button type="submit" name="submit" class="btn btn-primary mr-2 mt-1" data-toggle="modal" data-target="#exampleModal2">เข้าสู่ระบบ</button>
                    <a href="" class="btn btn-success mt-1" data-toggle="modal" data-target="#exampleModal1">สมัครสมาชิก</a>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="ml-3">แจ้งการโอน</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <form id="slipAllFrm" action="sendSlipAll-inc.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="booking_id" id="booking_id"
                                                value="<?php echo $_REQUEST['booking_id']?>">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p>ผ่านทางธนาคาร</p>
                                                </div>
                                                <div class="col-sm-3">
                                                    <img src="pic/kasikorn.png" alt=""
                                                        style="height: 80px; width: 80px;">
                                                </div>
                                                <div class="col-sm-3">
                                                    <img src="pic/ktb.png" alt="" style="height: 80px; width: 80px;">
                                                </div>
                                                <div class="col-sm-3">
                                                    <img src="pic/SCB.png" alt="" style="height: 85px; width: 85px;">
                                                </div>
                                            </div>
                                            <hr>
                                            <?php

                                            include 'connect.php';
                                                                    
                                            $booking_id = $_REQUEST['booking_id'];
                                            $sql = "SELECT seatPrice FROM booking where bookingID='$booking_id'";
                                            $result = mysqli_query($con, $sql);

                                            while($row = mysqli_fetch_array($result)){
                                               echo "<div class='row no-gutters'>
                                                    <div class='col-sm-3'>
                                                        <h5>ราคาแบบเหมาทั้งคัน: </h5>
                                                    </div>
                                                    <div class='col-sm-9'><h5>".$row['seatPrice']."</h5></div>
                                               </div>";
                                                }
                                            ?>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h5>ใบเสร็จการโอน: </h5>
                                                </div>
                                                <div class="col-sm-9">
                                                    <center><img id="slip" width="300" height="400" class="mb-2">
                                                    </center>
                                                    <div class="custom-file">
                                                        <input type="file" name="slip_image" id="customFile"
                                                            style="text-overflow: ellipsis;" class="custom-file-input"
                                                            onchange="document.getElementById('slip').src = window.URL.createObjectURL(this.files[0])"
                                                            >
                                                        <label class="custom-file-label"
                                                            for="customFile">ส่งหลักฐานการโอน</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm-6"></div>
                                                <div class="col-sm-3">
                                                    <a href="statusDetail.php"
                                                        class="btn btn-outline-secondary w-100">ย้อนกลับ</a>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit" name="submit" class="btn btn-primary w-100"
                                                        value="">ยืนยัน</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

</body>

</html>
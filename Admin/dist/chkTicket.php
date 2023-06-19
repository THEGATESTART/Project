<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>รถรางน่าน</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.17/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">รถรางน่าน</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <div class="input-group-append">
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <form action="logout-inc.php" method="post">
                        <button type="submit" name="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a>
                            <a class="nav-link" href="chkTicket.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-check-circle"></i></div>
                                ตรวจตั๋ว</a>
                            <div class="sb-sidenav-menu-heading">รายละเอียดการจอง</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                ประเภทการจอง
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="normalSeat.php">จองตั๋วแบบปกติ</a><a class="nav-link" href="allSeat.php">จองตั๋วแบบเหมา</a></nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">รายละเอียดบัญชี</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                ประเภทบัญชีผู้ใช้งาน
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapse" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="user.php">บัญชีผู้ใช้งาน</a><a class="nav-link" href="admin.php">บัญชีผู้ดูแลระบบ</a></nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <?php echo $_SESSION['ad_username']; ?></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-header"><h2>ตรวจตั๋ว: </h2></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="mb-3">
                                                <form name="frmsearch" action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="get">
                                                    <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">BOOKING_ID: </span>
                                                    </div>
                                                        <input type="number" class="form-control" name="b_id" id="b_id" min="0" placeholder="กรอก BOOKING_ID" value="<?php echo $_GET['b_id'] ?>">
                                                        <button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-search"></i> Search</button>
                                                    </div>
                                                </form>
                                                <?php
                                                include 'connect.php';

                                                    if(isset($_GET['submit']) != ""){
                                                        $sql = "SELECT * FROM booking WHERE booking.booking_id = ".$_GET['b_id']."";
                                                        $result = mysqli_query($con, $sql) or die ("Error: " . mysqli_error($con));
                                                        $row = mysqli_fetch_array($result);
                                                        if($row['booking_type'] == "จองตั๋วแบบปกติ"){
                                                            $booking_type = $row['booking_type'];
                                                            $booking_id = $_GET["b_id"];
                                                        }elseif($row['booking_type'] == "จองตั๋วแบบเหมา"){
                                                            $booking_type = $row['booking_type'];
                                                            $booking_id = $_GET["b_id"];
                                                        }
                                                    }else{
                                                        $booking_id = "";
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    include 'connect.php';

                                    if($booking_id != "" && $booking_type == "จองตั๋วแบบปกติ"){
                                        $book_id = $booking_id;
                                        $sql = "SELECT booking.*, first_name, last_name, email, phone, GROUP_CONCAT(seat_detail) FROM booking inner join user_db on user_db.user_id=booking.user_id 
                                            inner join seatdetail on seatdetail.booking_id=booking.booking_id WHERE booking.booking_id LIKE '%".$book_id."%'";
                                        $result = mysqli_query($con, $sql) or die ("Error: " . mysqli_error($con));

                                        while($row = mysqli_fetch_array($result)){
                                        echo '<div class="row">
                                            <div class="col-sm-12">';
                                            if($row['status_book'] == 0 && $row['slip_pic'] == null){
                                                echo '<div class="col-sm-12">
                                                <input class="btn btn-danger rounded-pill w-100 p-3" value="ยังไม่ได้ชำระ" readonly>
                                                </div>';
                                                }elseif($row['slip_pic'] != "" && $row['status_book'] == 0){
                                                    echo '<div class="col-sm-12">
                                                    <input class="btn btn-warning rounded-pill w-100 p-3" value="รอการตรวจสอบ" readonly>
                                                </div>';
                                                }elseif($row['status_book'] == 1){
                                                    echo '<div class="col-sm-12">
                                                    <input class="btn btn-success rounded-pill w-100 p-3" value="ชำระเรียบร้อย" readonly>
                                                </div>';
                                                }
                                                echo '</div>
                                        </div>';
                                        echo '<div class="row mt-2">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">ชื่อ-นามสกุล: </label>
                                                <input type="text" class="form-control" value='.$row['first_name'].'&nbsp;'.$row['last_name'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">อีเมล์: </label>
                                                <input type="text" class="form-control" value='.$row['email'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">เบอร์โทรศัพท์: </label>
                                                <input type="text" class="form-control" value='.$row['phone'].' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">รูปแบบการจอง: </label>
                                                <input type="text" class="form-control" value='.$row['booking_type'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">วันที่จอง: </label>
                                                <input type="text" class="form-control" value='.$row['date_booking'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">เวลาที่จอง: </label>
                                                <input type="text" class="form-control" value='.$row['time_booking'].' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                <label for="datepicker">จำนวนที่จอง: </label>
                                                <input type="text" class="form-control text-center" value='.$row['seat_total'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                <label for="datepicker">ราคารวม: </label>
                                                <input type="text" class="form-control text-center" value='.$row['seat_price'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                <label for="datepicker">ตำแหน่งที่นั่งที่จอง: </label>
                                                <input type="text" class="form-control" value='.$row['GROUP_CONCAT(seat_detail)'].' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">เด็ก: </label>
                                                <input type="text" class="form-control text-center" value='.$row['child_seat'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">ผู้ใหญ่: </label>
                                                <input type="text" class="form-control text-center" value='.$row['adult_seat'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">ผู้สูงอายุ: </label>
                                                <input type="text" class="form-control" value='.$row['old_seat'].' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                <label">ใบเสร็จการโอน: </label">';
                                                    if($row['slip_pic'] != ''){
                                                        echo "<center><img class='mt-2 mb-2' src='../../bookingpic/".$row['slip_pic']."' height='300'></center>";
                                                    }else{
                                                        echo "";
                                                    }
                                               echo '</div>
                                            </div>
                                            <div class="col-sm-3"></div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-10"></div>
                                            <div class="col-sm-2">
                                                <a href="chkTicket-inc.php?chkStatus='.$row['booking_id'].'" class="btn btn-success text-white w-100">รับตั๋ว</a>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            }elseif($booking_id != "" && $booking_type == "จองตั๋วแบบเหมา"){
                                $book_id = $booking_id;
                                $sql = "SELECT * FROM booking inner join user_db on user_db.user_id = booking.user_id where booking.booking_id LIKE '%".$book_id."%'";
                                $result = mysqli_query($con, $sql) or die ("Error: " . mysqli_error($con));

                                while($row = mysqli_fetch_array($result)){
                                    echo '<div class="row">
                                            <div class="col-sm-12">';
                                            if($row['status_book'] == 0 && $row['slip_pic'] == null){
                                                echo '<div class="col-sm-12">
                                                <input class="btn btn-danger rounded-pill w-100 p-3" value="ยังไม่ได้ชำระ" readonly>
                                                </div>';
                                                }elseif($row['slip_pic'] != "" && $row['status_book'] == 0){
                                                    echo '<div class="col-sm-12">
                                                    <input class="btn btn-warning rounded-pill w-100 p-3" value="รอการตรวจสอบ" readonly>
                                                </div>';
                                                }elseif($row['status_book'] == 1){
                                                    echo '<div class="col-sm-12">
                                                    <input class="btn btn-success rounded-pill w-100 p-3" value="ชำระเรียบร้อย" readonly>
                                                </div>';
                                                }
                                                echo '</div>
                                        </div>';
                                        echo '<div class="row mt-2">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">ชื่อ-นามสกุล: </label>
                                                <input type="text" class="form-control" value='.$row['first_name'].'&nbsp;'.$row['last_name'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">อีเมล์: </label>
                                                <input type="text" class="form-control" value='.$row['email'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">เบอร์โทรศัพท์: </label>
                                                <input type="text" class="form-control" value='.$row['phone'].' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">รูปแบบการจอง: </label>
                                                <input type="text" class="form-control" value='.$row['booking_type'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">วันที่จอง: </label>
                                                <input type="text" class="form-control" value='.$row['date_booking'].' readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                <label for="datepicker">ราคารวม: </label>
                                                <input type="text" class="form-control" value='.$row['seat_price'].' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                <label">ใบเสร็จการโอน: </label">';
                                                    if($row['slip_pic'] != ''){
                                                        echo "<center><img class='mt-2 mb-2' src='../../bookingpic/".$row['slip_pic']."' height='300'></center>";
                                                    }else{
                                                        echo "";
                                                    }
                                               echo '</div>
                                            </div>
                                            <div class="col-sm-3"></div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-10"></div>
                                            <div class="col-sm-2">
                                                <a href="chkTicket-inc.php?chkStatus='.$row['booking_id'].'" class="btn btn-success text-white w-100">รับตั๋ว</a>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            }
                            ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <footer class="py-4 bg-light mt-4">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

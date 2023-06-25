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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.17/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        
        <style>
            /* Style the buttons */
            .btns {
            background-color: #f1f1f1;
            padding: 10px 16px;
            cursor: pointer;
            }
            /* Style the active class, and buttons on mouse-over */
            .active,
            .btns:hover {
            background-color: #33cc33;
            color: white;
            }
            .bgColor {
            background-color: #FF0000;
            padding: 10px 16px;
            cursor: pointer;
            color: white;
            }
        </style>
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                        </ol>
                        <div class="row mb-3">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-4">
                                <form action="" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control text-center" name="date" id="datepicker"
                                                autocomplete="off" placeholder="ค้นหาวันที่....">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-search"></i> Search</button>
                                    </div>
                                </div>
                                </form>
                                <?php
                                    if(isset($_GET['submit']) != ""){
                                        $searchDate = $_GET["date"];
                                        // Convert date for insert to database
                                        $newdate = $searchDate;
                                        $date = str_replace('/', '-', $newdate);
                                        $newtime = date('Y-m-d', strtotime($date));
                                    }else{
                                        date_default_timezone_set("Asia/Bangkok");
                                        $newtime = date("Y-m-d");
                                        $searchDate = date("Y/m/d");
                                    }
                                ?>
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>
                        <?php
                        include 'connect.php';

                        $maxseat = 24;
                        $resultSeat = "";
                        $sql = "SELECT sum(seatTotal) as 'sumSeat' FROM booking where bookDate='$newtime' and timeBooking='09.30' group BY timeBooking";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        if (is_null($row)) {
                            $resultSeat = $maxseat;
                        } else {
                            $sumseat = $row['sumSeat'];
                            $resultSeat = $maxseat - $sumseat;
                        }

                        $resultSeat1 = "";
                        $sql1 = "SELECT sum(seatTotal) as 'sumSeat' FROM booking where bookDate='$newtime' and timeBooking='10.30' group BY timeBooking";
                        $result1 = mysqli_query($con, $sql1);
                        $row1 = mysqli_fetch_array($result1);
                        if (is_null($row1)) {
                            $resultSeat1 = $maxseat;
                        } else {
                            $sumseat1 = $row1['sumSeat'];
                            $resultSeat1 = $maxseat - $sumseat1;
                        }

                        $resultSeat2 = "";
                        $sql2 = "SELECT sum(seatTotal) as 'sumSeat' FROM booking where bookDate='$newtime' and timeBooking='13.30' group BY timeBooking";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_array($result2);
                        if (is_null($row2)) {
                            $resultSeat2 = $maxseat;
                        } else {
                            $sumseat2 = $row2['sumSeat'];
                            $resultSeat2 = $maxseat - $sumseat2;
                        }
                
                        $resultSeat3 = "";
                        $sql3 = "SELECT sum(seatTotal) as 'sumSeat' FROM booking where bookDate='$newtime' and timeBooking='15.30' group BY timeBooking";
                        $result3 = mysqli_query($con, $sql3);
                        $row3 = mysqli_fetch_array($result3);
                        if (is_null($row3)) {
                            $resultSeat3 = $maxseat;
                        } else {
                            $sumseat3 = $row3['sumSeat'];
                            $resultSeat3 = $maxseat - $sumseat3;
                        }

                        ?>

                        <!-- Search date seat -->
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary mb-4 mt-5 shadow">
                                    <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm-7 text-white"><h2>ว่าง: </h2></div>
                                        <div class="col-sm-5 text-white text-center"><h2><?php echo $searchDate; ?></h2></div>
                                    </div>
                                    </div>
                                    <?php
                                    if(isset($_POST['submit']) != ""){
                                        $selectTime = $_POST["time"];
                                        $_SESSION['seTime'] = $selectTime;
                                    }else{
                                        $_SESSION['seTime'] = "00.00";
                                    }
                                ?>
                                <form action="" method="post">
                                    <div class="card-body"> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="time1" name="time" class="custom-control-input"
                                                                    value="09.30">
                                                                <label class="custom-control-label" for="time1"><h4>09.30</h4></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
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
                                                    </div>  
                                                </div>   
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="time2" name="time" class="custom-control-input"
                                                                    value="10.30">
                                                                <label class="custom-control-label" for="time2"><h4>10.30</h4></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <h4 style="padding-left: 45px;">ว่าง: <?php if($resultSeat1 > 0){
                                                                echo $resultSeat1;
                                                                }
                                                                if($resultSeat1 == 0){
                                                                    $fullSeat = "full";
                                                                    $_SESSION['full2'] = $fullSeat; 
                                                                    echo "เต็ม";
                                                                } ?></h4>
                                                        </div>
                                                        </div>
                                                    </div>  
                                                </div>   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="card card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="time3" name="time" class="custom-control-input"
                                                                    value="13.30">
                                                                <label class="custom-control-label" for="time3"><h4>13.30</h4></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <h4 style="padding-left: 45px;">ว่าง: <?php if($resultSeat2 > 0){
                                                                echo $resultSeat2;
                                                                }
                                                                if($resultSeat2 == 0){
                                                                    $fullSeat = "full";
                                                                    $_SESSION['full3'] = $fullSeat; 
                                                                    echo "เต็ม";
                                                                } ?></h4>
                                                        </div>
                                                        </div>
                                                    </div>  
                                                </div>   
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                        <div class="col-sm-3">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="time4" name="time" class="custom-control-input"
                                                                    value="15.30">
                                                                <label class="custom-control-label" for="time4"><h4>15.30</h4></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <h4 style="padding-left: 45px;">ว่าง: <?php if($resultSeat3 > 0){
                                                                echo $resultSeat3;
                                                                }
                                                                if($resultSeat3 == 0){
                                                                    $fullSeat = "full";
                                                                    $_SESSION['full4'] = $fullSeat; 
                                                                    echo "เต็ม";
                                                                } ?></h4>
                                                        </div>
                                                        </div>
                                                    </div>  
                                                </div>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-9"></div>
                                            <div class="col-md-3">
                                                <button type="submit" name="submit" class="btn btn-success w-100">ค้นหา</button>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                </form> 
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card card-body shadow border-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="btn btn-primary w-100 p-3">ไกด์</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="btn btn-warning w-100 p-3">คนขับ</p>
                                        </div>
                                    </div>
                                        <?php
                                        $seat = [
                                            [
                                                'seat1' => 'A1',
                                                'seat2' => 'A2',
                                                'seat3' => 'B1',
                                                'seat4' => 'B2' 
                                            ],
                                            [
                                                'seat1' => 'A3',
                                                'seat2' => 'A4',
                                                'seat3' => 'B3',
                                                'seat4' => 'B4' 
                                            ],
                                            [
                                                'seat1' => 'A5',
                                                'seat2' => 'A6',
                                                'seat3' => 'B5',
                                                'seat4' => 'B6' 
                                            ],
                                            [
                                                'seat1' => 'A7',
                                                'seat2' => 'A8',
                                                'seat3' => 'B7',
                                                'seat4' => 'B8' 
                                            ],
                                            [
                                                'seat1' => 'A9',
                                                'seat2' => 'A10',
                                                'seat3' => 'B9',
                                                'seat4' => 'B10' 
                                            ],
                                            [
                                                'seat1' => 'A11',
                                                'seat2' => 'A12',
                                                'seat3' => 'B11',
                                                'seat4' => 'B12' 
                                            ] 
                                        ];

                                        foreach($seat as $val){
                                            include 'connect.php';

                                            $sql = "SELECT * FROM booking inner join seatdetail on booking.bookingID = seatdetail.bookingID WHERE bookDate LIKE '$newtime' and timeBooking='{$_SESSION['seTime']}'";
                                            $query = mysqli_query($con, $sql);

                                           $new1 = "";
                                           $new2 = "";
                                           $new3 = "";
                                           $new4 = "";

                                           $book = array();

                                        while($row = mysqli_fetch_assoc($query)){
                                            array_push($book, $row['seatNumber']);
                                        }

                                        if(in_array($val['seat1'], $book)){
                                            $new1 = "จองแล้ว";
                                        }else{
                                            $new1 = $val['seat1'];
                                        }
                                        if(in_array($val['seat2'], $book)){
                                            $new2 = "จองแล้ว";
                                        }else{
                                            $new2 = $val['seat2'];
                                        }
                                        if(in_array($val['seat3'], $book)){
                                            $new3 = "จองแล้ว";
                                        }else{
                                            $new3 = $val['seat3'];
                                        }
                                        if(in_array($val['seat4'], $book)){
                                            $new4 = "จองแล้ว";
                                        }else{
                                            $new4 = $val['seat4'];
                                        }
                                            ?>

                                        <div class="row mt-2">
                                            <div class="col-3">
                                            <?php if($new1 == "จองแล้ว"){ ?> 
                                                <input class="bgColor w-100 p-3 btn"  value="<?php echo $new1; ?>" readonly>
                                            <?php }else{ ?>
                                                <input class="btns w-100 p-3 btn seat"  value="<?php echo $new1; ?>" readonly>
                                            <?php } ?>
                                            </div>
                                            <div class="col-3">
                                            <?php if($new2 == "จองแล้ว"){ ?>
                                                <input class="bgColor w-100 p-3 btn" value="<?php echo $new2; ?>" readonly>
                                                <?php }else{ ?>
                                                <input class="btns w-100 p-3 btn seat"  value="<?php echo $new2; ?>" readonly>
                                            <?php } ?>
                                            </div>
                                            <div class="col-3">
                                            <?php if($new3 == "จองแล้ว"){ ?>
                                                <input class="bgColor w-100 p-3 btn" value="<?php echo $new3; ?>" readonly>
                                                <?php }else{ ?>
                                                <input class="btns w-100 p-3 btn seat"  value="<?php echo $new3; ?>" readonly>
                                            <?php } ?>
                                            </div>
                                            <div class="col-3">
                                            <?php if($new4 == "จองแล้ว"){ ?>
                                                <input class="bgColor w-100 p-3 btn" value="<?php echo $new4; ?>" readonly>
                                                <?php }else{ ?>
                                                <input class="btns w-100 p-3 btn seat"  value="<?php echo $new4; ?>" readonly>
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                    } ?>
                                </div>
                            </div>                                     
                        </div>
                        <!-- end -->

                        <!-- Seat detail -->
                        <div class="row justify-content-center">
                            
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
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- Datapicker function -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#datepicker").datepicker({
                dateFormat: 'dd/mm/yy'
            });
        });
    </script>

    </body>
</html>

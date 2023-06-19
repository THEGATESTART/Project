<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.17/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/ebb408c446.js" crossorigin="anonymous"></script>

    <title>Minibus NAN</title>
    
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
    .btnFree {
      background-color: #f1f1f1;
      padding: 10px 16px;
      cursor: pointer;
    }
    .btnReser{
        background-color: #33cc33;
        color: white;
        padding: 10px 16px;
        cursor: pointer;
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
    }
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4 mb-2 shadow-lg border-0">
                    <form id="countFrm" action="booking-seat-inc.php" method="POST">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row mb-2">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-11">
                                            <div class="form-inline">
                                                <label for="01">จำนวนตั๋วที่จอง: &nbsp;</label>
                                                <input type="text" name="" class="form-control col-sm-3" id="01" style="text-align: center;" 
                                                value="<?php echo $_SESSION['sumSeat']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-body shadow border-0">
                                        <div class="row">
                                            <!-- <div class="col-sm-1"></div> -->
                                            <div class="col-6">
                                                <p class="btn btn-primary w-100 p-3">ไกด์</p>
                                            </div>
                                            <!-- <div class="col-sm-2"></div> -->
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

                                        $sql = "SELECT * FROM booking inner join seatdetail on booking.booking_id = seatdetail.booking_id WHERE date_booking LIKE '{$_SESSION['dates']}' and time_booking LIKE '{$_SESSION['timed']}'";
                                        $query = mysqli_query($con, $sql);

                                        $new1 = "";
                                        $new2 = "";
                                        $new3 = "";
                                        $new4 = "";

                                        $book = array();
                                        
                                        while($row = mysqli_fetch_assoc($query)){
                                            array_push($book, $row['seat_detail']);
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
                                <div class="col-sm-6 mt-2">
                                    <div class="card card-body shadow border-0">
                                        <div class="form-group">
                                            <label for="firstname">ชื่อ-นามสกุล ผู้ติดต่อ: </label>
                                            <input type="text" class="form-control" name="firstname" id="firstname"
                                                value="<?php echo $_SESSION['u_first'], str_repeat("&nbsp;", 2), $_SESSION['u_last']; ?>"
                                                readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">เบอร์โทรศัพท์ผู้ติดต่อ: </label>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                value="<?php echo $_SESSION['u_phone']; ?>" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname">อีเมลผู้ติดต่อ: </label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                value="<?php echo $_SESSION['u_email']; ?>" readonly>
                                        </div>
                                    </div>
                                    <input type="text" name="seatNumber[]" class="form-control mt-3" id="seat_arr"
                                        value="" autocomplete="off" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1 mb-2">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <a href="booking-time.php" class="btn btn-secondary w-100 mb-2">ย้อนกลับ</a>
                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-success w-100"
                                     value="ยืนยัน">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                                        
    <?php $seatAll = $_SESSION['sumSeat']; ?>

    <script>
        var count = 0;
        var seatAll = "<?php echo $seatAll; ?>";
        
    $(document).ready(function(){
        // if($(".btns").val() == "Disable"){}
        $(".btns").click(function () {

                $(this).toggleClass("active");

                count = $('.btns.active').length;
                console.log(count);
                // var val = $(this).val();
                // console.log(val);
                arr = [];
                $.each($('.btns.active'), function (index, val) {
                    console.log(val.value);
                    arr.push(val.value);
                });
                $('#seat_arr').val(arr);
        });
        
        $("#countFrm").submit(function(e){
            if (count == seatAll) {
                Swal.fire({
                    icon: 'success',
                    title: 'ยืนยันการจอง',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก',
                    reverseButtons: true
                }).then((result) => {
                    if(result.value){
                        $.ajax({
                            method: "POST",
                            url: "booking-seat-inc.php",
                            data: $("#countFrm").serialize(),
                            success: function(data){
                            console.log(data)
                            }       
                        });
                        window.location = 'statusDetail.php';        
                    }
                });
            }
            if (count != seatAll) {
                Swal.fire({
                    icon: 'error',
                    title: 'จำนวนที่นั่งไม่ถูกต้อง',
                    text: 'กรุณาตรวจสอบให้ถูกต้อง',
                    confirmButtonText: 'ยืนยัน'
                });
            }
            e.preventDefault();
        });
    });
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<?php require ('connect.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/ebb408c446.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.17/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>

    <title>Minibus Nan</title>
</head>

<body>
    <?php include 'header.php'; ?>

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
                        <a class="dropdown-item" href="profiles.php"> ข้อมูลผู้ใช้งาน</a>
                        <div class="dropdown-divider"></div>
                    <form action="logout-inc.php" method="POST" class="form-inline my-2 my-lg-0" >
                        <button type="submit" name="submit" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
                    </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row mt-4 justify-content-center">
                    <div class="col-sm-7">
                        <div class="card-header border-bottom-0 shadow"><h4>จองตั๋ว</h4></div>
                        <div class="card card-body shadow border-0">
                            <form id="seatFrm" action="dateBooking-inc.php" method="POST">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="seatNormal" name="seatDetail" data-type="normal"
                                                class="custom-control-input" value="seatNormal">
                                            <label class="custom-control-label" for="seatNormal">จองตั๋วแบบปกติ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="seatReser" name="seatDetail" data-type="all"
                                                class="custom-control-input" value="seatAll">
                                            <label class="custom-control-label" for="seatReser">จองตั๋วแบบเหมา</label>
                                            <p style="font-size: 12px; color: red;">(จองก่อนล่วงหน้า 1 อาทิตย์)</p>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-3">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="datepicker">วัน/เดือน/ปี ที่จอง: </label>
                                            <input type="text" class="form-control" name="date" id="datepicker"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="seatAll">เด็ก<span style="font-size: 12px; color: red">(อายุต่ำกว่า 12 ปี)</span>: </label>
                                            <input type="number"  style="text-align: center;" class="form-control seatAll" name="child" id="child" min="0" placeholder="---จำนวน---" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="seatAll">ผู้ใหญ่: </label>
                                            <input type="number" style="text-align: center;" class="form-control seatAll" name="adult" id="adult" min="0" placeholder="---จำนวน---" >
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="seatAll">ผู้สูงอายุ<span style="font-size: 12px; color: red">(อายุมากกว่า 60 ปี)</span>: </label>
                                            <input type="number" style="text-align: center;" class="form-control seatAll" name="older" id="older" min="0" placeholder="---จำนวน---" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-primary w-100" value="ดำเนินการต่อ">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card mt-4 mb-3">
                    <img src="pic/kaonoy.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">วัดพระธาตุเขาน้อย</h5>
                        <p class="card-text">วัดพระธาตุเขาน้อย ตำบลดู่ใต้ อำเภอเมืองน่าน จังหวัดน่าน เป็นวัดราษฎร์
                            องค์พระธาตุตั้งอยู่บนยอดดอยเขาน้อย</p>
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal4">เพิ่มเติม</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mt-4 mb-3">
                    <img src="pic/phumin.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">วัดภูมินทร์</h5>
                        <p class="card-text">ตั้งอยู่ที่บ้านภูมินทร์ อำเภอเมืองน่าน จังหวัดน่าน
                            ใกล้กับพิพิธภัณฑสถาน-แห่งชาติน่าน เดิมชื่อ "วัดพรหมมินทร์" เป็นวัดที่แปลกกว่าวัดอื่นๆ </p>
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal5">เพิ่มเติม</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mt-4 mb-3">
                    <img src="pic/charhang.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">วัดพระธาตุแช่แห้ง</h5>
                        <p class="card-text">พระธาตุแช่แห้ง พระอารามหลวง หมู่ 3 บ้านหนองเต่า
                            ตำบลม่วงตี๊ด อำเภอภูเพียง จังหวัดน่าน </p>
                        <a href="#" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModal3">เพิ่มเติม</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Kaonoy Modal -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">วัดพระธาตุเขาน้อย</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Start slide show -->
                    <div id="demo2" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo2" data-slide-to="0" class="active"></li>
                            <li data-target="#demo2" data-slide-to="1"></li>
                            <li data-target="#demo2" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="pic/kaonoy.jpg" alt="Los Angeles" width="1100" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="pic/kaonoy-1.jpg" alt="Chicago" width="1100" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="pic/kaonoy-2.jpg" alt="New York" width="1100" height="500">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo2" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo2" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    <!-- End slide show -->

                    <!-- Charhang information -->
                    <p class="mt-2"> &nbsp; &nbsp; &nbsp; วัดพระธาตุเขาน้อย ตำบลดู่ใต้ อำเภอเมืองน่าน จังหวัดน่าน
                        เป็นวัดราษฎร์ องค์พระธาตุตั้งอยู่บนยอดดอยเขาน้อย
                        ซึ่งอยู่ด้าน ตะวันตกของตัวเมืองน่าน สร้างในสมัยเจ้าปู่แข็ง เมื่อปี พ.ศ. 2030
                        องค์พระธาตุเป็นเจดีย์ก่อ อิฐถือปูนทั้งองค์ เป็นศิลปะพม่าผสมล้านนา
                        ภายในบรรจุพระเกศาธาตุขององค์สมเด็จพระสัมมาสัม พุทธเจ้าได้ รับการบูรณะปฏิสังขรณ์ครั้งใหญ่
                        ในสมัยพระเจ้าสุริยพงศ์ผริต เดชฯ ระหว่างปี พ.ศ. 2449-2454
                        โดยช่างชาวพม่า และวิหารสร้างในสมัยนี้เช่นกันวัดพระธาตุเขาน้อย เป็นปูชนียสถานที่สำคัญ
                        และเก่าแก่อีกแห่งหนึ่งของ จ.น่าน สันนิษฐานว่ามีอายุรุ่นราวคราวเดียวกับพระธาตุแช่แห้ง
                        บนดอยเบาน้อย สูงจากระดับน้ำทะเล ประมาณ 240 ม. หน้าวัดมีทางขึ้นเป็นบันไดนาค 303 ขั้น </p>
                    <p> &nbsp; &nbsp; &nbsp; จากวัดพระธาตุเขาน้อย สามารถมองเห็นทิวทัศน์โดยรอบของตัวเมืองน่าน
                        ปัจจุบันบริเวณลานชมทิวทัศน์
                        ประดิษฐานพระพุทธมหา อุดมมงคลนันทบุรีศรีน่าน ซึ่งเป็นพระพุทธรูปปางประทานพร บนฐานดอกบัวสูง 9 เมตร
                        บนยอดพระเกศาทำจากทองคำหนัก
                        27 บาท สร้างขึ้นเนื่องในมหามงคลที่พระบาทสมเด็จพระเจ้าอยู่ฯ ทรงเจริญ พระชนมพรรษา 6 รอบ
                        เมื่อวันที่ 5 ธันวาคม พ.ศ. 2542
                        ทางรถขึ้นถึงตัววัด เมื่อขึ้นไปยืนบนยอดเขา จะมองเป็นทิวทัศน์ของเมืองน่าน ได้อย่างชัดเจน
                        ตามประวัติ พระธาตุองค์นี้ สร้างโดย มเหสีรองของพญาภูเข็ง
                        เจ้าผู้ครองนครน่าน เมื่อราวพุทธศตวรรณที่ 20 เจ้าผู้ครองนครน่านอีกหลายองค์ต่อมา ได้บูรณปฏิสังขรณ์
                        องค์พระธาตุ โดยตลอด
                        จนกระทั่งมีการบูรณะครั้งใหญ่ในสมัยพระเจ้าสุริยพงษ์ผริตเดชฯ ในปี พ.ศ. 2449-2454 โดยช่างชาวพม่า
                        ชื่อหม่องยิง</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Phumin Modal -->
    <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel5">วัดภูมินทร์</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Start slide show -->
                    <div id="demo3" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo3" data-slide-to="0" class="active"></li>
                            <li data-target="#demo3" data-slide-to="1"></li>
                            <li data-target="#demo3" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="pic/phumin.jpg" alt="Los Angeles" width="1100" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="pic/phumin-1.jpg" alt="Chicago" width="1100" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="pic/phumin-2.jpg" alt="New York" width="1100" height="500">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo3" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo3" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    <!-- End slide show -->

                    <!-- Charhang information -->
                    <p class="mt-2"> &nbsp; &nbsp; &nbsp;วัดภูมินทร์ ตั้งอยู่ที่บ้านภูมินทร์ อำเภอเมืองน่าน จังหวัดน่าน ใกล้กับพิพิธภัณฑสถาน-แห่งชาติน่าน เดิมชื่อ 
                        "วัดพรหมมินทร์" เป็นวัดที่แปลกกว่าวัดอื่น ๆ คือ โบสถ์และวิหารสร้างเป็นอาคารหลังเดียวกันประตูไม้ทั้งสี่ทิศ 
                        แกะสลักลวดลายโดยช่างฝีมือล้านนาสวยงามมาก นอกจากนี้ฝาผนังยังแสดงถึงชีวิตและ วัฒนธรรมของยุคสมัยที่ผ่านมาตามพงศาวดารของเมืองน่าน 
                        วัดภูมินทร์สร้างขึ้นเมื่อประมาณ พ.ศ. 2139 โดยพระเจ้าเจตบุตรพรหมมินทร์ เจ้าผู้ครอง เมืองน่านได้สร้างขึ้นหลังจากที่ครองนครน่านได้ 6 ปี 
                        มีปรากฏในคัมภีร์เมือง เหนือว่าเดิมชื่อ "วัดพรหมมินทร์" ซึ่งเป็นชื่อของเจ้าเจตบุตรพรหมมินทร์ ผู้สร้างวัด แต่ตอนหลังชื่อวัดได้เพี้ยนไปจากเดิมเป็น 
                        วัดภูมินทร์</p>
                    <p> &nbsp; &nbsp; &nbsp; 1. พระอุโบสถจตุรมุข ความสวยแปลกของวัดภูมินทร์ที่ไม่เหมือนใคร และไม่มีใครเหมือน เป็นหนึ่งเดียวในประเทศไทยก็คือ 
                        เป็นพระอุโบสถทรงจตุรมุข พระประธานจตุรพักตร์ นาคสะดุ้งขนาดใหญ่แห่แหนพระอุโบสถเทินไว้กลางลำตัวนาค
                         พระอุโบสถจตุรมุขนี้กรมศิลปกรได้สันนิษฐานว่า เป็นพระอุโบสถจตุรมุขหลังแรกของ ประเทศไทยพระอุโบสถ ตรงใจกลางประดิษฐานพระพุทธรูปขนาดใหญ่
                         4 องค์ หันพระพักตร์ออก ด้านประตูทั้งสี่ทิศ หันเบื้องพระปฤษฏางค์ ชนกันประทับ นั่งบนฐานชุกชี เป็นพระพุทธรูปปางมารวิชัย ผู้ที่ไปชมความงามของ 
                         พระอุโบสถนี้ไม่ว่าจะเดินขึ้นบันไดทิศใด จะพบพระพักตร์ของพระพุทธรูปทุกด้าน</p>
                    <p> &nbsp; &nbsp; &nbsp; 2. ภาพจิตรกรรมฝาผนัง วัดภูมินทร์ได้รับการบูรณะครั้งใหญ่สมัยเจ้าอนันตวรฤทธิเดช เมื่อ พ.ศ.2410 (ปลายสมัยรัชกาลที่ 4) 
                        ใช้เวลาซ่อม นานถึง 7 ปี จิตรกรรมฝาผนังในวิหาร หลวงเขียนขึ้นในช่วงนี้ ภาพจิตรกรรมหรือ “ฮูบแต้ม” ในวัดภูมินทร์เป็นชาดกในพุทธศาสนา 
                        แต่ถ้าพิจารณารายละเอียดของวิถีชีวิตของคนเมืองในสมัยนั้น มีภาพที่น่าสนใจอยู่หลายภาพ ภาพเด่น คือ ภาพปู่ม่านย่าม่าน 
                        ซึ่งเป็นคำเรียกผู้ชายผู้หญิงชาวไทลื้อในสมัยโบราณกระซิบสนทนากัน ผู้ชายสักหมึก ผู้หญิงแต่งกายไทลื้ออย่างเต็มยศ ภาพวาดของหนุ่มสาวคู่นี้มีความประณีตมาก 
                        ภาพนี้ได้รับการยกย่องว่าเป็นภาพที่งามเป็นเยี่ยมของวัดภูมินทร์</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Charhang Modal -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">วัดพระธาตุแช่แห้ง</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Start slide show -->
                    <div id="demo1" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <li data-target="#demo1" data-slide-to="0" class="active"></li>
                            <li data-target="#demo1" data-slide-to="1"></li>
                            <li data-target="#demo1" data-slide-to="2"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="pic/charhang.jpg" alt="Los Angeles" width="1100" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="pic/charhang-1.jpg" alt="Chicago" width="1100" height="500">
                            </div>
                            <div class="carousel-item">
                                <img src="pic/charhang-2.jpg" alt="New York" width="1100" height="500">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo1" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo1" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    <!-- End slide show -->

                    <!-- Charhang information -->
                    <p class="mt-2"> &nbsp; &nbsp; &nbsp; พระธาตุแช่แห้ง พระอารามหลวง หมู่ 3 บ้านหนองเต่า
                        ตำบลม่วงตี๊ด อำเภอภูเพียง จังหวัดน่าน
                        เดิมเป็นวัดราษฎร์ปัจจุบันเป็นพระอารามหลวง ประดิษฐานอยู่ ณ อำเภอภูเพียง จังหวัดน่าน
                        อยู่ห่างจากตัวเมืองออกไปประมาณ 3 กิโลเมตร
                        องค์พระธาตุตั้งอยู่บนเนินเขาลูกเตี้ยๆ เป็นสีทองสุกปลั่ง สามารถมองเห็นได้แต่ไกลเนื่องจากสูงถึง 2
                        เส้น เป็นอนุสรณ์ของความรักและความสัมพันธ์ระหว่างเมืองน่านกับเมืองสุโขทัยในอดีต </p>
                    <p> &nbsp; &nbsp; &nbsp; ตัวพระธาตุตั้งอยู่บนเชิงเนินปูด้วยอิฐลาดขึ้นไปยังยอดเนินกว้างประมาณ 20 วา
                        มีบันไดนาคขนาบทั้งสองข้าง
                        องค์พระเจดีย์เป็นแบบล้านนา
                        ฐานเป็นสี่เหลี่ยมซ้อนกันขึ้นไปจนสูงใช้แผ่นทองเหลืองบุรอบฐานแล้วลงรักปิดทองจากพงศาวดารเมืองน่านกล่าวว่าพระยาการเมือง
                        เจ้านครน่านได้อัญเชิญพระบรมสารีริกธาตุจาก กรุงสุโขทัย (กระดูกข้อมือข้างซ้าย)
                        มาประดิษฐานไว้ที่ดอยภูเพียงแช่แห้งและตามตำนานกล่าวว่า
                        พระพุทธเจ้าได้เสด็จมาประทับสรงน้ำที่ริมฝั่งแม่น้ำน่านทางทิศตะวันออกที่บ้านห้วยไค้
                        และเสวยผลสมอแห้งซึ่งพระยามลราชนำมาถวายแต่ผลสมอนั้นแห้งมาก
                        พระพุทธเจ้าจึงทรงนำผลสมอนั้นไปแช่น้ำก่อนเสวยและทรงพยากรณ์ว่าต่อไปที่นี่จะมีผู้นำพระบรมสารีริกธาตุมาประดิษฐาน
                        จึงเรียกพระสถูปที่ประดิษฐานพระบรมสารีริกธาตุแห่งนี้ว่า พระธาตุแช่แห้ง</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->';
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
                    <a class="nav-link" href="mapNan.php">แผนที่</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-2" href="contact.php">ติดต่อ</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-primary mr-2 mt-1" data-toggle="modal" data-target="#exampleModal2">เข้าสู่ระบบ</button>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-6" style="margin-top: 13%">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="pic/phumin1.jpg" alt="Los Angeles" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3 class="text-danger">วัดภูมินทร์</h3>
                                <p class="text-danger">กระซิบบันลือโลก ณ น่าน</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="pic/sipanton1.jpg" alt="Chicago" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>วัดศรีพันต้น</h3>
                                <p>จิตรกรรมปูนปั้น "พญานาคราชเจ็ดเศียร" สีทองงดงามอร่ามตา</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="pic/fongkam.jpg" alt="New York" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>โฮงเจ้าฟองคํา</h3>
                                <p>มนต์เสน่ห์บ้านพื้นถิ่น โฮงเจ้าฟองคำ</p> 
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 mt-4">
                <h3 style="text-align: center;">สร้างบัญชีผู้ใช้</h3>
                <h4 style="text-align: center;">เพื่อเข้าใช้งาน</h4>
                <div class="card card-body shadow border-0">
                    <form id="regisform" action="register-inc.php" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i
                                                class="fa fa-address-card-o fa-fw"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="first_name" id="first" placeholder="ชื่อ...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-address-card-o fa-fw"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="last_name" id="last" placeholder="นามสกุล...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="username" id="user" placeholder="Username" onKeyPress="return KeyCode(username)">
                                </div>
                                <p style="font-size: 14px; color: red;">*กรอกได้เฉพาะ a-z, A-Z, 0-9 เท่านั้น</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock fa-fw"></i></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="pass"
                                            placeholder="Password" maxlength="10">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone fa-fw"></i></span>
                            </div>
                            <input type="tel" class="form-control" name="phone" id="pnumber" maxlength="10" placeholder="0997894561">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-envelope fa-fw"></i></span>
                            </div>
                            <input type="email" class="form-control" name="email" id="eml"
                                placeholder="Example@email.com">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success w-100">สมัคร</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>';
    }
?>

    <!-- Footer -->
    <footer class="sticky-footer bg-dark p-4 mt-4">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span class="text-white">Copyright &copy; Your Website 2019</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
    
    <!-- Datapicker function -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#datepicker").datepicker({
                dateFormat: 'dd/mm/yy',
                minDate: 0,
                lang:'th'  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
            });
        });
    </script>

    <!-- Check Value booking -->
    <script>
        var allSeats = 24;
        var seatChild;
        var seatAdult;
        var seatOlder;
        var seatTime;

    $(document).ready(function () {   
        $("#seatFrm").submit(function(e){
            // console.log($(this)
        seatTime = $('input[name=seatDetail]:checked').val();
        // console.log(seatTime);

                var date = $("#datepicker").val();

                if ($("#child").val().length == 0) {  
                    seatChild = 0;
                }else{
                    seatChild = $("#child").val();
                }
                if ($("#adult").val().length == 0) {  
                seatAdult = 0;
                }else{
                    seatAdult = $("#adult").val();
                }
                if ($("#older").val().length == 0) {  
                seatOlder = 0;
                }else{
                    seatOlder = $("#older").val();
                }

                var num_B = parseInt(seatChild) + parseInt(seatAdult) + parseInt(seatOlder);

            if(seatTime == "seatNormal"){
                if (num_B <= allSeats) {
                    $.ajax({
                        method: "POST",
                        url: 'dateBooking-inc.php',
                        data: $("#seatFrm").serialize(),
                        success: function(data){
                            console.log(data)
                        }
                    });
                        window.location = 'booking-time.php'; 
                } 
                if(num_B > allSeats) {
                    Swal.fire({
                        icon: 'error',
                        title: 'การจองที่นั่งไม่ถูกต้อง',
                        text: 'ที่นั่งทั้งหมดสามารถจองได้ไม่เกิน 24 ที่นั่ง กรุณาตวรจสอบข้อมูลให้ถูกต้อง',
                        confirmButtonText: 'ยืนยัน'
                    });            
                }
                if(num_B == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'การจองที่นั่งไม่ถูกต้อง',
                        text: 'กรุณากรอกจำนวนที่นั่ง',
                        confirmButtonText: 'ยืนยัน'
                    });            
                }
                if(num_B < 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'การจองที่นั่งไม่ถูกต้อง',
                        text: 'กรุณากรอกจำนวนที่นั่งให้ถูกต้อง',
                        confirmButtonText: 'ยืนยัน'
                    });            
                }
            }
            if($('input[name=seatDetail]:checked').length == 0){
                Swal.fire({
                        icon: 'error',
                        title: 'การจองที่นั่งไม่ถูกต้อง',
                        text: 'กรุณากรอกข้อมูลถูกต้อง',
                        confirmButtonText: 'ยืนยัน'
                    });
            }
            if(date == ""){
                Swal.fire({
                    icon: 'error',
                    title: 'การจองที่นั่งไม่ถูกต้อง',
                    text: 'กรุณากรอกข้อมูลวันที่ต้องการจอง',
                    confirmButtonText: 'ยืนยัน'
                });
            }
            if(seatTime == "seatAll"){
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
                                url: "dateBooking-inc.php",
                                data: $("#seatFrm").serialize(),
                                success: function(data){
                                    console.log(data)
                                }
                            });
                        window.location = 'statusDetail.php';
                    }
                });
            }
            e.preventDefault();
        });
    });
    </script>

<!-- Check username -->
    <script>
    $(document).ready(function () {
        $('#regisform').submit(function(e){
        var first = $("#first").val();
        var last = $("#last").val();
        var user = $("#user").val();
        var pass = $("#pass").val();
        var phone = $("#pnumber").val();
        var email = $("#eml").val();
        if(first == "" || last == "" || user == "" || pass == "" || phone == "" || email == ""){
            Swal.fire({
                icon: 'error',
                title: 'กรอกข้อมูลไม่ครบ',
                text: 'กรุณากรอกข้อมูลให้ถูกต้อง',
                confirmButtonText: 'ยืนยัน'
            });       
        }else{
        var url = "ckuser.php?username="+user+'&'+"email="+email;
            $.get(url, function(data){
                if(data == 2){
                    Swal.fire({
                        icon: 'success',
                        title: 'ยืนยันการสมัครสมาชิก',
                        confirmButtonText: 'ยืนยัน',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก',
                        reverseButtons: true
                        }).then((result) => {
                            if(result.value){
                                $.ajax({
                                    method: "POST",
                                    url: "register-inc.php",
                                    data: $("#regisform").serialize(),
                                    success: function(data){
                                        console.log(data)
                                    }
                                });
                            window.location = 'registersuccess.php';
                        }
                    });                 
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'username หรือ email มีผู้ใช้งานแล้ว',
                        confirmButtonText: 'ยืนยัน'
                    })               
                }
            });    
        }
        e.preventDefault();
        });
    });
    </script>

    <script type="text/javascript">
    function KeyCode(objId){
        //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode>=97 && event.keyCode <= 122))
        {
            return true;
        }else{
            Swal.fire({
                icon: 'error',
                title: 'กรอกได้แค่ a-z, A-Z, 0-9',
                confirmButtonText: 'ยืนยัน'
            });
            return false;
        }
    }
    </script>
    <script>
        //disabled selecter seatAll
        $(document).ready(function () {
            $('input[name=seatDetail]').click(function () {
                // e.preventDefault();
                type = $(this).data('type');
                if (type == 'all') {
                    $('.seatAll').attr('disabled', '');
                } else {
                    $('.seatAll').removeAttr('disabled');
                }
            });
        });
    </script>
</body>

</html>
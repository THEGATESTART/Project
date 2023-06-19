<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/ebb408c446.js" crossorigin="anonymous"></script>

    <title>Minibus Nan</title>

    <style>
        @import 'https://fonts.googleapis.com/css?family=Kanit|Prompt';

        /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */

        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Kanit', sans-serif;
        }

        #map {
            height: 500px;
            width: 100%;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Prompt', sans-serif;
        }

        .fa-vihara {
            color: #FFD700;
        }
        .fa-shopping-cart{
            color: #15E2FC;
        }
        .fa-store{
            color: #FF8C00;
        }
        .fa-landmark{
            color: #8B4513;
        }
        .fa-tree{
            color: #228B22;
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
            <div class="col-sm-12">
                <div class="card mt-4 mb-4 shadow-lg border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="ml-3">เส้นทางการเดินรถ</h3>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div id="map"></div>
                            </div>
                            <div class="col-sm-5">
                                <h4 class="mt-3">จุดที่รถรางผ่าน</h4>
                                <hr>
                                <div class="row ml-3 no-gutters">
                                    <div class="col-sm-1">
                                        <i class="fas fa-vihara fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-4">
                                        <h6>วัดภูมินทร์</h6>
                                    </div>
                                    <div class="col-sm-1">
                                        <i class="fas fa-vihara fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-6">
                                        <h6>วัดไผ่เหลือง</h6>
                                    </div>
                                </div>
                                <div class="row ml-3 no-gutters">
                                    <div class="col-sm-1">
                                        <i class="fas fa-vihara fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-4">
                                        <h6>วัดมิ่งเมือง</h6>
                                    </div>
                                    <div class="col-sm-1">
                                        <i class="fas fa-landmark fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-6">
                                        <h6>พิพิธภัณฑสถานแห่งชาติ น่าน</h6>
                                    </div>
                                </div>
                                <div class="row ml-3 no-gutters">
                                    <div class="col-sm-1">
                                        <i class="fas fa-vihara fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-4">
                                        <h6>วัดศรีพันต้น</h6>
                                    </div>
                                    <div class="col-sm-1">
                                        <i class="fas fa-vihara fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-6">
                                        <h6>วัดหัวข่วง</h6>
                                    </div>
                                </div>
                                <div class="row ml-3 no-gutters">
                                    <div class="col-sm-1">
                                        <i class="fas fa-vihara fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-4">
                                        <h6>วัดสวนตาล</h6>
                                    </div>
                                    <div class="col-sm-1">
                                        <i class="fas fa-shopping-cart fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-6">
                                        <h6>ตลาดโต้รุ่ง</h6>
                                    </div>
                                </div>
                                <div class="row ml-3 no-gutters">
                                    <div class="col-sm-1">
                                        <i class="fas fa-landmark fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-4">
                                        <h6>โฮงเจ้าพ่อฟองคำ</h6>
                                    </div>
                                    <div class="col-sm-1">
                                        <i class="fas fa-store fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-6">
                                        <h6>บุญช่วยเครื่องเงินโบราณ</h6>
                                    </div>
                                </div>
                                <div class="row ml-3 no-gutters">
                                    <div class="col-sm-1">
                                        <i class="fas fa-vihara fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-4">
                                        <h6>วัดหัวเวียงใต้</h6>
                                    </div>
                                    <div class="col-sm-1">
                                        <i class="fas fa-tree fa-lg"></i><i class="fas fa-tree fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-6">
                                        <h6>&nbsp;สวนสาธารณะศรีเมือง</h6>
                                    </div>
                                </div>
                                <div class="row ml-3 no-gutters">
                                    <div class="col-sm-1">
                                        <i class="fas fa-vihara fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-11">
                                        <h6>วัดพระธาตุช้างค้ำวรวิหาร</h6>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="mt-3">จุดที่รถรางจอด</h4>
                                <hr>
                                <div class="row ml-3 no-gutters">
                                    <div class="col-sm-1">
                                        <i class="fas fa-vihara fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-4">
                                        <h6>วัดศรีพันต้น</h6>
                                    </div>
                                    <div class="col-sm-1">
                                        <i class="fas fa-landmark fa-lg"></i>
                                    </div>
                                    <div class="mt-2 col-sm-6">
                                        <h6>โฮงเจ้าพ่อฟองคำ</h6>
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
        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 18.7831711,
                    lng: 100.7742961
                },
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE
                },
                zoom: 15
            });
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAREpTtRUIXf_IIWDvLf1GMsu7sJPPCxCo&callback=initMap">
    </script>
</body>

</html>
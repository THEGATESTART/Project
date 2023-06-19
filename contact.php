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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.17/dist/sweetalert2.all.min.js"></script>

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

    body {
        font-family: 'Kanit', sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5 {
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
                    <button type="submit" name="submit" class="btn btn-primary mr-2 mt-1" data-toggle="modal" data-target="#exampleModal2">เข้าสู่ระบบ</button>
                    <a href="" class="btn btn-success mt-1" data-toggle="modal" data-target="#exampleModal1">สมัครสมาชิก</a>
            </ul>
        </div>
    </nav>';
    }
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card mt-4 mb-2 shadow border-0">
                    <div class="card-header border-0 text-center">
                        <h1>ติดต่อ</h1>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-9">
                                <form id="conTactFrm" action="contact-inc.php" method="POST">
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-address-card-o fa-fw"></i></span>
                                                </div>
                                                <input type="text" class="form-control first_name" name="first_name"
                                                    id="first_name" placeholder="ชื่อ..." required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-address-card-o fa-fw"></i></span>
                                                </div>
                                                <input type="text" class="form-control last_name" name="last_name" id="last_name"
                                                    placeholder="นามสกุล..." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fa fa-envelope fa-fw"></i></span>
                                                </div>
                                                <input type="email" class="form-control email" name="email" id="email"
                                                    placeholder="Example@email.com" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-header fa-fw"></i></span>
                                                </div>
                                                <input type="text" class="form-control subject" name="subject" id="subject"
                                                    placeholder="ข้อข้อ/เรื่อง..." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-comments fa-fw"></i></span>
                                                </div>
                                                <textarea type="message" class="form-control Message" name="Message"
                                                    id="Message" placeholder="ข้อความ..." required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-9"></div>
                                        <div class="col-sm-3">
                                            <input type="submit"
                                                class="btn btn-success float-right" value="ส่งข้อความ">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card mt-4 mb-2 shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <div id="map"></div>
                            </div>
                            <div class="col-sm-5">
                                <h4>ศูนย์บริการนักท่องเที่ยว จ.น่าน</h4>
                               <hr>
                               <div class="ml-3 no-gutters">
                                   <p><i class="fas fa-home fa-lg"></i>&nbsp;&nbsp;ที่อยู่ 46/1, ถนนผากอง, ตำบลในเวียง อำเภอเมือง จังหวัดน่าน, 55000</p>
                                   <p><i class="fas fa-phone-alt fa-lg"></i>&nbsp;&nbsp;เบอร์โทรติดต่อ  054 775 169</p>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-dark p-4 mt-4">
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
                    lat: 18.7750483,
                    lng: 100.7719093
                },
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE
                },
                zoom: 18
            });
        }
    </script>
    <script>
        $("#conTactFrm").submit(function(e){

            var fName = $('.first_name').val();
            var lName = $('.last_name').val();
            var email = $('.email').val();
            var subJect = $('.subject').val();
            var mes = $('.Message').val();

            if((fName && lName) && (email && subJect) && mes != ''){
                Swal.fire({
                    icon: 'success',
                    title: 'ยืนยันการส่งข้อความ',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก',
                    reverseButtons: true
                    }).then((result) => {
                        if(result.value){
                            window.location = 'index.php';
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "contact-inc.php",
                    data: $("#conTactFrm").serialize(),
                    success: function(data){
                        // alert(data);
                        console.log(data)
                    }
                });
            }
            e.preventDefault();
        });
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAREpTtRUIXf_IIWDvLf1GMsu7sJPPCxCo&callback=initMap">
    </script>
</body>

</html>
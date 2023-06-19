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

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
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
            <div class="col-sm-10">
                <div class="card mt-4 mb-4 shadow-lg border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div><h2>ข้อมูลบัญชีผู้ใช้งาน</h2></div>
                                <hr>
                            </div>
                        </div>
                        <?php
                        include 'connect.php';

                        $uid =  $_SESSION['u_id'];
                        $sql = "SELECT * FROM user_db  where user_db.user_id='$uid'";
                        $result = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_array($result)){
                            $date = str_replace('/', '-', $row["date_regis"]);
                            $newtime = date('d/m/Y H:i:s', strtotime($date));
                        echo '<div class="row">
                            <div class="col-6">';
                                echo "<h4><p><i class='far fa-address-card'></i> ชื่อ:&nbsp;".$row['first_name']." </p></h4>
                            </div>
                            <div class='col-6'>";
                                echo "<h4><p><i class='far fa-address-card'></i> นามสกุล:&nbsp;".$row['last_name']."</p></h4>
                            </div>
                        </div>";
                        echo "<div class='row'>
                            <div class='col-6'>
                                <h4><p><i class='fas fa-user'></i> ชื่อผู้ใช้งาน: &nbsp;".$row['username']."</p></h4>
                            </div>";
                            echo "<div class='col-5'>
                                <h4><p><i class='far fa-envelope'></i> อีเมล์: &nbsp;".$row['email']."</p></h4>
                            </div>
                        </div> ";
                        echo "<div class='row'>
                        <div class='col-6'>
                            <h4><p><i class='fas fa-phone'></i> เบอร์โทรศัพท์: &nbsp;".$row['phone']."</p></h4>
                        </div>
                        <div class='col-6'>
                            <h4><p><i class='far fa-calendar-alt'></i> สมัครสมาชิก: &nbsp;".$newtime."</p></h4>
                        </div>
                    </div>";
                        }
                        ?>
                        <hr>
                        <div class="row">
                            <div class="col-10"></div>
                                <div class="col-2">
                                    <button class="btn btn-warning shadow w-100" data-toggle="modal" data-target="#exampleModal">
                                        <i class="far fa-edit"></i> แก้ไข</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update user -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateFrm" action="updateProfiles.php" method="post">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-dark p-4 mt-4 fixed-bottom">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span class="text-white">Copyright &copy; Your Website 2019</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <script>
        $(document).ready(function () {
            $("#updateFrm").submit(function(e){
                var efirst = $("#first").val();
                var elast = $("#last").val();
                var ephone = $("#pnumber").val();
                var email = $("#eml").val();

                if(efirst == "" || elast == "" || ephone == "" || email == ""){
                    Swal.fire({
                        icon: 'error',
                        title: 'กรอกข้อมูลไม่ครบ',
                        text: 'กรุณากรอกข้อมูลให้ถูกต้อง',
                        confirmButtonText: 'ยืนยัน'
                    });
                }else{
                    var url = "ckemail.php?email="+email;
                    $.get(url, function(data){
                        if(data == 2){
                            Swal.fire({
                                icon: 'success',
                                title: 'ยืนยันการเปลี่ยนแปลงข้อมูล',
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
                                            url: "updateprofiles.php",
                                            data: $("#updateFrm").serialize(),
                                            success: function(data){
                                                console.log(data)
                                            }
                                        });     
                                    window.location = 'profiles.php';
                                }
                            });            
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'email มีผู้ใช้งานแล้ว',
                                confirmButtonText: 'ยืนยัน'
                            })               
                        }
                    });    
                }
                e.preventDefault();
            });
        });
    </script>

</body>

</html>

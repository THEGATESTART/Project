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
        <script src="https://kit.fontawesome.com/ebb408c446.js" crossorigin="anonymous"></script>

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
                        <a class="dropdown-item" href="login.html">Logout</a>
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
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                                    </div>
                                </nav>
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
                    <div class="container-fluid mt-3 mb-3">
                    <div class="row justify-content-center mb-3">
                            <div class="col-sm-10">
                                <div class="card border-0">
                                    <div class="card card-body">
                                        <div class="card-header bg-white"><h2>ข้อมูลสมาชิก</h2></div>
                                        <?php
                                        include 'connect.php';

                                        $sql = "SELECT * FROM user_db  where user_db.user_id='{$_SESSION['uid']}'";
                                        $result = mysqli_query($con, $sql);
                                        while($row = mysqli_fetch_array($result)){
                                        echo '<div class="row mt-2">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <div class="input-group input-group-lg">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-address-card fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" value='.$row['first_name'].' readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-address-card fa-fw"></i></span>
                                                    </div>
                                                        <input type="text" class="form-control" value='.$row['last_name'].' readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <div class="mb-3">
                                                <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone fa-fw"></i></span>
                                                    </div>
                                                        <input type="tel" class="form-control" value='.$row['phone'].' readonly>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="mb-3">
                                                <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope fa-fw"></i></span>
                                                    </div>
                                                        <input type="email" class="form-control" value='.$row['email'].' readonly>
                                                </div>
                                            </div>
                                            </div>
                                        </div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-10">
                                <div class="card border-0">
                                    <div class="card card-body">
                                        <div class="card-header bg-white"><h2>แก้ไขข้อมูลสมาชิก</h2></div>
                                        <form id="updateFrm" action="saveprofile.php" method="post">
                                        <input type="hidden" name="user_id" id="user_id"
                                                value="<?php echo $_REQUEST['user_id'];
                                                        $_SESSION['uid'] = $_REQUEST['user_id']; ?>">
                                        <div class="row mt-2">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <div class="input-group input-group-lg">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-address-card fa-fw"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="first_name" id="first" placeholder="ชื่อ...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-address-card fa-fw"></i></span>
                                                    </div>
                                                        <input type="text" class="form-control" name="last_name" id="last" placeholder="นามสกุล...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                            <div class="mb-3">
                                                <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone fa-fw"></i></span>
                                                    </div>
                                                        <input type="tel" class="form-control" name="phone" id="pnumber" maxlength="10" placeholder="0997894561">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="mb-3">
                                                <div class="input-group input-group-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope fa-fw"></i></span>
                                                    </div>
                                                        <input type="email" class="form-control" name="email" id="eml"
                                                            placeholder="Example@email.com">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6"></div>
                                            <div class="col-sm-3">
                                                <a href="user.php" class="btn btn-outline-secondary w-100">ย้อนกลับ</a>
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-success w-100">บันทึก</button>
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>

        <script>
            $(document).ready(function () {
                $('#updateFrm').submit(function(e){
                    var first = $('#first').val();
                    var last = $('#last').val();
                    var number = $('#pnumber').val();
                    var email = $('#eml').val();

                    if(first == "" || last == "" || number == "" || email == ""){
                        Swal.fire({
                            icon: 'error',
                            title: 'กรุณากรอกข้อมูลให้ครบ',
                            confirmButtonText: 'ยืนยัน'
                        });
                    }else{
                        var url = "ckemail.php?email="+email;
                    $.get(url, function(data){
                        if(data == 2){
                            Swal.fire({
                                icon: 'success',
                                title: 'ยืนยันการบันทึกข้อมูล',
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
                                            url: "saveprofile.php",
                                            data: $("#updateFrm").serialize(),
                                            success: function(data){
                                                console.log(data)
                                            }
                                        });
                                        window.location = 'editprofile.php';     
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

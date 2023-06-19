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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.17/dist/sweetalert2.all.min.js"></script>
        <style>
            div.dataTables_length {
            margin-bottom: 1em;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">รถรางน่าน</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
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
                                Dashboard</a
                            >
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
                    <div class="container-fluid">
                        <div class="row">
        <?php 
        include 'connect.php';

        $sql = "SELECT booking.*, first_name, last_name, GROUP_CONCAT(seat_detail) FROM booking inner join user_db
              ON user_db.user_id=booking.user_id INNER JOIN seatdetail ON seatdetail.booking_id=booking.booking_id GROUP BY booking_id";
              $result = mysqli_query($con, $sql);
        ?>
      <div class="container-fluid">
      <div class="mt-4"></div>
      <div class="table-responsive">
        <table id="dataTable" class="table table-hover row-border display" style="width:100%">
          <thead>
            <tr>
                <th>เลขที่</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ประเภท</th>
                <th>วันที่จอง</th>
                <th>จำนวน</th>
                <th>เวลา</th>
                <th>ที่นั่ง</th>
                <th>เด็ก</th>
                <th>ผู้ใหญ่</th>
                <th>ผู้สูงอายุ</th>
                <th>ราคา</th>
                <th>สลิป</th>
                <th>สถานะ</th>
                <th>ตรวจตั๋ว</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
          <?php 
            function DateThai($strDate){
                $strYear = date("Y",strtotime($strDate));
                $strMonth= date("n",strtotime($strDate));
                $strDay= date("j",strtotime($strDate));
                $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                $strMonthThai=$strMonthCut[$strMonth];
                return "$strDay $strMonthThai $strYear";
            }
            while($row = mysqli_fetch_array($result)){
                $newdate = $row['date_booking'];
                $date = str_replace('/', '-', $newdate);
                $newtime = date('Y-m-d', strtotime($date));
                $strDate = $newtime;
                echo '<tr>';
                    echo "<td>".$row['booking_id']."</td>
                        <td>".$row['first_name']."</td>
                        <td>".$row['last_name']."</td>
                        <td>".$row['booking_type']."</td>
                        <td>".DateThai($strDate)."</td>
                        <td>".$row['seat_total']."</td>
                        <td>".$row['time_booking']."</td>
                        <td>".$row['GROUP_CONCAT(seat_detail)']."</td>
                        <td>".$row['child_seat']."</td>
                        <td>".$row['adult_seat']."</td>
                        <td>".$row['old_seat']."</td>
                        <td>".$row['seat_price']."</td>";
                    if($row['slip_pic'] != ''){
                    echo "<td><img src='../../bookingpic/".$row['slip_pic']."' height='80' style='cursor: pointer;' data-toggle='modal' data-target='#exampleModal9'></td>
                        <div class='modal' id='exampleModal9' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                              <div class='modal-content'>
                                <div class='modal-header'>
                                  <h5 class='modal-title' id='exampleModalLabel'>หลักฐานการโอน</h5>
                                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                  </button>
                                </div>
                                <div class='modal-body'>
                                  <center><img src='../../bookingpic/".$row['slip_pic']."' height='500'></center>
                                </div>
                              </div>
                            </div>
                          </div>";
                        }else{
                          echo "<td></td>";
                        }
                        echo '<td>';
                        if($row['status_book'] == 0 && $row['slip_pic'] == null){
                              echo "<a href='admin-inc.php?action=changestatus&booking_id=".$row['booking_id']."&&"."status_id=".$row['status_book']."&&"."slip_pic=".$row['slip_pic']."' class='btn btn-danger noPass'>ยังไม่ได้ชำระ</a>";
                        }elseif($row['status_book'] == 0 && $row['slip_pic'] != ""){
                              echo "<a href='admin-inc.php?action=changestatus&booking_id=".$row['booking_id']."&&"."status_id=".$row['status_book']."&&"."slip_pic=".$row['slip_pic']."' class='btn btn-warning pass'>รอตรวจสอบ</a>";
                        }elseif($row['status_book'] == 1){
                                echo "<a href='admin-inc.php?action=changestatus&booking_id=".$row['booking_id']."&&"."status_id=".$row['status_book']."&&"."slip_pic=".$row['slip_pic']."' class='btn btn-success pass'>ชำระเรียบร้อย</a>";
                        }
                    echo "</td>";
                    ?>
                    <td>
                    <?php
                        if($row['chkTicket'] != ""){
                            echo '<a class="btn btn-success text-white">'.$row["chkTicket"].'</a>';
                        }else{
                            echo "";
                        }
                    ?>
                    </td>
                    <td><button class="btn btn-danger delete" id="<?php echo $row['booking_id']; ?>">
                    <i class="fas fa-trash-alt"></i></button></td>
                    <?php
                    echo '</tr>';
            }
            ?>
        </tbody>
        </table>
        </div>
      </div>
                <footer class="py-4 bg-light mt-auto">
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
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<!-- Confirm delete user -->
    <script>
        $(".delete").click(function () {

            var uid = $(this);

            if(confirm("คุณแน่ใจหรือว่าต้องการลบข้อมูล")) {
                $.ajax({
                    url: 'deletebooking.php',
                    method: "POST",
                    data: {
                        id: uid.attr("id")
                    },
                    success: function (response) {
                        console.log(response)
                        window.location.reload();
                    }
                });
            }
        });
    </script>

<!-- Call the dataTables jQuery plugin -->
    <script>
    $(document).ready(function() {
    $('#dataTable').DataTable({
        dom: 'lBfrtip',
        order: [ 0, "desc" ],
        buttons: [
            'excel', 'print'
            ],
        lengthMenu: [
            [ 10, 25, 50, 100],
            [ '10', '25', '50', '100']
            ],
    });
    });
    </script>
    </body>
</html>

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
            <div class="col-sm-12">
                <div class="card mt-4 mb-4 shadow-lg border-0">
                    <div class="card-body">
                        <form action="bookingDetail-inc.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="ml-3">สถานะการจอง</h3>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#Soon">เร็วๆ นี้</a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#Ago">ที่ผ่านมา</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <?php

                        include 'connect.php';

                        $user_id = $_SESSION['u_id'];

                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                          }else{
                            $page = 1;
                          }
            
                          $num_page = 4;
                          $startFrom = ($page - 1) * $num_page;

                        $sql = "SELECT * FROM booking inner join user_tb on user_tb.userID = booking.userID where 
                            booking.userID='$user_id' order by bookingID desc LIMIT $startFrom, $num_page";
                        $result = mysqli_query($con, $sql);

                        while($row = mysqli_fetch_array($result)){
                           echo '<div class="row justify-content-center">';
                                echo '<div class="col-sm-12">';
                                    echo '<div class="card border-0">';
                                        echo '<div class="card-body">';
                                        
                                            echo '<div class="row">';
                                                echo '<div class="col-sm-6">';
                                                    
                                                    echo '<div class="tab-content">';
                                                        echo '<div id="Soon" class="container tab-pane active">';
                                                            echo '<div class="card">';
                                                                echo '<div class="card-header bg-white">';
                                                                    echo '<h4>จองตั๋วล่าสุด...</h4>';
                                                                echo '</div>';
                                                                echo '<div class="card card-body">';
                                                                    echo '<div class="row">';
                                                                        echo '<div class="col-5">';
                                                                            echo "<h5>BOOKING_ID ".$row['bookingID'] ."</h5>";
                                                                        echo '</div>';
                                                                        echo '<div class="col-7">';
                                                                            if($row['statusBook'] == 0 && $row['slipPic'] == null){
                                                                                echo '<div class="col-sm-12">
                                                                                <input class="btn btn-danger rounded-pill w-100 p-3" value="ยังไม่ได้ชำระ" readonly>
                                                                                </div>
                                                                                <h6 class="mt-2 ml-3" style="color: red;">(ชำระค่าบริการภาย 48 ชั่วโมง)</h6>';
                                                                                }elseif($row['slipPic'] != "" && $row['statusBook'] == 0){
                                                                                    echo '<div class="col-sm-12">
                                                                                    <input class="btn btn-warning rounded-pill w-100 p-3" value="รอการตรวจสอบ" readonly>
                                                                                </div>
                                                                                <h6 class="mt-2 ml-4" style="color: red;">(รอการตรวจสอบ 12 ชั่วโมง)</h6>';
                                                                                }elseif($row['statusBook'] == 1){
                                                                                    echo '<div class="col-sm-12">
                                                                                    <input class="btn btn-success rounded-pill w-100 p-3" value="ชำระเรียบร้อย" readonly>
                                                                                </div>';
                                                                                }
                                                                        echo '</div>';
                                                                    echo '</div>';
                                                                    echo '<div class="row">';
                                                                            echo '<div class="col-sm-12">';
                                                                                echo "<label for='book'>ผู้จอง: </label>";
                                                                                echo "<p id='book' style='background-color: #E2FFF8;' class='p-2 rounded'>".$row['firstName']."&nbsp;".$row['lastName']."</p>";
                                                                            echo '</div>';
                                                                    echo '</div>';
                                                                    echo '<div class="row">';
                                                                            echo '<div class="col-6">';
                                                                                echo "<label for='type'>ประเภทการจอง: </label>";
                                                                                echo "<p id='type' style='background-color: #E2FFF8;' class='p-2 rounded'>".$row['bookType']."</p>";
                                                                            echo '</div>';
                                                                            echo '<div class="col-6">';
                                                                                echo "<label for='bookingDate'>วันที่จอง: </label>";
                                                                                echo "<p id='bookingDate' style='background-color: #E2FFF8;' class='p-2 rounded'>".$row['bookDate']."</p>";
                                                                            echo '</div>';
                                                                    echo '</div>';
                                                                echo '</div>';
                                                                echo '<div class="card-footer">';
                                                                if($row['bookType'] == 'จองตั๋วแบบปกติ'){
                                                                    echo "<a href='bookingDetail.php?statusBook=".$row['statusBook']."&&"."bookingID=".$row['bookingID']."'
                                                                        class='btn btn-outline-primary mr-2 mb-1'>รายละเอียด</a>";
                                                                    echo "<a href='sendSlip.php?booking_id=".$row['booking_id']."' 
                                                                        class='btn btn-primary mr-2 mb-1'>แจ้งการโอน</a>";
                                                                    }
                                                                if($row['bookType'] == 'จองตั๋วแบบเหมา'){
                                                                    echo "<a href='bookingDetails.php?statusBook=".$row['statusBook']."&&"."bookingID=".$row['bookingID']."'
                                                                        class='btn btn-outline-primary mr-2 mb-1'>รายละเอียด</a>";
                                                                    echo "<a href='sendSlipAll.php?booking_id=".$row['bookingID']."' 
                                                                        class='btn btn-primary mr-2 mb-1'>แจ้งการโอน</a>";
                                                                    }
                                                                echo '</div>';
                                                            echo '</div>';
                                                        echo '</div>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo'</div>';
                                    echo'</div>';
                                echo'</div>';
                            echo'</div>';
                            }
                            ?>
                        </form>
                        <?php 
                            $sql1 = "SELECT * FROM booking inner join user_tb on user_tb.userID = booking.userID where 
                            booking.userID='$user_id'";
                            $pr_result = mysqli_query($con, $sql1);
                            $totalrecord = mysqli_num_rows($pr_result);
                            $totalpages = ceil($totalrecord/$num_page);
                            $prav = $page - 1;
                            $next = $page + 1;
                        ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end mt-3">
                            <li <?php if($page == 1) echo 'class="page-item disabled"';?>>
                                <a class="page-link" href="statusDetail.php?page=<?php echo $prav ?>" tabindex="-1">Previous</a>
                            </li>
                            <?php for($i = 1; $i <= $totalpages; $i++){
                            echo '<li class="page-item"><a class="page-link" href="statusDetail.php?page='.$i.'">'.$i.'</a></li>';
                                }?>
                            <li <?php if($page == $totalpages) echo 'class="page-item disabled"';?>>
                                <a class="page-link" href="statusDetail.php?page=<?php echo $next ?>">Next</a>
                            </li>
                            </ul>
                        </nav>
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

</body>

</html>
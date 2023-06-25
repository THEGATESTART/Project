<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

    include 'connect.php';
 
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $booking_id = $_REQUEST["booking_id"];
    $sql = "SELECT booking.*, firstName, lastName, emailTxt, phoneNumber, GROUP_CONCAT(seatNumber) FROM booking inner join user_tb on user_tb.userID=booking.userID 
    inner join seatdetail on seatdetail.bookingID=booking.bookingID where booking.bookingID='$booking_id'";
    $result = mysqli_query($con, $sql);
    $content1 = "";
    $content2 = "";
    $content3 = "";
    $content4 = "";

        while($row = mysqli_fetch_array($result)) {
            $childPrice = 15;
            $adultPrice = 30;
            $oldPrice = 15;
            $allseat = $row['childSeat'] + $row['adultSeat'] + $row['oldSeat'];

            $content1 .= '<tr>
                <th scope="row" style="text-align:left;" width="25%">เด็ก</th>
                <td style="text-align:center;">'.$row['childSeat'].'</td>
                <td style="text-align:center;">15</td>
                <td style="text-align:center;">'.$row['childSeat'] * $childPrice.'</td>
            </tr>';
            $content2 .= '<tr>
                <th scope="row" style="text-align:left;" width="25%">ผู้ใหญ่</th>
                <td style="text-align:center;">'.$row['adultSeat'].'</td>
                <td style="text-align:center;">30</td>
                <td style="text-align:center;">'.$row['adultSeat'] * $adultPrice.'</td>
            </tr>';
            $content3 .= '<tr>
                <th scope="row" style="text-align:left;" width="25%">ผู้สูงอายุ</th>
                <td style="text-align:center;">'.$row['oldSeat'].'</td>
                <td style="text-align:center;">15</td>
                <td style="text-align:center;">'.$row['oldSeat'] * $oldPrice.'</td>
            </tr>';
            $content4 .= '<tr>
                <th scope="row" style="text-align:left;" width="25%">ยอดรวมทั้งหมด:</th>
                <td style="text-align:center;">'.$allseat.'</td>
                <td style="text-align:center;"></td>
                <td style="text-align:center;">'.$row['seatPrice'].'&nbsp;บาท</td>
            </tr>';
        }
    
    // mysqli_close($con);
    
$mpdf = new \Mpdf\Mpdf();

$sql1 = "SELECT booking.*, firstName, lastName, emailTxt, phoneNumber, GROUP_CONCAT(seatNumber) FROM booking inner join user_tb on user_tb.userID=booking.userID 
    inner join seatdetail on seatdetail.bookingID=booking.bookingID where booking.bookingID='$booking_id'";
$result1 = mysqli_query($con, $sql1);

while($row = mysqli_fetch_array($result1)) {

$head = "
<style>
    body{
        font-family: 'Garuda';//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
    }
</style>
 
<h2 style='text-align:center'>ตั๋วจองรถ</h2>
<table id='bg-table' width='100%' style='border-collapse: collapse; font-size:12pt; margin-top:8px;'>
    <tbody>
        <tr>
            <td style='text-align:left;'>ผู้จอง: ".$row['firstName']."&nbsp;".$row['lastName']."</td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>Booking_id: ".$row['bookingID']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'>เบอร์ติดต่อ: ".$row['phoneNumber']."</td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>วันที่จอง: ".$row['bookDate']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'>อีเมล์: ".$row['emailTxt']."</td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>รูปแบบการจอง: ".$row['bookType']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'></td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>เวลา: ".$row['timeBooking']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'></td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>ตำแหน่งที่นั่ง: ".$row['GROUP_CONCAT(seatNumber)']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'></td>";
            if($row['statusBook'] == 0){
                $row['statusBook'] = 'ยังไม่ได้ชำระ';
                $head .= "<td style='text-align:center; color:red;'>สถานะการจอง: ".$row['statusBook']."</td>";
            }elseif($row['statusBook'] == 1){
                $row['statusBook'] = "ชำระเรียบร้อย";
                $head .= "<td style='text-align:center; color:green;'>สถานะการจอง: ".$row['statusBook']."</td>";
            }
            $head .= " <td style='text-align:right;'></td>
        </tr>
        <tr>
            <td style='text-align:left;'></td>
            <td style='text-align:center;'><img class='mt-2 mb-2' src='bookingpic/".$row['slipPic']."' height='300'></td>
            <td style='text-align:right;'></td>
        </tr>
    </tbody>
</table>
 
<table id='bg-table' width='100%' style='border-collapse: collapse; font-size:12pt; margin-top:8px;'>
    <tr>
        <th  scope='row'></td>
        <th  style='text-align:center;'>จำนวนที่นั่ง</td>
        <th  style='text-align:center;'>ราคา</td>
        <th  style='text-align:center;'>ยอดรวม</td>
    </tr>
</thead>
    <tbody>";
}
$end = "</tbody>
</table>";
 
$mpdf->WriteHTML($head);
$mpdf->WriteHTML($content1);
$mpdf->WriteHTML($content2);
$mpdf->WriteHTML($content3);
$mpdf->WriteHTML($content4);
$mpdf->WriteHTML($end);
$mpdf->Output();
?>
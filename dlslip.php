<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

    include 'connect.php';
 
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $booking_id = $_REQUEST["booking_id"];
    $sql = "SELECT booking.*, first_name, last_name, email, phone, GROUP_CONCAT(seat_detail) FROM booking inner join user_db on user_db.user_id=booking.user_id 
    inner join seatdetail on seatdetail.booking_id=booking.booking_id where booking.booking_id='$booking_id'";
    $result = mysqli_query($con, $sql);
    $content1 = "";
    $content2 = "";
    $content3 = "";
    $content4 = "";

        while($row = mysqli_fetch_array($result)) {
            $childPrice = 15;
            $adultPrice = 30;
            $oldPrice = 15;
            $allseat = $row['child_seat'] + $row['adult_seat'] + $row['old_seat'];

            $content1 .= '<tr>
                <th scope="row" style="text-align:left;" width="25%">เด็ก</th>
                <td style="text-align:center;">'.$row['child_seat'].'</td>
                <td style="text-align:center;">15</td>
                <td style="text-align:center;">'.$row['child_seat'] * $childPrice.'</td>
            </tr>';
            $content2 .= '<tr>
                <th scope="row" style="text-align:left;" width="25%">ผู้ใหญ่</th>
                <td style="text-align:center;">'.$row['adult_seat'].'</td>
                <td style="text-align:center;">30</td>
                <td style="text-align:center;">'.$row['adult_seat'] * $adultPrice.'</td>
            </tr>';
            $content3 .= '<tr>
                <th scope="row" style="text-align:left;" width="25%">ผู้สูงอายุ</th>
                <td style="text-align:center;">'.$row['old_seat'].'</td>
                <td style="text-align:center;">15</td>
                <td style="text-align:center;">'.$row['old_seat'] * $oldPrice.'</td>
            </tr>';
            $content4 .= '<tr>
                <th scope="row" style="text-align:left;" width="25%">ยอดรวมทั้งหมด:</th>
                <td style="text-align:center;">'.$allseat.'</td>
                <td style="text-align:center;"></td>
                <td style="text-align:center;">'.$row['seat_price'].'&nbsp;บาท</td>
            </tr>';
        }
    
    mysqli_close($conn);
    
$mpdf = new \Mpdf\Mpdf();

$sql1 = "SELECT booking.*, first_name, last_name, email, phone, GROUP_CONCAT(seat_detail) FROM booking inner join user_db on user_db.user_id=booking.user_id 
    inner join seatdetail on seatdetail.booking_id=booking.booking_id where booking.booking_id='$booking_id'";
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
            <td style='text-align:left;'>ผู้จอง: ".$row['first_name']."&nbsp;".$row['last_name']."</td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>Booking_id: ".$row['booking_id']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'>เบอร์ติดต่อ: ".$row['phone']."</td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>วันที่จอง: ".$row['date_booking']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'>อีเมล์: ".$row['email']."</td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>รูปแบบการจอง: ".$row['booking_type']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'></td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>เวลา: ".$row['time_booking']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'></td>
            <td style='text-align:center;'></td>
            <td style='text-align:right;'>ตำแหน่งที่นั่ง: ".$row['GROUP_CONCAT(seat_detail)']."</td>
        </tr>
        <tr>
            <td style='text-align:left;'></td>";
            if($row['status_book'] == 0){
                $row['status_book'] = 'ยังไม่ได้ชำระ';
                $head .= "<td style='text-align:center; color:red;'>สถานะการจอง: ".$row['status_book']."</td>";
            }elseif($row['status_book'] == 1){
                $row['status_book'] = "ชำระเรียบร้อย";
                $head .= "<td style='text-align:center; color:green;'>สถานะการจอง: ".$row['status_book']."</td>";
            }
            $head .= " <td style='text-align:right;'></td>
        </tr>
        <tr>
            <td style='text-align:left;'></td>
            <td style='text-align:center;'><img class='mt-2 mb-2' src='bookingpic/".$row['slip_pic']."' height='300'></td>
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
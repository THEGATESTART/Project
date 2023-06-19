<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

    include 'connect.php';
 
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $booking_id = $_REQUEST['booking_id'];
    
$mpdf = new \Mpdf\Mpdf();

$sql = "SELECT * FROM booking inner join user_db on user_db.user_id = booking.user_id where booking.booking_id='$booking_id' order by booking_id";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)) {

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
            <td style='text-align:right;'>ราคารถเหมาทั้งคัน: ".$row['seat_price']."&nbsp;บาท</td>
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
</thead>
    <tbody>";
}
$end = "</tbody>
</table>";
 
$mpdf->WriteHTML($head);
$mpdf->WriteHTML($end);
$mpdf->Output();
?>
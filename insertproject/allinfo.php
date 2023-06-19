<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="link">
            <a href="add.php">เพิ่มข้อมูล</a><br><br>
            <a href="allinfo.php">ข้อมูลทั้งหมด</a><br>
            <a href="formen.php">เฉพาะเพศชาย</a><br>
            <a href="forwomen.php">เฉพาะเพศหญิง</a><br><br>
            <p>ชาย</p>
            <a href="menless.php">น้ำหนัก ไม่เกิน 50</a><br>
            <a href="menmore.php">น้ำหนัก 51-90</a><br><br>
            <p>หญิง</p>
            <a href="womenless.php">น้ำหนัก ไม่เกิน 50</a><br>
            <a href="womenmore.php">น้ำหนัก 51-90</a><br>
        </div>
        <div class="formInsert">
            <h1>ข้อมูลทั้งหมด</h1>
            <table>
                <tr>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>อายุ</th>
                    <th>เพศ</th>
                    <th>น้ำหนัก</th>
                    <th>ส่วนสูง</th>
                </tr>
                <?php while ($obj_row = mysqli_fetch_array($obj_rs)) { ?>
                <tr>
                    <td><?= $obj_row['cust_name'] ?></td>
                    <td><?= $obj_row['cust_lname'] ?></td>
                    <td><?= $obj_row['cust_age'] ?></td>
                    <td><?= $obj_row['cust_gender'] ?></td>
                    <td><?= $obj_row['cust_weight'] ?></td>
                    <td><?= $obj_row['cust_height'] ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    
</body>
</html>
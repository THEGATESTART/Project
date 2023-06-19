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
        <form action="r_add.php" method="POST" class="formInsert">
            <h1>เพิ่มข้อมูล</h1>
                <div class="labelText">
                    <p class="labelSize">ชื่อ</p>
                    <p class="labelSize">นามสกุล</p>
                    <p class="labelSize">อายุ</p>
                    <p class="labelSize">เพศ</p>
                    <p class="labelSize">น้ำหนัก</p>
                    <p class="labelSize">ส่วนสูง</p>
                </div>
                <div class="inputText">
                    <input type="text" name="name"><br>
                    <input type="text" name="lname"><br>
                    <input type="text" name="age"><br>
                    <input type="text" name="gender"><br>
                    <input type="text" name="weight"><br>
                    <input type="text" name="height"><br>
                    <input type="submit" name="btnSave" class="submit">
                </div>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>
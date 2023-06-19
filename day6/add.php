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
        <form action="r_add.php" method="POST" class="formInsert" enctype="multipart/form-data">
            <h1>เพิ่มข้อมูล</h1>
                <div class="labelText">
                    <p class="labelSize">ชื่อ</p>
                    <p class="labelSize">นามสกุล</p>
                    <p class="labelSize">อายุ</p>
                    <p class="labelSize">รูปภาพ</p>
                </div>
                <div class="inputText">
                    <input type="text" name="name"><br>
                    <input type="text" name="lname"><br>
                    <input type="text" name="age"><br>
                    <input type="file" name="fiupload"><br>
                    <input type="submit" name="btnSave" class="submit">
                </div>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>
<?php include 'connect.php'; ?>
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
        <form action="addtotb.php" method="POST" class="formInsert" enctype="multipart/form-data">
            <h1>เพิ่มข้อมูล</h1>
                <div class="labelText">
                    <p class="labelSize">ชื่อสินค้า</p>
                    <p class="labelSize">รายละเอียด</p>
                    <p class="labelSize">ราคา</p>
                    <p class="labelSize">รูปภาพ</p>
                </div>
                <div class="inputText">
                    <input type="text" name="productname"><br>
                    <input type="text" name="detail"><br>
                    <input type="text" name="price"><br>
                    <input type="file" name="imgupload"><br>
                    <input type="submit" name="btnSave" class="submit">
                </div>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>
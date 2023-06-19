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
        <form action="r_add.php" method="POST" class="formInsert">
            <table>
                <tr>
                    <td>ชื่อ</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>นามสกุล</td>
                    <td><input type="text" name="lname"></td>
                </tr>
                <tr>
                    <td>อายุ</td>
                    <td><input type="text" name="age"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnSave" class="submit"></td>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>
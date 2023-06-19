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
    <table class="container">
        <tr>
            <th>ชื่อสถานที่</th>
            <th>ประเภท</th>
            <th>ภาค / จังหวัด</th>
            <th>Lat</th>
            <th>Long</th>
        </tr>
        <?php while ($obj_row = mysqli_fetch_array($obj_rs)) { ?>
            <tr>
                <td><?= $obj_row['placename'] ?></td>
                <td><?= $obj_row['type'] ?></td>
                <td><?= $obj_row['zone'].'/'.$obj_row['province'] ?></td>
                <td><?= $obj_row['latitude'] ?></td>
                <td><?= $obj_row['longitude'] ?></td>
            </tr>
        <?php } ?>
    </table>
    
</body>
</html>
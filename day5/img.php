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
        <?php while ($obj_row = mysqli_fetch_array($obj_rs)) { ?>
            <div class="travelImg">
                <img src="img/<?= $obj_row['tra_img'] ?>" alt="">
            </div>
        <?php } ?>
    </div>
    
</body>
</html>
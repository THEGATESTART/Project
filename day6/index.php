<?php include 'database.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>Show Img</title>
</head>
<body>
    <div class="container">
        <?php while ($obj_row = mysqli_fetch_array($obj_rs)) { ?>
        <div class="imgLink">
            <a href="detail.php?id=<?=$obj_row['user_id'] ?>">
                <img src="img/<?=$obj_row['user_img'] ?>" alt="">
                <h4><?=$obj_row['user_name'] ?></h4>
            </a>
        </div>
        <?php } ?>
        <div class="clear"></div>
    </div>
</body>
</html>
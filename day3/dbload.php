<?php
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "travelwebsite";

    $obj_con = mysqli_connect($hostName, $username, $password, $dbName);

    if (!$obj_con) {
        header("location:error.php");
        exit();
    }

    mysqli_query($obj_con,"SET NAMES UTF8");

    $str_sql = "select * from placetravel";
    $obj_rs = mysqli_query($obj_con,$str_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    
    <?php while ($obj_row = mysqli_fetch_array($obj_rs)) { ?>
        <div>
            <?= $obj_row['placename'] ?>
            <span style="color: red;"><?= $obj_row['type'] ?></span>
        </div>
    <?php } ?>
</body>
</html>
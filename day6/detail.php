<?php include 'database.php';

//--Get Data Form URL-------------------
$str_id = "";
    if( !isset( $_GET['id'] ) ) {
    header("location:index.php");
    exit();
}
$str_id = $_GET['id'];

//--Load DB Start-------------------

$str_sql1 = "Select * From user_tb where user_id = " . $str_id  ;
$obj_rs1 = mysqli_query($obj_con,$str_sql1);

//--Load DB Stop--------------------

//--Load DB Zero Or One Start-------------------

if(!$obj_row = mysqli_fetch_array($obj_rs1)) {
    header("location:index.php");
    exit();
}

//--Load DB Zero Or One Stop--------------------

?>
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
        <section>
            <?php while ($obj_row = mysqli_fetch_array($obj_rs1)) { ?>
            <div class="detailImg">
                <img src="img/<?=$obj_row['user_img'] ?>" alt="">
            </div>
            <div class="detail">
                <h1>Jabo</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga, tempora.</p>
            </div>
            <?php } ?>
            <div class="clear"></div>
        </section>
    </div>
</body>
</html>
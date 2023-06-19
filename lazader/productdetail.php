<?php include 'connect.php';

    //--Get Data Form URL-------------------
    $id = "";
    if(!isset( $_GET['id'])) {
        header("location:products.php");
        exit();
    }
    $id = $_GET['id'];

    //--Load DB Start-------------------
    $str_sql1 = "SELECT * FROM product_tb WHERE product_id = ".$id; 
    $obj_rs1 = mysqli_query($con, $str_sql1);

    //--Load DB Zero Or One Start-------------------
    if(!$obj_row = mysqli_fetch_array($obj_rs1)) {
        header("location:products.php");
        exit();
    }

    // Set array string format to number
    $price = $obj_row['product_price'];
    $formatNum = number_format($price);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>Lazader</title>
</head>
<body>
    <div class="container">
        <div class="topNav">
            <div class="siteName">
                <h1 class="headText">Lazader</h1>
            </div>
            <div class="contact">
                <h1 class="headText">Contact</h1>
            </div>
            <div class="clear"></div>
        </div>
        <nav class="nav">
            <a href="home.php">HOME</a>
            <a href="products.php">PRODUCTS</a>
            <a href="about.php">ABOUT US</a>
        </nav>
        <section class="productExpand">
            <div class="proHeader">
                <a href="#home.php">Home</a> >
                <a href="products.php">Product</a> >
                <a href="#">Product Name</a>
            </div>
            <div class="productContain">
                <div class="showImg">
                    <img src="img/<?= $obj_row['product_img'] ?>" alt="">
                </div>
                <div class="showDetail">
                    <h1><?= $obj_row['product_name'] ?></h1>
                    <h3><?= $formatNum.' บาท'?></h3>
                    <h3 class="detail"><?= $obj_row['product_detail'] ?></h3>
                </div>
                <div class="clear"></div>
            </div>
        </section>
    </div>
</body>
</html>
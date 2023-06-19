<?php include 'connect.php'; ?>

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
        <section class="products">
            <div class="proHeader">
                <h1 class="headText">Products</h1>
            </div>
            <div class="productList">
                <?php while ($row = mysqli_fetch_array($sqlRs)) { 
                    // Set array string format to number
                    $price = $row['product_price'];
                    $formatNum = number_format($price);
                ?>
                <div class="allProducts">
                    <a href="productdetail.php?id=<?= $row['product_id'] ?>">
                        <img src="img/<?= $row['product_img'] ?>" alt="">
                        <div class="productDetail">
                            <h1><?= $row['product_name'] ?></h1>
                            <div class="proName">
                                <p class="price"><?= $formatNum.' บาท'?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <div class="clear"></div>
            </div>
        </section>
    </div>
</body>
</html>
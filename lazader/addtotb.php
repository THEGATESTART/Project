<?php 
    include 'connect.php';

    $filename = "";
    $bool_hasnewupload = false;
        if(file_exists($_FILES['imgupload']['tmp_name']) || is_uploaded_file($_FILES['imgupload']['tmp_name'])) {
            $bool_hasnewupload = true;
            $filename = $_FILES['imgupload']['name'];
	    }

    $sqlInsert = "insert into product_tb(product_name, product_detail, product_img, product_price) 
    values('$_POST[productname]', '$_POST[detail]', '$filename', '$_POST[price]')";

    if(mysqli_query($con, $sqlInsert)) {
        if($bool_hasnewupload) {
            $uploadfile = "img/" . $filename;
        
            if (move_uploaded_file($_FILES['imgupload']['tmp_name'], $uploadfile)) {
                echo "Upload OK";
            } else {
                echo "Upload Error";
            }		
        }	
        header("location: addproduct.php");
        exit();
    } else {
        echo "Save Error! : ".$str_sql;
    }
?>
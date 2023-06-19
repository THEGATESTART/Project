<?php 
    include 'database.php';

    $str_filename = "";
    $bool_hasnewupload = false;
        if(file_exists($_FILES['fiupload']['tmp_name']) || is_uploaded_file($_FILES['fiupload']['tmp_name'])) {
            $bool_hasnewupload = true;
            $str_filename = $_FILES['fiupload']['name'];
	    }

    $str_sql = "insert into user_tb(user_name, user_lname, user_img, user_age) 
    values('$_POST[name]', '$_POST[lname]', '$str_filename', '$_POST[age]')";

    if(mysqli_query($obj_con, $str_sql)) {
        if($bool_hasnewupload) {
            $str_uploadfile = "img/" . $str_filename;
        
            if (move_uploaded_file($_FILES['fiupload']['tmp_name'], $str_uploadfile)) {
                echo "Upload OK";
            } else {
                echo "Upload Error";
            }		
        }	
        header("location: add.php");
        exit();
    } else {
        echo "Save Error! : ".$str_sql;
    }
?>
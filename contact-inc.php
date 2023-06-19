<?php

    if($_POST){
        $first = $_POST['first_name'];
        $last = $_POST['last_name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['Message'];

        $mailTo = "blavkking@gmail.com";
        $header = "จาก: ".$email;
        $txt = "คุณได้รับ E-mail จากคุณ ".$first." ".$last.".\n\n".$message;

        mail($mailTo, $subject, $txt, $header,); 
    }
?>
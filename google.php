<?php 
    require ("vendor/autoload.php");

    //Enter google account credentials
    $g_client = new Google_client();

    $g_client -> setClientId("380425395945-b24k6qqqrj67li3knj19epnlsr72tp5p.apps.googleusercontent.com");
    $g_client -> setClientSecret("RU1WLxbVuiQVMfgcmvwi4mNP");
    $g_client -> setRedirectUri("http://localhost/project/google.php");
    $g_client -> setScopes("email");

    //Creater the Url
    $auth_url = $g_client -> createAuthUrl();
    echo "<a href='$auth_url'>ล็อกอิน ผ่าน Google</a>";

    //Get authorization code
    $code = isset($_GET['code']) ? $_GET['code'] : null;

    //Get access token
    if(isset($code)){
        try{
            $token = $g_client -> fetchAccessTokenWithAuthCode($code);
            $g_client -> setAccessToken($token);
        }catch(Exception $e){
            echo $e -> getMessage();
        }

        try{
            $pay_load = $g_client -> verifyIdToken();
            
        }catch (Exception $e){
            echo $e -> getMessage();
        }
    }else{
        $pay_load = null;
    }



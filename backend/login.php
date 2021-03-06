<?php
{
    require_once "core.php";
    function get_header()
    {
        return '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    	<meta name="description" content="localhost/ExchangeWebsite/backend is the most simple,secure,reliable and trusted crypto exchanging online platform that providers best rate on the market price and with 1% service fee , Without any limitation or identity verification you can exchange your cryptocurrency fast and easily and support team is ready to get connected with you every time">
    <title>24change login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/login.css?v=' . strtotime(date("Y/m/d H:i:s")) . '"/>
</head>
<body>
<input type="hidden" id="hidden-access-token" value=""/>';
    }

    function get_body()
    {
        $res = <<<body
<div class="section-left">
    <p>Sign up</p>
    <p>Don’t have an account ?<br>
Signup Now</p>
    <a href="signup.php">
        SIGN UP
    </a>
</div>
<div class="section-right">
    <p class="section-right-title">Sign in to 24change</p>
    <p id="error-box" class="section-right-error-owner"></p>
    <div id="email-owner" class="section-right-inputowner">
        <svg xmlns="http://www.w3.org/2000/svg" width="31.4" height="24.286" viewBox="0 0 31.4 24.286">
            <path id="_084-email" fill="#555"
                  d="M26.494.5H4.906A4.912 4.912 0 0 0 0 5.406V19.88a4.912 4.912 0 0 0 4.906 4.906h21.588a4.883 4.883 0 0 0 3.843-1.856 1.236 1.236 0 0 0-.133-1.669l-.061-.058-.213-.2-.751-.7L26.9 18.19l-3.314-3.074a1.227 1.227 0 1 0-1.668 1.8c1.8 1.665 4.244 3.936 5.6 5.195a2.453 2.453 0 0 1-1.024.222H4.906a2.439 2.439 0 0 1-1.021-.224l5.6-5.194a1.227 1.227 0 1 0-1.669-1.8l-5.354 4.968c-.006-.067-.009-.135-.009-.2V5.406c0-.072 0-.143.01-.214l9.275 8.537a1.226 1.226 0 0 0 .831.324h6.264a1.227 1.227 0 0 0 .831-.324l9.274-8.535c.006.07.01.14.01.212v9.567a1.227 1.227 0 1 0 2.453 0V5.406A4.912 4.912 0 0 0 26.494.5zm-8.14 11.1h-5.307L3.892 3.173a2.439 2.439 0 0 1 1.015-.22h21.587a2.435 2.435 0 0 1 1.016.221zm0 0"
                  data-name="084-email" transform="translate(0 -.5)"/>
        </svg>
        <input id="email-box" type="text" placeholder="Email"/>
    </div>
    <div id="password-owner" class="section-right-inputowner">
        <svg xmlns="http://www.w3.org/2000/svg" width="25.022" height="31.4" viewBox="0 0 25.022 31.4">
            <path id="_126-padlock" fill="#a7a7b9"
                  d="M21.342 11.53h-2.085V6.008A6.078 6.078 0 0 0 13.124 0h-1.288A6.078 6.078 0 0 0 5.7 6.008v5.522H3.68A3.684 3.684 0 0 0 0 15.209v3.68a12.515 12.515 0 0 0 18.291 11.1 1.227 1.227 0 0 0-1.135-2.175 9.943 9.943 0 0 1-4.645 1.134A10.069 10.069 0 0 1 2.453 18.889v-3.68a1.228 1.228 0 0 1 1.227-1.226h17.662a1.228 1.228 0 0 1 1.227 1.227v3.68a10.048 10.048 0 0 1-1.377 5.083 1.227 1.227 0 1 0 2.116 1.242 12.5 12.5 0 0 0 1.714-6.324v-3.68a3.684 3.684 0 0 0-3.68-3.68zM8.157 6.008a3.623 3.623 0 0 1 3.68-3.555h1.288A3.623 3.623 0 0 1 16.8 6.008v5.522H8.157zm3.126 17.91v-2.692a2.269 2.269 0 1 1 2.453 0v2.69a1.227 1.227 0 1 1-2.453 0zm0 0"
                  data-name="126-padlock"/>
        </svg>
        <input id="password-box" type="password" placeholder="Password"/>
    </div>
    <a href="reset-password.php" class="section-right-forgotbox">
        Forget your password?
    </a>
    <button id="button-login" class="section-right-button">sign in</button>
        <a href="index.php" class="section-right-forgotbox">
        Back to main
    </a>
        <div id="create-new" class="section-right-forgotbox">
        Dont have account ? <a href="signup.php">create one</a>
    </div>
</div>
body;
        return $res;
    }

    function get_footer()
    {
        return '<script src="js/jquery.min.js?v=' . strtotime(date("Y/m/d H:i:s")) . '"></script>
<script src="js/login.js?v=?v=' . strtotime(date("Y/m/d H:i:s")) . '"></script>
</body>
</html>';
    }

    if (isset($_COOKIE["cs_auth"])) {
        $cookie = $_COOKIE["cs_auth"];
        $res = check_auth_cookie($cookie, $_SERVER["REMOTE_ADDR"]);
        if ($res == "s") {
            header("Location: main.php");
        } else {
            setcookie("cs_auth", "", time() - 3600);
            echo get_header();
            echo get_body();
            echo get_footer();
        }
    } else {
        echo get_header();
        echo get_body();
        echo get_footer();
    }
}
?>
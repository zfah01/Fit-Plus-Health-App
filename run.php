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
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Run</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>

    <link rel="apple-touch-icon" sizes="128x128" href="img/icon101.png">
    <link rel="icon" sizes="192x192" href="img/icon101.png">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <link rel="stylesheet" href="run.css" />
</head>

<body>
<div id="nav-placeholder">
</div>
<div id="map"></div>
<div class="Btn">
    <label class="switch">
        <input type="checkbox" onchange="toggle()" />
        <span class="slider round"></span>
    </label>
</div>

<div class="distance">
    <div>
        <span>Distance:</span>
        <span id="distanceResult">0.000</span>
        <span>km</span>
    </div>
</div>

<div id="consoleLog"></div>

<script>
    $(function(){
        $("#nav-placeholder").load("navBar.html");
    });
</script>
<script src="model.js"></script>
<script src="view.js"></script>
<script src="controller.js"></script>
<script src="run.js"></script>
</body>
</html>

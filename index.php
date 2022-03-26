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
    <title>Home</title>
    <link rel="apple-touch-icon" sizes="128x128" href="img/icon101.png">
    <link rel="icon" sizes="192x192" href="img/icon101.png">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <div id="nav-placeholder">

    </div>

    <div id="firstSec" class="sections">
    <h2 id="calTitle" class="titles">Calories Remaining</h2>
    <div  class="panel">
        <h3 class="countCal"><span id="goal"></span> - <span id="food"></span> +
            <span id="exercise"></span> = <span id="remaining"></span> </h3>
        <h3 class="countCal">Goal  Food  Exercise  Remaining</h3>
    </div>
    </div>

    <div class="sections">
        <h2 id="stepTitle" class="titles">Your Steps for Today</h2>
        <h3 id="stepsSection"><span id="steps"></span>/6000 Steps</h3>
    </div>

    <div class="sections">
        <h2 class="titles">Getting Started</h2>
        <p id="miniHeading">Make a lifestyle change to reach your goals</p>
        <div id="workoutPanel" class="linkedPanels" onClick="window.open('https://www.nhs.uk/live-well/exercise/10-minute-workouts/')">
            <div>
                <p class="source">NHS</p>
                <h2 class="blogTitle">10 minute workouts</h2>
            </div>
            <p class="topic"> Workouts  <img class="blogImg" src="img/workout.png" alt="workout"/></p>

        </div>
        <div id="recipesPanel" class="linkedPanels" onClick="window.open('https://www.nhs.uk/healthier-families/recipes/')">
            <div>
                <p class="source">NHS</p>
                <h2 class="blogTitle">Healthy Recipes</h2>
            </div>
            <p class="topic"> Recipes  <img class="blogImg" src="img/healthyeating.png" alt="recipes"/></p>

        </div>
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
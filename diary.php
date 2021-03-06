<?php
session_start();
$authenticated = isset($_SESSION["authenticated"]) && $_SESSION["authenticated"];
if (!($authenticated && isset($_SESSION["user_id"])))
{
    header("Location: login.php");
    die();
}

$kcal_profile = read_kcal($_SESSION["user_id"])->fetch_row()[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0", shrink-to-fit=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Diary</title>
    <link rel="apple-touch-icon" sizes="128x128" href="img/icon101.png">
    <link rel="icon" sizes="192x192" href="img/icon101.png">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

    <link rel="stylesheet" href="diary.css">
</head>
<body>

<div id="nav-placeholder">

</div>
<header id="title">
    <h1>
        Diary
    </h1>
</header>
<div id="Calories">
    <form>
        <p id="caloriesText">
            Your daily calorie Allowance:
        </p>
        <input type="text" class="calorieInput" id="dailyCals" value="<?php echo $kcal_profile ?>" disabled>
    </form>
</div>
<div id="error">

</div>
<div id="otherEntries">
    <form id="form">

        <div id="headings">
            <label id="Meal/Activity">Meal/Activity</label>
            <label id="calsHeading">Calories</label>
        </div>

        <div id="breakfast">
            <label for="Breakfast">Breakfast</label>
            <input type="text" id="breakfastText" placeholder="Add Meal">
            <input onblur="getTotalCals()" type="number" id="breakfastInput" name="cals" placeholder="0" min="0" >
        </div>
        <div id="Lunch">
            <lable for="Lunch">Lunch</lable>
            <input type="text" id="lunchText" placeholder="Add Meal">
            <input onblur="getTotalCals()" type="number" id="lunchInput" name="cals" placeholder="0" min="0">
        </div>
        <div id="Dinner">
            <label for="Dinner">Dinner</label>
            <input type="text" id="dinnerText" placeholder="Add Meal">
            <input onblur="getTotalCals()" type="number" id="dinnerInput" name="cals" placeholder="0" min="0">
        </div>
        <div id="Snacks">
            <label for="Snacks">Snacks</label>
            <input type="text" id="snackText" placeholder="Add Meal">
            <input onblur="getTotalCals()" type="number" id="snackInput" name="cals" placeholder="0" min="0">
        </div>
        <div id="Exercise">
            <label for="Exercise">Exercise</label>
            <input type="text" id="ExerciseText" placeholder="Add exercise/meal">
            <input onblur="getTotalCals()" type="number" id="exerciseInput" name="cals" placeholder="0" min="0">
        </div>

        <div id="totalCalories">
            <lable for="totalCalories">Total Calories consumed</lable>
            <input type="text" id="totCals" name="total" placeholder="0" disabled>
        </div>
    </form>
</div>
<p id="message">
<h3>

</h3>
</p>

<script>
    $(function(){
        $("#nav-placeholder").load("navBar.html");
    });
</script>


<script src="model.js"></script>
<script src="view.js"></script>
<script src="controller.js"></script>
<script src="diary.js"></script>

<?php
function read_kcal($user_id){
    $server = "devweb2021.cis.strath.ac.uk";
    $username = "cs317madgroup22";
    $password = "hig4Leic8Red";
    $database = "cs317madgroup22";

    $connection = new mysqli($server, $username, $password, $database);
    $sql = "select calories from user_profile where user_id=?"; // SQL with parameters
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($connection->connect_error){
        echo "MySQL error";
        return null;
    } else {
        $stmt->execute();
        if ($connection->error)
            echo_error("Could not contact database: " . $connection->error);
        $result = $stmt->get_result();
        $connection->close();
        return $result;
    }

}
?>

</body>
</html>

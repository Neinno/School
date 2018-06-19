<?php
session_start();

if (isset($_COOKIE['userid']) OR isset($_SESSION['userid'])) {
    header("Location: welkom.php");
}


// Users registered
require ('../private/db.php');

function registredMemberCount ($mysqli)
{
    $sql = "SELECT COUNT(userid) FROM users";
    $result = mysqli_query($mysqli,$sql);
    $rows = mysqli_fetch_row($result);
    return $rows[0];
}

$counter = registredMemberCount($mysqli);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/styleIndex.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>The Wall - Inloggen</title>
</head>
<body>

<!-- WRAPPER -->
<div id="wrapper">
    <!-- Hier komt de bovenste helft van "The Wall" -->
    <div id="top-half">
        <div class="overlay">
            <!-- Title -->
            <div id="title">
                <h1>TheWall</h1>
                <p id="users"><?php echo $counter;?> registred users</p>
            </div>
            <div id="register_div">
                <a href="register.php" class="register">Register</a>
            </div>
        </div>


    </div>

    <!-- Hier komt de onderste helft van "The Wall" -->
    <div id="bottom-half">
        <!-- Login -->
        <form id="form" method="post" action="loginpoort.php">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="submit_login" id="Login" value="Log In">
        </form>
    </div>
</div>
</body>
</html>

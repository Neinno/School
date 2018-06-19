<?php
session_start();

// Kijken of de gebruiker verdwaald is
if (!isset($_SESSION['userid'])) {
    if (!isset($_COOKIE['userid'])) {
        header("Location: uitlogpoort.php");
    } else {
        require ('cookiecheck.php');
        $_SESSION['userid'] = $_COOKIE['userid'];
        $_SESSION['hash'] = $_COOKIE['hash'];
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <style type="text/css">

        html, body {
            height: 100%;
            font-size: 16px;
            margin: 0;
        }

        body {
            margin: 0;
            font-family: 'Work Sans', sans-serif;
            font-weight: 350;
            background-color: #E6E6E6;
        }


        .container {
            width: 90%;
            margin: 0 auto;
        }

        header {
            background: #3f51b5;
            height: 60px;
            -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
            -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
        }


        header::after {
            content: '';
            display: table;
            clear: both;
        }


        .logo a {
            text-decoration: none;
            color: white;
            font-size: 1.5em;
        }

        .logo{
            position: absolute;
            line-height: 60px;
        }

        nav{
            float: right;
        }

        nav ul {
            margin: 0px 0px 10px 0px;
            padding: 0;
            list-style: none;
        }

        nav li {
            display: inline-block;
            margin-left: 70px;
            line-height: 60px;

            position: relative;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
        }

        nav a: hover {
            color: #000;
        }

        nav a:before {
            content: '';
            display: block;
            height: 5px;
            background-color: #ffffff;

            position: absolute;
            top: 0;
            width: 0%;

            transition: all ease-in-out 250ms;
        }

        nav a:hover::before {
            width: 100%;
        }

        .myImg {
            width: 20%;
            height: 20%;
            margin: 10px;
            float: left;
            cursor: pointer;
        }


    </style>
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <a href="welkom.php">
                TheWall
            </a>
        </div>
        <div>
            <nav>
                <ul>
                    <li><a href="welkom.php">Home</a></li>
                    <li><a href="uploaden.php">Upload image</a></li>
                    <li><a href="uitlogpoort.php">Log out</a></li>
                </ul>
        </div>
        <br><br><br><br><br>
        <form method="POST" action="imageverwerk.php" enctype="multipart/form-data">
            <input type="file" id="file" name="userimage"><br>
            <input type="submit" id="confirm" name="submit" value="Confirm"><br>
        </form>

        <?php

        include ('../private/db.php');
        $query = "SELECT target, id FROM thewall";
        $result = mysqli_query($mysqli, $query) or die ('Error quering');

        while ($row = mysqli_fetch_array($result)) {
            $afbeelding = $row['target'];
            $imgid = $row['id'];


            echo '<div id="wrapper"> <img src="' . $afbeelding . '" class="myImg"> </div>';

        }
        ?>


    </div>
</header>
</body>
</html>
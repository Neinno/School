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
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Mitchel van den Heuvel">
  <meta name="description" content="Portfolio Mitchel van den Heuvel - Media Developer">
  <meta name="keywords" content="Mitchel van den Heuvel, Media Developer, Mediacollege">
  <title>The Wall - Feed</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
</head>

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


            echo '<img id="myImg" src="' . $afbeelding . '" class="myImg">';

        }
        ?>

    </div>
  </header>

</body>
</html>

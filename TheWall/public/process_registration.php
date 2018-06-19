<?php
require('../private/db.php');


// HOORT DE BEZOEKER HIER TE ZIJN
if (!isset($_POST['submit_registration'])) {
    header('Location: register.php');
}

// ZIJN ALLE VELDEN INGEVULD
if (empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password1']) OR empty($_POST['password2'])) {
    echo 'Je bent iets vergeten in te vullen.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}

// ZIJN BEIDE WACHTWOORDEN GELIJK
if ($_POST['password1'] != $_POST['password2']) {
    echo 'Je hebt twee verschillende wachtwoorden getypt!<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}

// HEEFT DE GEBRUIKER WEL EEN MA-ADRES
$position = strpos($_POST['email'], '@ma-web.nl');
if (!$position) {
    echo 'U kunt zich alleen met een Mediacollege account registreren!<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}


// BESTAAT DEZE USERNAME AL?
$query = "SELECT userid FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query);
$username = $_POST['username'];
$stmt->bind_param('s',$username);
$result = $stmt->execute() or die ('Error querying username');
$row = $stmt->fetch();

if ($row) {
    echo 'Sorry, maar deze gebruikersnaam is al bezet.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}

// BESTAAT DEZE EMAIL AL?
$query = "SELECT email FROM users WHERE email = ?";
$stmt = $mysqli->prepare($query);
$email = $_POST['email'];
$stmt->bind_param('s',$email);
$result = $stmt->execute() or die ('Error querying mailadres');
$row = $stmt->fetch();
if ($row) {
    echo 'Sorry, er is al een account geregistreerd met dit emailadres.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}

// GEBRUIKER TOEVOEGEN AAN DB
$query = "INSERT into users VALUES (0,?,?,?,?,0)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssss',$username,$email,$password,$hash);
// waardes ophalen
$username = $_POST['username'];
$email = $_POST['email'];
// random getal genereren
$random_number = rand(0,1000000);
$hash = hash('sha512', $random_number);
$password = hash('sha512',$_POST['password1']);
$result = $stmt->execute() or die ('Error inserting.');

// GEBRUIKER MAILEN
$to = $_POST['email'];
$subject = 'Verifieer je account bij TheWall';
$message = 'Klik op de volgende link om je account te activeren: ';
$message .= 'http://23698.hosts.ma-cloud.nl/bewijzenmap/periode1.3/proj/TheWall/public/verify.php?mailadres=' . $email . '&hash=' . $hash;
$headers = 'From: 24539@ma-web.nl';
mail($to,$subject,$message,$headers) or die ('Error mailing.');

echo 'Registreren is gelukt! Bekijk je email om je account te activeren!<br>';
echo 'Klik <a href="index.php">hier</a> om terug te keren.';
exit();

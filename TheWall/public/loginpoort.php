<?php
session_start();

// Checken of de gebruiker of op de inlog button heeft gedrukt
if (!isset($_POST['submit_login'])) {
    header("Location: index.php");
}

// Checken of de gebruiker heeft alles ingevuld
if (empty($_POST['username']) OR empty($_POST['password'])) {
    echo 'Je bent iets vergeten in te vullen.<br>';
    echo 'Klik <a href="index.php">hier</a> om het nog eens te proberen.';
    exit();
}

// Checken of de gebruiker bestaat en of zijn wachtwoord klopt
require ('../private/db.php');
$query = "SELECT userid, hash, active FROM users WHERE username = ? AND password = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing.');
$stmt->bind_param('ss',$username,$password) or die ('Error binding params.');
$stmt->bind_result($userid,$hash,$active) or die ('Error binding results.');
$username = $_POST['username'];
$password = $_POST['password'];
$password = hash('sha512',$password) or die ('Error hashing.');
$stmt->execute() or die ('Error executing.');
$fetch_success = $stmt->fetch();

if (!$fetch_success) {
    echo 'Sorry, er is iets misgegaan.<br>';
    echo 'Klik <a href="index.php">hier</a> om het nog eens te proberen.';
    exit();
// Controleren of account is geactiveerd
} else if ($active == 0) {
    echo 'Sorry, je account is nog niet geactiveerd. Check je mailbox.<br>';
    echo 'Klik <a href="index.php">hier</a> om het nog eens te proberen.';
    exit();
}

// Alles in orde? Dan....
setcookie('userid',$userid, time() + 3600 * 24);
$_SESSION['userid'] = $userid;
setcookie('hash',$hash, time() + 3600 * 24);
$_SESSION['hash'] = $hash;
header("Location: welkom.php");


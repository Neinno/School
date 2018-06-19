<?php

require ('../private/db.php');


// Checken of de email klopt met de hash
$query = "SELECT userid FROM users WHERE email = ? AND hash = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing SELECT.');
$stmt->bind_param('ss',$mailadres,$hash);
$mailadres = $_GET['mailadres'];
$hash = $_GET['hash'];
$stmt->execute();
$stmt->bind_result($userid);
$row = $stmt->fetch();
if (!$userid) {
    echo 'Sorry, maar deze combinatie van emailadres en hash ken ik niet.';
    exit();
}

$stmt->close();

// Account activeren
$query = "UPDATE users SET active = 1 WHERE userid = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing for update.');
$stmt->bind_param('i',$userid);
$stmt->execute() or die ('Error updating.');
echo 'Je account is geactiveerd!<br>';
echo 'Klik <a href="index.php">hier</a> om in te loggen.';



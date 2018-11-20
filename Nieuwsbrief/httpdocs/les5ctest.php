<?php

require('../private/connectvars.php');

// MYSQLI OBJECT AANMAKEN
$mysqli =  new mysqli(HOST, USER, PASS, DBNAME);


// TESTEN OP CONNECTIE FOUTEN
if ($mysqli->connect_errno) {
    echo('Error code: ' . $mysqli->connect_errno);
}

// QUERY SCHRIJVEN
$query = "INSERT INTO nieuwsbrief VALUES (0,?,?,?,?)";


// PREPAREN
$stmt = $mysqli->prepare($query);

// BINDEN
$stmt->bind_param('ssss', $voornaam, $tussenvoegsel, $achternaam, $mailadres);

// INVULLEN
$voornaam = 'Joey';
$tussenvoegsel = '';
$achternaam = 'test';
$mailadres = 'bob@test.nl';

// EXECUTE
$stmt->execute();


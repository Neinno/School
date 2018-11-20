<?php


    // POST-ARRAY UITLEZEN
    $voornaam = $_POST['voornaam'];
    $tussenvoegsel = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $mailadres = $_POST['mailadres'];

    $voornaam = htmlentities($voornaam,ENT_QUOTES, 'utf-8');
    $tussenvoegsel = htmlentities($tussenvoegsel,ENT_QUOTES, 'utf-8');
    $achternaam = htmlentities($achternaam,ENT_QUOTES, 'utf-8');
    $mailadres = htmlentities($mailadres,ENT_QUOTES, 'utf-8');

    require('../private/connectvars.php');

    //DATA IN DATABASE STOPEN
    // 1. Verbinding maken met de database

$dbc = mysqli_connect(HOST, USER, PASS, DBNAME) or die ('Error connecting');
    // 2. Opdracht (QUERY) schijven voor de database
$query = "INSERT INTO nieuwsbrief VALUES (0,'$voornaam','$tussenvoegsel','$achternaam','$mailadres')";
    // 3. Query uitvoeren
$result = mysqli_query($dbc,$query) or die ('Error querying.');
    // 4. Verbinding verbreken
mysqli_close($dbc);


// Bevesteging
if ($result) {
    echo 'De volgende gegevens zijn toegevoegd aan de database:<br>';
    echo $voornaam . '<br>';
    echo $tussenvoegsel. '<br>';
    echo $achternaam . '<br>';
    echo $mailadres . '<br>';
} else {
    echo 'Sorry, er is iets misgegaan. Probeer het opnieuw.';
}





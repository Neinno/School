<?php
$id = $_GET['id'];
$voornaam = $_GET['voornaam'];
$tussenvoegsel = $_GET['tussenvoegsel'];
$achternaam = $_GET['achternaam'];
$mailadres = $_GET['mailadres'];

$voornaam = htmlentities($voornaam,ENT_QUOTES, 'utf-8');
$tussenvoegsel = htmlentities($tussenvoegsel,ENT_QUOTES, 'utf-8');
$achternaam = htmlentities($achternaam,ENT_QUOTES, 'utf-8');
$mailadres = htmlentities($mailadres,ENT_QUOTES, 'utf-8');


$id = $_GET['id'];

require('../private/connectvars.php');

                $dbc = mysqli_connect(HOST, USER, PASS, DBNAME) or die ('Error connecting.');
$query = "UPDATE nieuwsbrief ";
$query .= "SET voornaam = '$voornaam', tussenvoegsel = '$tussenvoegsel', achternaam = '$achternaam', mailadres = '$mailadres' ";
$query .= "WHERE id = '$id'";
$result = mysqli_query($dbc,$query) or die ('Error Updating.');
header("Location: beheren.php");
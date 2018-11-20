<?php
// FORMULIER UITLEZEN
$mailadres = $_POST['mailadres'];
// CONNECTIE MAKEN MET DATABASE

require('../private/connectvars.php');

$dbc = mysqli_connect(HOST, USER, PASS, DBNAME) or die ('Error connecting.');
// QUERY BEDENKEN VOOR ZOEKEN NAAR DATA
$query = "SELECT * FROM nieuwsbrief WHERE mailadres = '$mailadres'";
// QUERY UITVOEREN
$result = mysqli_query($dbc,$query) or die ('Error querying');
// TELLEN HOEVEEL REGELS WE NU HEBBEN
$number_of_rows = mysqli_num_rows($result);
// TESTEN OF ER REGELS ZIJN EN DAAR CENCLUSIES AAN VERBINDEN
if ($number_of_rows == 0) {
    echo 'Helaas, het mailadres ' . $mailadres . ' staat niet in de databse.<br>';
    echo '<a href="uitschrijven.php">Klik hier om het nog een keer te proberen</a><br><br>';
    exit();
} else {
    echo 'Hoera! Het mailadres ' . $mailadres . ' is gevonden in de database!';
}
// QUERY SCHRIJVEN VOOR VERWIJDEREN DATA
$query = "DELETE FROM nieuwsbrief WHERE mailadres = '$mailadres'";
// QUERY UITVOEREN
$result = mysqli_query($dbc,$query) or die ('Error querying (DELETE)');
// CONNECTIE VERBRKENE
mysqli_close($dbc);
// VERLSAG VAN RESULTAAT
echo 'Het mailadres ' . $mailadres . ' is verwijderd uit de database!<br>';
echo '<a href="index.php">Klik hier om terug te gaan naar de homepage</a><br><br>';
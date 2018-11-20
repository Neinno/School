<?php
$id = $_GET['id'];
require('connectvars.php');

$dbc = mysqli_connect(HOST, USER, PASS, DBNAME) or die ('Error connecting.');
$query = "DELETE FROM nieuwsbrief WHERE id = '$id'";
$result = mysqli_query($dbc,$query) or die ('Error Deleting.');
header("Location: beheren.php");
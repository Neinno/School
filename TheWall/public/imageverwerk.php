<?php
include ('../private/db.php');

$date = 23;
$description = 'user';
$username = 'user';


$temp_location = $_FILES['userimage']['tmp_name'];
$target_location = '../image/' . time() . $_FILES['userimage']['name'];

if ($_FILES['userimage']['size'] < 2000000) {
    $result = move_uploaded_file($temp_location, $target_location);
} else {
    echo "Image size is te groot";
}

if ($result) {
    include ('../private/db.php');
    if ($mysqli->connect_errno) {
        echo 'Error code:' . $mysqli->connect_errno;
    }

    $query = "INSERT INTO thewall VALUES (0, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('isss', $date, $description, $target_location, $username);
    $stmt->execute();
    header('Location: welkom.php');
}


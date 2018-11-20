<?php
//data uitlezen
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $subject = htmlentities($subject,ENT_QUOTES, 'utf-8');
    $message = htmlentities($message,ENT_QUOTES, 'utf-8');


    require('../private/connectvars.php');


    $dbc = mysqli_connect(HOST, USER, PASS, DBNAME) or die ('Error connecting');
    $query = "SELECT mailadres FROM nieuwsbrief";
    $result = mysqli_query($dbc,$query) or die ('Error querying.');



//mailen met while-loop
    while ($row = mysqli_fetch_array($result)) {
        echo 'Mail verzonden naar: ' . $row['mailadres'] . '<br>';

        $to = $row['mailadres'];
        $headers = 'From: 23698@ma-web.nl';
        mail($to,$subject,$message,$headers);
}

    mysqli_close($dbc);
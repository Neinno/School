<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/registration.css">
    <link href='https://fonts.googleapis.com/css?family=Armata' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>The Wall - Registreren</title>
</head>
<body>

<!-- WRAPPER -->
<div id="wrapper">
    <div id="box">
        <h1>Registreer je account</h1>
        <form method="post" action="process_registration.php">
            <label>Gebruikersnaam:<br><input type="text" name="username"/></label><br>
            <label>E-mail:<br><input type="email" name="email"/></label><br>
            <label>Wachtwoord:<br><input type="password" name="password1"/></label><br>
            <label>Herhaal wachtwoord:<br><input type="password" name="password2"/></label><br><br>
            <label><input type="submit" name="submit_registration" value="Registreren"/></label>
        </form>
    </div>
</div>
</body>
</html>

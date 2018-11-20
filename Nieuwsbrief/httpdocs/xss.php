<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XSS Demo</title>
</head>
<body>

<h1>XSS DEMO</h1>


<form method="post" action="process_xss.php">

    <input type="text" name="zoekwoord"/>
    <input type="submit" name="submit" value="GO!" />

</form>



</body>
</html>
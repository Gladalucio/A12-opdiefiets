<?php require_once "php/functions.php";
db_connect();
check_auth();

$sql = "INSERT INTO klanten (klant_id, naam, email, telefoonnr, adres, plaats, afb_url) VALUES (NULL, 'Voornaam Achternaam', 'Emailadres', 'Telefoonnr', 'Straat + Huisnummer', 'Plaats', 'www.youtube.com')";

$sql_query = mysqli_query($conn, $sql);

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ding</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <form><input type="text" class="form-control" /><input type="text" class="form-control" /><input type="text" class="form-control" /><input type="text" class="form-control" /></form>
    <button type="button">Registreren/inloggen</button>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
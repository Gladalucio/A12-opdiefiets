<?php
require_once "php/functions.php";
db_connect();
?>


<?php
$sql = "INSERT INTO klanten (klant_id, naam, email, telefoonnr, adres, plaats, afb_url) VALUES (NULL, 'Voornaam Achternaam', 'Emailadres', 'Telefoonnr', 'Straat + Huisnummer', 'Plaats', 'www.youtube.com')";

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klantenformulier | OpDieFiets!verhuur</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container" style="width:300px;margin-top:20px;">

        <img src="assets/img/OpDieFietsverhuur.png" style="width:100%;">
        <h1 style="text-align:center;margin-bottom:20px;margin-top:50px;">Welkom</h1>

        <form action="popup.php" method="post">
            <input type="text" class="form-control" required name="naam" placeholder="Naam" style="margin-top:10px;">
            <input type="text" class="form-control" required name="email" placeholder="E-mail" style="margin-top:10px;">
            <input type="number" class="form-control" required name="telefoonnr" placeholder="Telefoonnummer" style="margin-top:10px;">
            <input type="text" class="form-control" required name="adres" placeholder="Straat + Huisnummer" style="margin-top:10px;">
            <input type="text" class="form-control" required name="plaats" placeholder="Plaats" style="margin-top:10px;">

            <div class="form-group" style="margin-top:20px;">
                <input type="submit" value="Inloggen/registreren" class="btn btn-primar y btn-block btn-lg">
            </div>
        </form>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
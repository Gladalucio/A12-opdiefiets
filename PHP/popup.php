<?php
require_once "php/functions.php";
db_connect();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelukt!</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<?php

// form "nummer" = Informatie is goed
// form "email" = Naam is goed, email ter verificatie
// form "oud_adres" = Naam + Email is bekend, oud adres ter verificatie
// form "nieuw" = nieuwe klant aanmaken
$form = "";

$naam = $_POST['naam'];
$telefoonnr = $_POST['telefoonnr'];
$adres = $_POST['adres'];
$email = $_POST['email'];
$plaats = $_POST['plaats'];


// Check of klant al bestaat
$sql_check_name = "SELECT * FROM klanten WHERE naam = '$naam'";
$query_check_name = mysqli_query($conn, $sql_check_name);

$sql_check_email = "SELECT * FROM klanten WHERE email = '$email'";
$query_check_email = mysqli_query($conn, $sql_check_email);

if ($query_check_name->num_rows > 0) {
    $fetch_check_name = $query_check_name->fetch_assoc();

    if ($fetch_check_name['adres'] == $adres) {
        // $form = "email";

        if ($fetch_check_name['plaats'] == $plaats) {


            if ($fetch_check_name['email'] == $email) {
                $form = "nummer";
            }
        }
    } else {
        $form = "nieuw";
    }
} else {
    $form = "nieuw";
}





if ($form == "nummer") {
    echo
        '
    <div class="container" style="width:600px;margin-top:20px;">
    <h1>Welkom terug! Uw nummer is:</h1>
    
    <form action="klanten.php">
    <input class="form-control" type="text" style="font-size:40px;" readonly value="' . $fetch_check_name['klant_id'] . '">
    <h1>Onthoud uw nummer goed!</h1>
    <button class="btn btn-primary" type="submit">Volgende klant</button><strong></strong>
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </div>
    ';
} else if ($form = "nieuw") {
    // INSERT INTO `opdiefiets`.`klanten` (`klant_id`, `naam`, `email`, `telefoonnr`, `adres`, `plaats`, `afb_url`) VALUES (NULL, 'Bob de Graaf', 'b.graafschap@hotmail.com', '0683741831', 'Graafseweg 12', 'Betlehem', '');
    $sql_nieuw = "INSERT INTO klanten (`klant_id`, `naam`, `email`, `telefoonnr`, `adres`, `plaats`) VALUES (NULL, '$naam', '$email', '$telefoonnr', '$adres', '$plaats')";
    $query_nieuw = mysqli_query($conn, $sql_nieuw);

    $sql_nieuw_klant = "SELECT klant_id FROM klanten WHERE naam = '$naam' AND email = '$email' AND adres = '$adres' AND plaats = '$plaats'";
    $query_nieuw_klant = mysqli_query($conn, $sql_nieuw_klant);
    $fetch_nieuw_klant = $query_nieuw_klant->fetch_assoc();

    echo '
    <div class="container" style="width:600px;margin-top:20px;">
    <h1>U bent toegevoegd! Wij wensen u hartelijk welkom!!</h1>
    
    <form><input class="form-control" type="text" style="font-size:40px;" readonly value="' . $fetch_nieuw_klant["klant_id"] . '">
    <h1>Onthoud uw nummer goed!</h1>
    <button class="btn btn-primary" type="submit">Volgende klant</button><strong></strong>
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    </div>
    ';
}

?>



<body>


</body>
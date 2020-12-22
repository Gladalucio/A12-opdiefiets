<?php
require_once "functions.php";
db_connect();

$mensen = $_POST['mensen'];
$klant = $_POST['klant_id'];

$sql = "SELECT * FROM klanten WHERE klant_id = $klant";
$sql_query = mysqli_query($conn, $sql);

if ($sql_query->num_rows > 0) {
    echo '<input class="d-flex justify-content-center align-items-center align-content-center" type="text" name="mensen" value="' . $mensen . '" placeholder="Aantal mensen" style="margin:20px;height:100px;width:300px;font-size:42px;padding:10px;">';
    echo '<input class="d-flex justify-content-center align-items-center align-content-center" type="text" name="klant_id" value="' . $klant . '" placeholder="Aantal mensen" style="margin:20px;height:100px;width:300px;font-size:42px;padding:10px;">';
} else {
    echo '<form action="../checkout-form.php" method="post">';
    echo '<h1>Gebruiker bestaat niet! Ga terug en probeer het opnieuw</h1>';
    echo '<input type="submit" value="Vorige" class="btn btn-primary btn-block btn-lg" style="width:200px;height:75px;font-size:35px;">';
    echo '</form>';
}

//.redirect_to("../checkout.php");
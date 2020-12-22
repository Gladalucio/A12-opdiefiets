<?php
require_once "functions.php";
db_connect();
check_auth();

$amount = $_GET['a'];
$user = $_GET['u'];
$begin_get = $_GET['dv'];
$eind_get = $_GET['dt'];

$begindatum = new DateTime("$begin_get");
$einddatum = new DateTime("$eind_get");

$dagen = $einddatum->diff($begindatum)->format("%a");
$dagen++;

// Ordernummer genereren
$sql_count_orders = "SELECT COUNT(*) FROM orders";
$result_count_orders = mysqli_query($conn, $sql_count_orders);
$count_orders_row = mysqli_fetch_row($result_count_orders);
$ORDER = $count_orders_row[0];
$ORDER++;

$QUERY = "";

$borg = 0;
$tarief = 0;

for ($i = 0; $i < $amount; $i++) {
    // GET uitpluizen
    $soort = $_GET['s' . $i];
    $geslacht = $_GET['g' . $i];
    $bandmaat = $_GET['b' . $i];
    $m = $_GET['m' . $i];

    $show = $soort . "<br>" . $geslacht . "<br>" . $bandmaat . "<br>" . $m . "<br><br>";
    $additional_query = "AND soort_fiets.soort = '$soort'
    AND fietsen.bandmaat = '$bandmaat'
    AND soort_fiets.geslacht = '$geslacht'";

    if ($m != "-----") {
        // Merk en model scheiden om de SQL te laten werken
        $m_explode = explode(" ", $m);
        // Aangezien het merk steeds maar één woord lang is, kan het zo gedaan worden
        $merk = $m_explode[0];

        $model = "";
        for ($j = 1; $j < count($m_explode); $j++) {
            $model = $model . ' ' . $m_explode[$j];
        }


        $model_trimmed = trim($model);


        $show = $soort . "<br>" . $geslacht . "<br>" . $bandmaat . "<br>" . $merk . "<br>" . $model . "<br><br>";
        $additional_query = "AND soort_fiets.soort = '$soort'
        AND fietsen.bandmaat = '$bandmaat'
        AND soort_fiets.geslacht = '$geslacht'
        AND soort_fiets.merk = '$merk'
        AND soort_fiets.model = '$model_trimmed'";
    }


    /// SELECTEER EEN FIETS DIE OVEREEN KOMT MET DE INVULLING
    // $fietsenkiezer_sql = "SELECT fietsen.fiets_id 
    // FROM fietsen, soort_fiets 
    // WHERE soort_fiets.type = fietsen.type 
    // AND fietsen.status = 'Beschikbaar'
    // AND soort_fiets.soort = '$soort'
    // AND fietsen.bandmaat = '$bandmaat'
    // AND soort_fiets.geslacht = '$geslacht'
    // AND soort_fiets.merk = '$merk'
    // AND soort_fiets.model = '$model_trimmed'
    // ";
    $fietsenkiezer_sql = "SELECT fietsen.fiets_id, soort_fiets.tarief, soort_fiets.borg
    FROM fietsen, soort_fiets 
    WHERE soort_fiets.type = fietsen.type 
    AND fietsen.status = 'Beschikbaar'
    $additional_query
    ";

    $fietsenkiezer_query = mysqli_query($conn, $fietsenkiezer_sql);
    $fietsenkiezer_fetch = mysqli_fetch_assoc($fietsenkiezer_query);


    $borg = $fietsenkiezer_fetch['borg'] + $borg;
    $tarief = $fietsenkiezer_fetch['tarief'] + $tarief;


    $fiets = $fietsenkiezer_fetch['fiets_id'];
    $alle_fietsen = $alle_fietsen . $fiets . ",";

    $fietsupdater_sql = "UPDATE fietsen SET status = 'Uitgeleend' WHERE fiets_id = '$fiets'";
    $fietsupdater_query = mysqli_query($conn, $fietsupdater_sql);

    echo $show;
}

echo "<br>";
echo $alle_fietsen;
echo "<br>";
$alle_fietsen_trim = rtrim($alle_fietsen, ',');
echo "<br>";
echo $alle_fietsen_trim;
echo "<br>";
echo "<br>";

echo $dagen . ' dagen';

$tarief * $dagen;

$add_order = "INSERT INTO orders (fiets_id, klant_id, uitgavedatum, innamedatum, prijs, borg, status) VALUES ('$alle_fietsen_trim', '$user', '$begin_get', '$eind_get', '$tarief', '$borg', 'Lopend')";
$add_order_query = mysqli_query($conn, $add_order);


redirect_to("../index.php");

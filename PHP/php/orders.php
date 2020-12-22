<?php
require_once "functions.php";
db_connect();

$ORDER = $_GET['order'];

echo $ORDER;

// Fietsen uit database halen
$sql_sorting = "SELECT fiets_id
FROM orders
WHERE order_id = $ORDER";
$sorting_query = mysqli_query($conn, $sql_sorting);
$sorting_assoc = $sorting_query->fetch_assoc();
$sorting = $sorting_assoc['fiets_id'];
// Fietsenstring uitpluizen
$bikes_list = explode(",", $sorting);

$today = date("d-m-Y");


// if(!empty($_POST['goedgekeurd'])){
//     foreach ($_POST['goedgekeurd'] as $goed){
//         $goedgekeurd = $goed;
//     }

//     echo $goedgekeurd;
//     echo $ORDER;

//     $sql_goedgekeurd = "UPDATE orders SET status='Goedgekeurd' WHERE order_id = $ORDER";
//     $sql_goedgekeurd_query = mysqli_query($conn, $sql_goedgekeurd);
// }
// else {
//     echo $_POST['goedgekeurd'];

//     foreach ($_POST['goedgekeurd'] as $goed){
//         $goedgekeurd = $goed;
//     }

//     $sql_goedgekeurd = "UPDATE orders SET status='Afgekeurd' WHERE order_id = $ORDER";
//     $sql_goedgekeurd_query = mysqli_query($conn, $sql_goedgekeurd);

// }


$sql_goedgekeurd = "UPDATE orders SET status='Goedgekeurd' WHERE order_id = $ORDER";
$sql_goedgekeurd_query = mysqli_query($conn, $sql_goedgekeurd);

if (!empty($_POST['goedgekeurd'])) {
    // foreach ($_POST['goedgekeurd'] as $goed){
    //     $goedgekeurd = $goed;
    // }

    $sql_afgekeurd = "UPDATE orders SET status='Afgekeurd' WHERE order_id = $ORDER";
    $sql_afgekeurd_query = mysqli_query($conn, $sql_afgekeurd);
}



// Alles als "beschikbaar" markeren
foreach ($bikes_list as $bike) {
    $sql_beschikbaar = "UPDATE fietsen SET status='Beschikbaar' WHERE fiets_id = $bike";
    $sql_beschikbaar_query = mysqli_query($conn, $sql_beschikbaar);

    echo "$bike is beschikbaar";
}


if (!empty($_POST['kapot'])) {
    foreach ($_POST['kapot'] as $kapot) {
        echo "kapot man";

        // De geselecteerde fiets is KAPOT
        // Status wijzigen van "Uitgeleend" naar "Kapot"
        // Toevoegen aan Reparaties-tabel

        $sql_kapot = "UPDATE fietsen SET status='Kapot' WHERE fiets_id = $kapot";
        $sql_kapot_query = mysqli_query($conn, $sql_kapot);

        $sql_add_repairs = "INSERT INTO reparaties (`fiets_id`, `innamedatum`, `uitgavedatum`, `beschrijving`) VALUES ('$kapot', '$today', NULL, NULL)";
        $sql_add_repairs_query = mysqli_query($conn, $sql_add_repairs);
    }
}



// foreach ($_POST['kapot'] as $kapot){
//     if(!empty($_POST['kapot'])){
//         echo "kapot man";

//         // De geselecteerde fiets is KAPOT
//         // Status wijzigen van "Uitgeleend" naar "Kapot"
//         // Toevoegen aan Reparaties-tabel

//         $sql_kapot = "UPDATE fietsen SET status='Kapot' WHERE fiets_id = $kapot";
//         $sql_kapot_query = mysqli_query($conn, $sql_kapot);

//         $sql_add_repairs = "INSERT INTO reparaties (`fiets_id`, `innamedatum`, `uitgavedatum`, `beschrijving`) VALUES ('$kapot', '$today', NULL, NULL)";
//         $sql_add_repairs_query = mysqli_query($conn, $sql_add_repairs);
//     }
//     if (!isset($_POST['kapot'])){
//         echo "Je oma";

//         $sql_beschikbaar = "UPDATE fietsen SET status='Beschikbaar' WHERE fiets_id = $kapot";
//         $sql_beschikbaar_query = mysqli_query($conn, $sql_beschikbaar);
//     }
//     // else {


//     //     // De geselecteerde fiets is NIET kapot
//     //     // Status wijzigen van "Uitgeleend" naar "Beschikbaar"
//     // }
// }

// foreach ($_POST['kapot'] as $kapot){
//     $sql_beschikbaar = "UPDATE fietsen SET status='Beschikbaar' WHERE fiets_id = $kapot";
//     $sql_beschikbaar_query = mysqli_query($conn, $sql_beschikbaar);

//     if(!empty($_POST['kapot'])){
//         echo "$kapot is kapot";

//         // De geselecteerde fiets is KAPOT
//         // Status wijzigen van "Uitgeleend" naar "Kapot"
//         // Toevoegen aan Reparaties-tabel

//         $sql_kapot = "UPDATE fietsen SET status='Kapot' WHERE fiets_id = $kapot";
//         $sql_kapot_query = mysqli_query($conn, $sql_kapot);

//         $sql_add_repairs = "INSERT INTO reparaties (`fiets_id`, `innamedatum`, `uitgavedatum`, `beschrijving`) VALUES ('$kapot', '$today', NULL, NULL)";
//         $sql_add_repairs_query = mysqli_query($conn, $sql_add_repairs);

//     }

// }



// foreach ($_POST['kapot'] as $niet_kapot){
//     if (empty($_POST['kapot'])){
//         echo "Je oma";

//         $sql_beschikbaar = "UPDATE fietsen SET status='Beschikbaar' WHERE fiets_id = $niet_kapot";
//         $sql_beschikbaar_query = mysqli_query($conn, $sql_beschikbaar);
//     }
// }


redirect_to("../checkin.php");

<?php require_once "functions.php";
db_connect();

$amount = $_POST['a'];

for ($i = 0; $i < $amount; $i++) {
    $soort = $_POST['s' . $i];
    $geslacht = $_POST['g' . $i];
    $bandmaat = $_POST['b' . $i];
    $mm = $_POST['mm' . $i];
    $tarief = $_POST['t' . $i];
    $borg = $_POST['bo' . $i];

    $m_explode = explode(" ", $mm);

    $merk = $m_explode[0];

    $model = "";
    for ($j = 1; $j < count($m_explode); $j++) {
        $model = $model . ' ' . $m_explode[$j];
    }

    $model_trimmed = trim($model);

    $show = $soort . "<br>" . $geslacht . "<br>" . $bandmaat . "<br>" . $merk . "<br>" . $model . "<br><br>";
    echo $show;

    $sql_load_bike = "SELECT * FROM soort_fiets WHERE soort = '$soort'";
    $query_load_bike = mysqli_query($conn, $sql_load_bike);

    $type = "";
    $bool = 0;
    while ($bikeloader = $query_load_bike->fetch_assoc()) {
        if ($bikeloader['model'] == $model_trimmed) {
            $bool = 1;
            $type = $bikeloader['type'];
        }
    }

    if ($bool == 1) {
        // De soort fiets bestaat al, het model fiets ook. Dit betekent dat de fiets al eerder bekend is in de Database dus kan hij gewoon bij de Fietsen geschreven worden
        $sql_add_bike = "INSERT INTO fietsen (type, status, bandmaat) VALUES ('$type', 'Beschikbaar', '$bandmaat')";
        $add_bike_query = mysqli_query($conn, $sql_add_bike);
    } else {
        // Soort fiets bestaat al, model fiets nog niet. Voeg model toe aan de soort_fiets, dan voeg fiets toe met die gegevens

        $type_code = $soort[0] . $soort[1];

        $type_merk_model = $merk[0] . $model_trimmed[0];

        $new_type_of_bike = $type_code . "-" . $geslacht . "-" . $type_merk_model;
        echo $new_type_of_bike;

        $sql_add_type = "INSERT INTO soort_fiets (type, soort, merk, model, geslacht, tarief, borg) VALUES ('$new_type_of_bike', '$soort', '$merk', '$model', '$geslacht', '$tarief', '$borg')";
        $query_add_type = mysqli_query($conn, $sql_add_type);

        $sql_add_bike = "INSERT INTO fietsen (type, status, bandmaat) VALUES ('$new_type_of_bike', 'Beschikbaar', '$bandmaat')";
        $add_bike_query = mysqli_query($conn, $sql_add_bike);
    }

    // // Meer dan 0 rijen, fietssoort is dus al bekend
    // if ($result_bicycles->num_rows > 0){

    // }



}

redirect_to("../bicycle-list.php");

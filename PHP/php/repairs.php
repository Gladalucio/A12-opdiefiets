<?php
require_once "functions.php";
db_connect();

// Alle IDs van de kapotte fietsen laden
$broken =
    "SELECT DISTINCT fiets_id
FROM fietsen
WHERE status = 'Kapot'";
$result_broken = mysqli_query($conn, $broken);

// Checken of textboxen geselecteerd zijn. Zo ja, verander status van 
if (!empty($_POST['checkbox'])) {
    foreach ($_POST['checkbox'] as $selected) {
        // echo $selected."</br>";
        $today = date("d-m-Y");

        $sql_checkbox = "UPDATE reparaties SET uitgavedatum='$today' WHERE fiets_id = '$selected' AND uitgavedatum IS NULL";
        $update_checkbox = mysqli_query($conn, $sql_checkbox);

        $sql_checkbox_status = "UPDATE fietsen SET status='Beschikbaar' WHERE fiets_id='$selected'";
        $update_checkbox_status = mysqli_query($conn, $sql_checkbox_status);
    }
}


if ($result_broken->num_rows > 0) {
    while ($row_broken = $result_broken->fetch_assoc()) {
        if (!empty($_POST[$row_broken['fiets_id']])) {
            // echo $row_broken['fiets_id'] . $_POST[$row_broken['fiets_id']];
            $text =  htmlspecialchars($_POST[$row_broken['fiets_id']]);
            $selected = $row_broken['fiets_id'];

            $sql_textbox = "UPDATE reparaties SET beschrijving='$text' WHERE fiets_id='$selected' AND uitgavedatum IS NULL";
            $update_textbox = mysqli_query($conn, $sql_textbox);

            $sql_textbox_status = "UPDATE fietsen SET status='Reparatie' WHERE fiets_id='$selected'";
            $update_textbox_status = mysqli_query($conn, $sql_textbox_status);
        }
    }
}

redirect_to("../repairs.php");

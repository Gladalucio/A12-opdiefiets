<?php
require_once "functions.php";
db_connect();

// Checken of textboxen geselecteerd zijn. Zo ja, verander status van 
if (!empty($_POST['checkbox'])) {
    foreach ($_POST['checkbox'] as $selected) {
        // echo $selected."</br>";
        $today = date("d-m-Y");

        $sql_checkbox = "INSERT INTO reparaties (fiets_id, innamedatum, uitgavedatum) VALUES ($selected, $today, NULL)";
        $update_checkbox = mysqli_query($conn, $sql_checkbox);

        $sql_checkbox_status = "UPDATE fietsen SET status='Kapot' WHERE fiets_id='$selected'";
        $update_checkbox_status = mysqli_query($conn, $sql_checkbox_status);
    }
}

redirect_to("../bicycles-list.php");

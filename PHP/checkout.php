<?php
require_once "php/functions.php";
db_connect();
check_auth();

/// UPLOAD FOTO


/// EINDE UPLOAD FOTO


$amount = htmlspecialchars($_GET['a']);
$user = htmlspecialchars($_GET['u']);
$begin_get = htmlspecialchars($_GET['dv']);
$eind_get = htmlspecialchars($_GET['dt']);

// Bepaalt de kop van de tabel. Hoe meer informatie er ingevuld is, hoe groter dit wordt
$header = '<th style="width:120px;">Soort</th>';

// Om de GET mee te maken zodat wanneer de pagina gereload wordt, alle vakken er nog staan.
$redirected = "checkout.php";

$button = "Volgende";

// GET voor dynamische pagina
if (isset($_GET['s0'])) {

    // De juiste kop in de tabel zetten
    $header = $header . '<th style="width:120px;">Geslacht</th>';

    $sql_geslacht = "SELECT DISTINCT geslacht
    FROM soort_fiets ORDER BY geslacht";
    $geslacht_query = mysqli_query($conn, $sql_geslacht);

    $geslacht = "";
    while ($geslacht_part = mysqli_fetch_assoc($geslacht_query)) {
        $geslacht = $geslacht . '<option value="' . $geslacht_part['geslacht'] . '">' . $geslacht_part['geslacht'] . '</option>';
    }

    // Genereer inhoud van de tabel
    $table = '<tbody>';
    for ($i = 0; $i < $amount; $i++) {
        $table = $table .
            '
        <tr>
        <td><input type="textbox" readonly value="' . $_GET['s' . $i] . '" name="s' . $i . '">
        </td>
        <td><select name="g' . $i . '">
        ' . $geslacht . '
        </select></td>
        </tr>';
    }

    $table = $table . '</tbody>';


    if (isset($_GET['g0'])) {

        $header = $header . '<th style="width:120px;">Bandmaat</th>';

        // Genereer inhoud van de tabel
        $table = '<tbody>';
        for ($i = 0; $i < $amount; $i++) {

            $filter_geslacht = $_GET['g' . $i];
            $filter_type = $_GET['s' . $i];

            $sql_bandmaat = "SELECT DISTINCT fietsen.bandmaat 
            FROM fietsen, soort_fiets
            WHERE fietsen.type = soort_fiets.type
            AND fietsen.status = 'Beschikbaar'
            AND soort_fiets.geslacht = '$filter_geslacht'
            AND soort_fiets.soort = '$filter_type'
            ORDER BY fietsen.bandmaat";
            $bandmaat_query = mysqli_query($conn, $sql_bandmaat);

            $bandmaat = "";
            while ($bandmaat_part = mysqli_fetch_assoc($bandmaat_query)) {
                $bandmaat = $bandmaat . '<option value="' . $bandmaat_part['bandmaat'] . '">' . $bandmaat_part['bandmaat'] . '</option>';
            }

            $table = $table .
                '
            <tr>
            <td><input type="textbox" readonly value="' . $_GET['s' . $i] . '" name="s' . $i . '">
            </td>
            <td><input type="textbox" readonly value="' . $_GET['g' . $i] . '" name="g' . $i . '">
            </td>
            <td><select name="b' . $i . '">
            ' . $bandmaat . '
            </select></td>
            </tr>';
        }

        $table = $table . '</tbody>';

        if (isset($_GET['b0'])) {

            $header = $header . '<th style="width:120px;">Merk en Model</th>';

            // Genereer inhoud van de tabel
            $table = '<tbody>';
            for ($i = 0; $i < $amount; $i++) {


                $filter_geslacht = $_GET['g' . $i];
                $filter_type = $_GET['s' . $i];
                $filter_bandmaat = $_GET['b' . $i];

                $sql_merkmodel = "SELECT soort_fiets.merk, soort_fiets.model
                FROM fietsen, soort_fiets
                WHERE fietsen.type = soort_fiets.type
                AND fietsen.status = 'Beschikbaar'
                AND soort_fiets.geslacht = '$filter_geslacht'
                AND soort_fiets.soort = '$filter_type'
                AND fietsen.bandmaat = '$filter_bandmaat'
                GROUP BY soort_fiets.merk, soort_fiets.model
                ORDER BY soort_fiets.merk, soort_fiets.model";

                $merkmodel_query = mysqli_query($conn, $sql_merkmodel);

                $merkmodel = '<option value="-----">-----</option>';
                while ($merkmodel_part = mysqli_fetch_assoc($merkmodel_query)) {
                    $merkmodel = $merkmodel . '<option value="' . $merkmodel_part['merk'] . ' ' . $merkmodel_part['model'] . '">' . $merkmodel_part['merk'] . ' ' . $merkmodel_part['model'] . '</option>';
                }

                $table = $table .
                    '
                <tr>
                <td><input type="textbox" readonly value="' . $_GET['s' . $i] . '" name="s' . $i . '">
                </td>
                <td><input type="textbox" readonly value="' . $_GET['g' . $i] . '" name="g' . $i . '">
                </td>
                <td><input type="textbox" readonly value="' . $_GET['b' . $i] . '" name="b' . $i . '">
                </td>
                <td><select name="m' . $i . '">
                ' . $merkmodel . '
                </select></td>
                </tr>';
            }

            $table = $table . '</tbody>';



            $button = "Plaats Order";

            $redirected = "php/checkout.php";
            // if (isset($_GET['mo0'])){

            //     $header = $header.'<th style="width:120px;">Model</th>';

            //     // Ordernummer bepalen
            //     $sql_count_orders = "SELECT COUNT(*) FROM orders";
            //     $result_count_orders = mysqli_query($conn, $sql_count_orders);
            //     $count_orders_row = mysqli_fetch_row($result_count_orders);
            //     $ORDER = $count_orders_row[0];
            //     $ORDER++;

            //     $button = "Plaats Order";
            // }
        }
    }
} else {

    // $type_html = 'select';
    // $type_html_args = '';

    //$part_counter = 0;
    // $sql_type = "SELECT DISTINCT soort
    // FROM soort_fiets";
    // $type_query = mysqli_query($conn, $sql_type);
    // // $type = '<td><select name="soort'.$part_counter.'">';
    // while($type_part = mysqli_fetch_assoc($type_query)){
    //     $type = $type.'<option name="'.$part_counter.'" value="'.$type_part['soort'].'">'.$type_part['soort'].'</option>';
    // // $part_counter++;
    // }
    // $type = $type.'</select></td>';

    $sql_type = "SELECT DISTINCT soort
    FROM soort_fiets";
    $type_query = mysqli_query($conn, $sql_type);

    while ($type_part = mysqli_fetch_assoc($type_query)) {
        $type = $type . '<option value="' . $type_part['soort'] . '">' . $type_part['soort'] . '</option>';
    }

    // Genereer inhoud van de tabel
    $table = '<tbody>';
    for ($i = 0; $i < $amount; $i++) {
        $table = $table .
            '
        <tr>
        <td><select name="s' . $i . '">
        ' . $type . '
        </select></td>
        </tr>';
    }

    $table = $table . '</tbody>';
}


$sql_klant = "SELECT * FROM klanten WHERE klant_id = $user";
$sql_query_klant = mysqli_query($conn, $sql_klant);

if ($sql_query_klant->num_rows < 1) {
    redirect_to("user_not_found.php");
}

$klant_assoc = $sql_query_klant->fetch_assoc();

?>

<?php




// $sql_bandmaat = "SELECT DISTINCT bandmaat
// FROM fietsen
// ORDER BY bandmaat ASC";
// $bandmaat_query = mysqli_query($conn, $sql_bandmaat);
// $bandmaat = '<td><select>';
// while($bandmaat_part = mysqli_fetch_assoc($bandmaat_query)){
//     $bandmaat = $bandmaat.'<option value="'.$bandmaat_part['bandmaat'].'">'.$bandmaat_part['bandmaat'].'</option>';
// }
// $bandmaat = $bandmaat.'</select></td>';

// $sql_merk = "SELECT DISTINCT merk
// FROM soort_fiets
// ORDER BY merk ASC";
// $merk_query = mysqli_query($conn, $sql_merk);
// $merk = '<td><select>';
// $merk = $merk.'<option value="blank" selected="">-----</option>';
// while($merk_part = mysqli_fetch_assoc($merk_query)){
//     $merk = $merk.'<option value="'.$merk_part['merk'].'">'.$merk_part['merk'].'</option>';
// }
// $merk = $merk.'</select></td>';




?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpDieFiets!verhuur</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="checkout-form.php" style="background-image:url(&quot;assets/img/logo-back.png&quot;);background-size:cover;background-repeat:no-repeat;height:100px;width:315px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link d-flex justify-content-center align-items-center" href="bicycle-list.php" style="background-color:#007bff;color:rgb(255,255,255);width:160px;">Fietsenlijst</a></li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle d-flex justify-content-center align-items-center" data-toggle="dropdown" aria-expanded="false" href="#" style="width:160px;background-color:#007bff;color:rgb(255,255,255);">Menu</a>
                            <div class="dropdown-menu" role="menu" style="background-color:rgb(0,123,255);"><a class="dropdown-item" role="presentation" href="settings.php" style="background-color:#007bff;color:rgb(255,255,255);">Instellingen</a><a class="dropdown-item" role="presentation" href="logout.php" style="background-color:#007bff;color:rgb(255,255,255);">Afsluiten</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <form action="<?php echo $redirected ?>" method="get">
            <div class="container d-flex justify-content-center align-items-center align-content-center mx-auto">
                <input class="d-flex justify-content-center align-items-center align-content-center" value="<?php echo $amount ?>" type="text" name="a" required="" readonly style="margin:5px;height:70px;width:100px;font-size:42px;padding:10px;" readonly>
                <input type="text" required="" value="<?php echo $user ?>" name="u" placeholder="Klantnummer" style="margin:5px;width:100px;height:70px;font-size:42px;padding:10px;" readonly></div>
            <div class="container d-flex justify-content-center align-items-center align-content-center mx-auto">
                <input class="d-flex justify-content-center align-items-center align-content-center" type="text" name="dv" required="" value="<?php echo $begin_get ?>" style="margin:5px;height:50px;width:200px;font-size:30px;padding:10px;" readonly>
                <input type="text" required="" name="dt" value="<?php echo $eind_get ?>" style="margin:5px;width:200px;height:50px;font-size:30px;padding:10px;" readonly></div>

            <img src="<?php echo $klant_assoc['afb_url'] ?>" alt="Foto niet beschikbaar" width="150px" height="200px">
            <h3><?php echo $klant_assoc['naam']; ?></h3>
            <p>Mobiel: 0<?php echo $klant_assoc['telefoonnr']; ?> <br>Email: <?php echo $klant_assoc['email']; ?> <br>Adres: <?php echo $klant_assoc['adres']; ?> <br>Plaats: <?php echo $klant_assoc['plaats']; ?><br></p>


            <div class="table-responsive">
                <table class="table">


                    <thead>
                        <tr>
                            <?php echo $header ?>
                        </tr>
                    </thead>
                    <?php

                    echo $table;


                    // $part_counter = 0;
                    // for ($i = 0; $i < $amount; $i++){
                    //     echo '
                    //     <tbody>
                    //     <tr>
                    //     <td><select name="s'.$part_counter.'">
                    //         '.$type.
                    //         //'</'.$type_html.'></td>';
                    //         // <td><select>
                    //         // <option value="M" selected="">Man</option>
                    //         // <option value="V">Vrouw</option>
                    //         // </select></td>
                    //         // '.$bandmaat.$merk.'

                    //         // <td><select>
                    //         // <option value="12" selected="">This is item 1</option>
                    //         // <option value="13">This is item 2</option>
                    //         // <option value="14">This is item 3</option>
                    //         // </select></td>
                    //     '</tr>
                    //     </tbody>';
                    //     $part_counter++;
                    // }

                    ?>

                </table>
            </div>
    </div>
    <div class="container"><button class="btn btn-primary d-flex ml-auto" type="submit"><?php echo $button ?></button></div>
    </form>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
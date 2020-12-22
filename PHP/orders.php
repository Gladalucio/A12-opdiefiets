<?php require_once "php/functions.php";
db_connect();
check_auth();


$ORDER = $_GET['order'];

// $sql_klant = "SELECT klant_id
// FROM orders
// WHERE order_id = $ORDER";
// $klant_query = mysqli_query($conn, $sql_klant);

$sql_klant = "SELECT orders.klant_id, orders.uitgavedatum, orders.innamedatum, klanten . * 
FROM orders, klanten
WHERE orders.klant_id = klanten.klant_id
AND orders.order_id = $ORDER";
$klant_query = mysqli_query($conn, $sql_klant);

$sql_sorting = "SELECT fiets_id
FROM orders
WHERE order_id = $ORDER";
$sorting_query = mysqli_query($conn, $sql_sorting);
$sorting_assoc = $sorting_query->fetch_assoc();
$sorting = $sorting_assoc['fiets_id'];

$bikes_list = explode(",", $sorting);


$counter = 1;
?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpDieFiets!verhuur</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean">
            <div class="container"><a class="navbar-brand" href="checkin.php" style="background-image:url(&quot;assets/img/logo-home.png&quot;);background-size:cover;background-repeat:no-repeat;height:100px;width:315px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle d-flex justify-content-center align-items-center" data-toggle="dropdown" aria-expanded="false" href="#" style="width:160px;background-color:#007bff;color:rgb(255,255,255);">Menu</a>
                            <div class="dropdown-menu" role="menu" style="background-color:rgb(0,123,255);"><a class="dropdown-item" role="presentation" href="settings.html" style="background-color:#007bff;color:rgb(255,255,255);">Instellingen</a><a class="dropdown-item" role="presentation" href="logout.html" style="background-color:#007bff;color:rgb(255,255,255);">Afsluiten</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <?php
    $klant_assoc = $klant_query->fetch_assoc();
    ?>


    <div class="container">
        <h2>Ordernummer <?php echo $ORDER ?></h2>
        <img src="<?php echo $klant_assoc['afb_url'] ?>" alt="Foto niet beschikbaar" width="150px" height="200px">
        <h3><?php echo $klant_assoc['naam']; ?></h3>
        <p>Mobiel: 0<?php echo $klant_assoc['telefoonnr']; ?> <br>Email: <?php echo $klant_assoc['email']; ?> <br>Adres: <?php echo $klant_assoc['adres']; ?> <br>Plaats: <?php echo $klant_assoc['plaats']; ?><br></p>
        <h3>Datum: <?php echo $klant_assoc['uitgavedatum']; ?> t/m <?php echo $klant_assoc['innamedatum']; ?></h3>
    </div>
    <div class="container">
        <form method="post" action="php/orders.php?order=<?php echo $ORDER ?>">
            <div class="table-responsive">
                <table class="table">
                    <?php
                    echo '
                <thead>
                    <tr>
                        <th style="width:50px;">ID</th>
                        <th style="width:200px;">Merk</th>
                        <th>Model</th>
                        <th style="width:50px;">M/V</th>
                        <th style="width:75px;">Kapot</th>
                    </tr>
                </thead>
                <tbody>
                ';

                    foreach ($bikes_list as $bike) {

                        $sql_information_bike = "SELECT fietsen.fiets_id, soort_fiets.merk, soort_fiets.model, soort_fiets.geslacht
                    FROM fietsen, soort_fiets
                    WHERE fietsen.type = soort_fiets.type
                    AND fietsen.fiets_id = $bike";

                        $information_bike_query = mysqli_query($conn, $sql_information_bike);

                        while ($information = $information_bike_query->fetch_assoc()) {
                            echo '<tr><td>' . $information['fiets_id'] . '</td>
                        <td>' . $information['merk'] . '</td>
                        <td>' . $information['model'] . '</td>
                        <td>' . $information['geslacht'] . '</td>
                        <td><input type=checkbox name=kapot[] value=' . $information['fiets_id'] . '></td>
                        </tr>';
                        }

                        $counter++;
                    }

                    // <tr>
                    //     <td>Cell 1</td>
                    //     <td>Cell 2</td>
                    //     <td>Cell 3</td>
                    //     <td>Cell 4</td>
                    //     <td><input type="checkbox"></td>
                    // </tr>
                    // <tr>
                    //     <td>Cell 3</td>
                    //     <td>Cell 4</td>
                    //     <td>Cell 3</td>
                    //     <td>Cell 4</td>
                    //     <td><input type="checkbox" name="kapot[] value= $ORDER ></td>
                    // </tr>

                    echo '</tbody>';
                    ?>
                </table>
            </div>
    </div>

    <div class="container">
        <div class="form-check"><input class="form-check-input" value="<?php echo $ORDER ?>" name="goedgekeurd[]" type="checkbox" id="formCheck-1"><label class="form-check-label d-flex" for="formCheck-1">Afgekeurd</label></div>
        <div class="container"><input class="btn btn-primary" type="submit" value="Toepassen" class="btn btn-primary btn-block btn-lg"></div>
    </div>
    </form>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
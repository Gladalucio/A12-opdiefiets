<?php
require_once "php/functions.php";
check_auth();
db_connect();


$query_orders = "SELECT orders.*, klanten.naam, klanten.telefoonnr FROM orders, klanten WHERE orders.klant_id = klanten.klant_id AND orders.status = 'Lopend' ORDER BY innamedatum, order_id";
$result_orders = mysqli_query($conn, $query_orders);

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
            <div class="container"><a class="navbar-brand" href="index.php" style="background-image:url(&quot;assets/img/logo-back.png&quot;);background-size:cover;background-repeat:no-repeat;height:100px;width:315px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link d-flex justify-content-center align-items-center" href="bicycle-list.php" style="background-color:#007bff;color:rgb(255,255,255);width:160px;">Fietsenlijst</a></li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle d-flex justify-content-center align-items-center" data-toggle="dropdown" aria-expanded="false" href="#" style="width:160px;background-color:#007bff;color:rgb(255,255,255);">Menu</a>
                            <div class="dropdown-menu" role="menu" style="background-color:rgb(0,123,255);"><a class="dropdown-item" role="presentation" href="settings.php" style="background-color:#007bff;color:rgb(255,255,255);">Instellingen</a><a class="dropdown-item" role="presentation" href="php/logout.php" style="background-color:#007bff;color:rgb(255,255,255);">Afsluiten</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div role="tablist" id="accordion-1">

            <div class="table-responsive">
                <table class="table">

                    <?php
                    if ($result_orders->num_rows > 0) {

                        echo
                            '<thead>
            <tr>
            <th style="width:50px;">OrderID</th>
            <th style="width:150px;">Uitgifte</th>
            <th style="width:100px;">Inname</th>
            <th style="width:100px;">Klant</th>
            <th style="width:100px;">Telefoon</th>
            <th style="width:100px;"></th>
            </tr>
            </thead>
            <tbody>';
                        while ($row_orders = $result_orders->fetch_assoc()) {

                            //echo "<tr><td>".$row_repair["fiets_id"]."</td><td>".$row_repair["innamedatum"]."</td><td>".$row_repair["soort"]."</td><td>".$row_repair["beschrijving"]."</td><td><input type=checkbox name=".$row_repair["fiets_id"]."></td></tr>" ;
                            echo "<tr><td>" . $row_orders["order_id"] . "</td><td>" . $row_orders["uitgavedatum"] . "</td><td>" . $row_orders["innamedatum"] . "</td><td>" . $row_orders["naam"] . "</td><td>" . "0" . $row_orders["telefoonnr"] . "</td><td>" . '<div class="container d-flex justify-content-end"><a class="btn btn-primary" href="orders.php?order=' . $row_orders["order_id"] . '" style="background-color:#007bff;color:rgb(255,255,255);width:160px;">Invullen</a></div>';
                        }
                        echo '</tbody>';
                    } else {
                        echo "Er staan momenteel geen orders open!";
                    }
                    ?>
                </table>
            </div>

        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
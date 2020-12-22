<?php require_once "php/functions.php";

// SELECT soort_fiets.merk, soort_fiets.model FROM soort_fiets GROUP BY soort_fiets.merk, soort_fiets.model ORDER BY soort_fiets.merk, soort_fiets.model

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
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:227px;">Type</th>
                        <th style="width:110px;">Aantal</th>
                        <th style="width:110px;">Beschikbaar</th>
                        <th style="width:110px;">Uitgeleend</th>
                        <th style="width:110px;">Onderhoud</th>
                        <th style="width:10px;">Kapot</th>
                        <th style="width:10px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fiets met versnellingen</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx<br></td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td><a class="btn btn-primary" role="button" href="bicycle-list.php">Kies</a></td>
                    </tr>
                    <tr>
                        <td>Fiets zonder versnellingen</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td><a class="btn btn-primary" role="button" href="bicycle-list.php">Kies</a></td>
                    </tr>
                    <tr>
                        <td>Mountainbike</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td><a class="btn btn-primary" role="button" href="bicycle-list.php">Kies</a></td>
                    </tr>
                    <tr>
                        <td>Kinderfiets</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td><a class="btn btn-primary" role="button" href="bicycle-list.php">Kies</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
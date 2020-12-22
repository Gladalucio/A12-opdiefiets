<?php require_once "php/functions.php"; ?>
<?php check_auth(); ?>

<?php
db_connect();

// SQL VOOR GROEPEN VAN GETALLEN
// SELECT fietsen.status, soort_fiets.soort, COUNT(*) FROM fietsen, soort_fiets WHERE fietsen.type = soort_fiets.type GROUP BY soort_fiets.soort, fietsen.status ORDER BY COUNT(*);

$query_out = "SELECT COUNT(*) FROM fietsen WHERE status = 'Uitgeleend'";
$result_out = mysqli_query($conn, $query_out);
$out = mysqli_fetch_row($result_out);

$query_bicycles = "SELECT COUNT(*) FROM fietsen WHERE status = 'Beschikbaar'";
$result_bicycles = mysqli_query($conn, $query_bicycles);
$bicycles = mysqli_fetch_row($result_bicycles);

$query_repairs = "SELECT COUNT(*) FROM fietsen WHERE status = 'Reparatie'";
$result_repairs = mysqli_query($conn, $query_repairs);
$repairs = mysqli_fetch_row($result_repairs);

$query_kapot = "SELECT COUNT(*) FROM fietsen WHERE status = 'Kapot'";
$result_kapot = mysqli_query($conn, $query_kapot);
$kapot = mysqli_fetch_row($result_kapot);
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
            <div class="container"><a class="navbar-brand" href="#" style="background-image:url(&quot;assets/img/logo-home.png&quot;);background-size:cover;background-repeat:no-repeat;height:100px;width:315px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle d-flex justify-content-center align-items-center" data-toggle="dropdown" aria-expanded="false" href="#" style="width:160px;background-color:#007bff;color:rgb(255,255,255);">Menu</a>
                            <div class="dropdown-menu" role="menu" style="background-color:rgb(0,123,255);"><a class="dropdown-item" role="presentation" href="settings.php" style="background-color:#007bff;color:rgb(255,255,255);">Instellingen</a><a class="dropdown-item" role="presentation" href="php/logout.php" style="background-color:#007bff;color:rgb(255,255,255);">Afsluiten</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div style="margin:0px;margin-top:50px;margin-bottom:0;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="height:250px;margin-bottom:20px;"><a class="btn btn-primary d-flex justify-content-end" role="button" href="bicycle-list.php" style="width:100%;height:100%;font-size:400%;background-image:url(&quot;assets/img/bike-white.png&quot;);background-repeat:no-repeat;background-size:contain;background-position:center;"><?php echo $bicycles[0] ?></a></div>
                <div class="col-md-6" style="height:250px;margin-bottom:20px;"><a class="btn btn-primary d-flex justify-content-end" role="button" href="checkin.php" style="width:100%;height:100%;background-image:url(&quot;assets/img/checkin-white.png&quot;);background-size:contain;background-repeat:no-repeat;background-position:center;font-size:400%;"></a></div>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="width:100%;height:250px;margin-bottom:20px;"><a class="btn btn-primary d-flex justify-content-end" role="button" href="repairs.php" style="width:100%;height:100%;background-image:url(&quot;assets/img/repair-white.png&quot;);background-position:center;background-size:contain;background-repeat:no-repeat;font-size:400%;"><?php echo $kapot[0] . ' / ' . $repairs[0] ?></a></div>
                <div class="col-md-6" style="width:100%;height:250px;margin-bottom:20px;"><a class="btn btn-primary" role="button" href="checkout-form.php" style="width:100%;height:100%;background-image:url(&quot;assets/img/checkout-white.png&quot;);background-size:contain;background-repeat:no-repeat;background-position:center;"></a></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
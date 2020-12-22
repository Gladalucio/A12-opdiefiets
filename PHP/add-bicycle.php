<?php require_once "php/functions.php";
db_connect();

$amount = htmlspecialchars($_POST['a']);



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
            <div class="container"><a class="navbar-brand" href="add-bicycle-form.php" style="background-image:url(&quot;assets/img/logo-back.png&quot;);background-size:cover;background-repeat:no-repeat;height:100px;width:315px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link d-flex justify-content-center align-items-center" href="bicycle-list.php" style="background-color:#007bff;color:rgb(255,255,255);width:160px;">Fietsenlijst</a></li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle d-flex justify-content-center align-items-center" data-toggle="dropdown" aria-expanded="false" href="#" style="width:160px;background-color:#007bff;color:rgb(255,255,255);">Menu</a>
                            <div class="dropdown-menu" role="menu" style="background-color:rgb(0,123,255);"><a class="dropdown-item" role="presentation" href="settings.php" style="background-color:#007bff;color:rgb(255,255,255);">Instellingen</a><a class="dropdown-item" role="presentation" href="logout.html" style="background-color:#007bff;color:rgb(255,255,255);">Afsluiten</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <form action="php/add-bicycle.php" method="post">
        <div class="container d-flex justify-content-center align-items-center align-content-center mx-auto">
            <input class="d-flex justify-content-center align-items-center align-content-center" value="<?php echo $amount ?>" type="text" name="a" required="" readonly style="margin:5px;height:70px;width:100px;font-size:42px;padding:10px;" readonly>
        </div>
        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width:120px;">Soort Fiets</th>
                            <th style="width:120px;">Geslacht</th>
                            <th style="width:120px;">Bandmaat (xxx-xxx)</th>
                            <th style="width:360px;">Merk + Model</th>
                            <th style="width:50px;">Dagtarief</th>
                            <th style="width:50px;">Borg</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < $amount; $i++) {
                            echo '
                        <tr>
                        <td><input style="width: 100%;" type="text" name="s' . $i . '" required></td>
                        <td><select name="g' . $i . '"><option value="M">M</option><option value="V">V</option></select>
                        <td><input style="width: 100%;" type="text" name="b' . $i . '" required></td>
                        <td><input style="width: 100%;" type="text" name="mm' . $i . '" required></td>
                        <td><input style="width: 100%;" type="text" name="t' . $i . '" required></td>
                        <td><input style="width: 100%;" type="text" name="bo' . $i . '" required></td>
                        </tr>
                        ';
                        }


                        ?>
                    </tbody>
                </table>
            </div>
            <div class="container"><button class="btn btn-primary d-flex ml-auto" type="submit">Doorgaan</button></div>
        </div>
    </form>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
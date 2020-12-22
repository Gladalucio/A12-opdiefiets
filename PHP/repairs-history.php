<?php require_once "php/functions.php";
db_connect();
check_auth();
?>

<?php
$sort = $_GET['sort_by'];
?>

<?php
$sql_repair_history = "
SELECT reparaties.*, soort_fiets.* 
FROM reparaties, fietsen, soort_fiets 
WHERE fietsen.fiets_id = reparaties.fiets_id 
AND fietsen.type = soort_fiets.type
AND reparaties.uitgavedatum IS NOT NULL
ORDER BY $sort, fiets_id";
$result_repair_history = mysqli_query($conn, $sql_repair_history);
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
            <div class="container"><a class="navbar-brand" href="repairs.php" style="background-image:url(&quot;assets/img/logo-back.png&quot;);background-size:cover;background-repeat:no-repeat;height:100px;width:315px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
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

        <div class="container" style="margin-top:10px;margin-bottom:10px;">
            <!--<small style="font-size:16px;margin-right:10px;">Sorteer:</small><select><option value="12" selected="">-----</option><option value="13">merk1</option><option value="14">merk2</option></select>-->
            <div class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="width:160px;background-color:white;color:black;">Sorteer</a>
                <div class="dropdown-menu" role="menu" style="background-color:white;">
                    <a class="dropdown-item" role="presentation" href="repairs-history.php?sort_by=fiets_id" style="background-color:white;color:black;">Fietsnummer (ID)</a>
                    <a class="dropdown-item" role="presentation" href="repairs-history.php?sort_by=innamedatum" style="background-color:white;color:black;">Innamedatum</a>
                    <a class="dropdown-item" role="presentation" href="repairs-history.php?sort_by=uitgavedatum" style="background-color:white;color:black;">Uitgavedatum</a>
                    <a class="dropdown-item" role="presentation" href="repairs-history.php?sort_by=soort" style="background-color:white;color:black;">Soort</a>
                    <a class="dropdown-item" role="presentation" href="repairs-history.php?sort_by=merk" style="background-color:white;color:black;">Merk</a>
                    <a class="dropdown-item" role="presentation" href="repairs-history.php?sort_by=model" style="background-color:white;color:black;">Model</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <?php
                    if ($result_repair_history->num_rows > 0) {
                        echo
                            '<thead>
                        <tr>
                        <th style="width:50px;">ID</th>
                        <th style="width:50px;">Innamedatum</th>
                        <th style="width:50px;">Uitgavedatum</th>
                        <th style="width:100px;">Soort</th>
                        <th style="width:100px;">Merk</th>
                        <th style="width:150px;">Model</th>
                        <th style="width:350px;">Beschrijving</th>
                        </tr>
                        </thead>
                        <tbody>';
                        while ($row_repair_history = $result_repair_history->fetch_assoc()) {
                            echo "<tr><td>" . $row_repair_history["fiets_id"] . "</td><td>" . $row_repair_history["innamedatum"] . "</td><td>" . $row_repair_history["uitgavedatum"] . "</td><td>" . $row_repair_history["soort"] . "</td><td>" . $row_repair_history["merk"] . "</td><td>" . $row_repair_history["model"] . "</td><td>" . $row_repair_history["beschrijving"] . "</td></tr>";
                            //echo "<tr><td>".$row_repair_history["fiets_id"]."</td><td>".$row_repair_history["innamedatum"]."</td><td>".$row_repair_history["soort"]."</td><td><input style='width:100%' type=textbox name=".$row_repair_history["fiets_id"]."></td></tr>";
                        }
                        echo '</tbody>';
                    } else {
                        echo "Kies een filter";
                    }
                    ?>
                    <!--<thead>-->
                    <!--    <tr>-->
                    <!--        <th style="width:100px;">Fietsnummer</th>-->
                    <!--        <th style="width:50px;">Innamedatum</th>-->
                    <!--        <th style="width:50px;">Uitgaveatum</th>-->
                    <!--        <th style="width:120px;">Type</th>-->
                    <!--        <th style="width:120px;">Merk</th>-->
                    <!--        <th style="width:120px;">Model</th>-->
                    <!--        <th style="width:360px;">Probleem</th>-->
                    <!--    </tr>-->
                    <!--</thead>-->
                    <!--<tbody>-->
                    <!--    <tr>-->
                    <!--        <td>12</td>-->
                    <!--        <td>Mountainbike</td>-->
                    <!--        <td>Gazelle</td>-->
                    <!--        <td>Superfast</td>-->
                    <!--        <td>Niet snel genoeg</td>-->
                    <!--    </tr>-->
                    <!--    <tr>-->
                    <!--        <td>16</td>-->
                    <!--        <td>Driewieler</td>-->
                    <!--        <td>Sparta</td>-->
                    <!--        <td>Kasteel</td>-->
                    <!--        <td>Gedegradeerd</td>-->
                    <!--    </tr>-->
                    <!--</tbody>-->
                </table>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
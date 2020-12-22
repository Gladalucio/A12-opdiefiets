<?php require_once "php/functions.php";
check_auth();
db_connect(); ?>

<?php
$repair =
    "SELECT DISTINCT reparaties.fiets_id, reparaties.innamedatum, soort_fiets.soort, reparaties.beschrijving, fietsen.status 
FROM soort_fiets, fietsen, reparaties 
WHERE reparaties.fiets_id = fietsen.fiets_id 
AND soort_fiets.type = fietsen.type 
AND fietsen.status = 'Reparatie'
AND reparaties.uitgavedatum IS NULL
ORDER BY reparaties.innamedatum ASC, reparaties.fiets_id ASC";
$result_repair = mysqli_query($conn, $repair);

$broken =
    "SELECT DISTINCT reparaties.fiets_id, reparaties.innamedatum, soort_fiets.soort, reparaties.beschrijving, fietsen.status 
FROM soort_fiets, fietsen, reparaties 
WHERE reparaties.fiets_id = fietsen.fiets_id 
AND soort_fiets.type = fietsen.type 
AND fietsen.status = 'Kapot'
ORDER BY reparaties.innamedatum ASC, reparaties.fiets_id ASC";
$result_broken = mysqli_query($conn, $broken);
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
                        <li class="nav-item" role="presentation"><a class="nav-link d-flex justify-content-center align-items-center" href="repairs-history.php?sort_by=fiets_id" style="background-color:#007bff;color:rgb(255,255,255);width:160px;">Historie</a></li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle d-flex justify-content-center align-items-center" data-toggle="dropdown" aria-expanded="false" href="#" style="width:160px;background-color:#007bff;color:rgb(255,255,255);">Menu</a>
                            <div class="dropdown-menu" role="menu" style="background-color:rgb(0,123,255);"><a class="dropdown-item" role="presentation" href="settings.php" style="background-color:#007bff;color:rgb(255,255,255);">Instellingen</a><a class="dropdown-item" role="presentation" href="php/logout.php" style="background-color:#007bff;color:rgb(255,255,255);">Afsluiten</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <form method="post" action="php/repairs.php">
            <div class="container" style="margin-top:10px;margin-bottom:10px;">
                <h1>In Reparatie</h1>
                <div class="table-responsive">
                    <table class="table">
                        <!--
                <thead>
                    <tr>
                        <th style="width:120px;">Fietsnummer</th>
                        <th style="width:120px;">Innamedatum</th>
                        <th style="width:100px;">Type</th>
                        <th style="width:500px;">Beschrijving</th>
                        <th style="width:60px;">Klaar</th>
                    </tr>
                </thead>
                
                
                <tbody>
                -->
                        <?php
                        if ($result_repair->num_rows > 0) {

                            echo
                                '<thead>
                        <tr>
                        <th style="width:50px;">ID</th>
                        <th style="width:120px;">Innamedatum</th>
                        <th style="width:100px;">Type</th>
                        <th style="width:600px;">Beschrijving</th>
                        <th style="width:60px;">Klaar</th>
                        </tr>
                        </thead>
                        <tbody>';
                            while ($row_repair = $result_repair->fetch_assoc()) {
                                //echo "<tr><td>".$row_repair["fiets_id"]."</td><td>".$row_repair["innamedatum"]."</td><td>".$row_repair["soort"]."</td><td>".$row_repair["beschrijving"]."</td><td><input type=checkbox name=".$row_repair["fiets_id"]."></td></tr>" ;
                                echo "<tr><td>" . $row_repair["fiets_id"] . "</td><td>" . $row_repair["innamedatum"] . "</td><td>" . $row_repair["soort"] . "</td><td>" . $row_repair["beschrijving"] . "</td><td><input type=checkbox name=checkbox[] value=" . $row_repair["fiets_id"] . "></td></tr>";
                            }
                            echo '</tbody>';
                        } else {
                            echo "Er zijn geen fietsen momenteel in reparatie";
                        }
                        ?>
                        <!--
                    <tr>
                        <td>TEST</td>
                        <td>Mountainbike</td>
                        <td>Band krom, stuur scheef</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>TEST</td>
                        <td>Driewieler</td>
                        <td>Kapotte dynamo</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    
                </tbody>
                -->
                    </table>
                </div>
            </div>
            <div class="container" style="margin-top:10px;margin-bottom:10px;">
                <h1>Kapot</h1>
                <div class="table-responsive">
                    <table class="table">
                        <?php
                        if ($result_broken->num_rows > 0) {
                            echo
                                '<thead>
                        <tr>
                        <th style="width:50px;">ID</th>
                        <th style="width:120px;">Innamedatum</th>
                        <th style="width:80px;">Type</th>
                        <th style="width:662px;">Beschrijving</th>
                        </tr>
                        </thead>
                        <tbody>';
                            while ($row_broken = $result_broken->fetch_assoc()) {
                                echo "<tr><td>" . $row_broken["fiets_id"] . "</td><td>" . $row_broken["innamedatum"] . "</td><td>" . $row_broken["soort"] . "</td><td><input style='width:100%' type=textbox name=" . $row_broken["fiets_id"] . "></td></tr>";
                                //echo "<tr><td>".$row_broken["fiets_id"]."</td><td>".$row_broken["innamedatum"]."</td><td>".$row_broken["soort"]."</td><td><input style='width:100%' type=textbox name=".$row_broken["fiets_id"]."></td></tr>";
                            }
                            echo '</tbody>';
                        } else {
                            echo "Er zijn momenteel geen kapotte fietsen";
                        }
                        ?>
                        <!--
                <thead>
                    <tr>
                        <th style="width:120px;">Fietsnummer</th>
                        <th style="width:120px;">Innamedatum</th>
                        <th style="width:120px;">Type</th>
                        <th style="width:500px;">Beschrijving</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        
                        <td>12</td>
                        <td>Mountainbike</td>
                        <td><input type="text" style="width:100%;"></td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>Driewieler</td>
                        <td><input type="text" style="width:100%;"></td>
                    </tr>
                </tbody>
                -->
                    </table>
                </div>
            </div>
    </div>
    <div class="container d-flex justify-content-end"><input class="btn btn-primary" type="submit" value="Toepassen" class="btn btn-primary btn-block btn-lg"></div>
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
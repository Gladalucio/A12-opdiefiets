<?php require_once "php/functions.php";
check_auth();
db_connect(); ?>

<?php
if (isset($_GET['sort_by'])) {
    $sort = $_GET['sort_by'];
} else {
    $sort = "fiets_id";
}

?>

<?php
$sql_bikes = "SELECT DISTINCT fietsen.fiets_id, soort_fiets.soort, soort_fiets.merk, soort_fiets.model, soort_fiets.geslacht, fietsen.bandmaat, fietsen.status
FROM fietsen, soort_fiets
WHERE soort_fiets.type = fietsen.type
AND fietsen.status = 'Beschikbaar'
ORDER BY $sort, bandmaat";
$result_bicycles = mysqli_query($conn, $sql_bikes);
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
                        <th style="width:120px;">Type</th>
                        <th style="width:120px;">Geslacht</th>
                        <th style="width:120px;">Bandmaat</th>
                        <th style="width:120px;">Merk</th>
                        <th style="width:120px;">Model</th>
                        <th style="width:10px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $sql = "Select DISTINCT soort From soort_fiets ORDER BY soort ASC";
                        $resultaat = mysqli_query($conn, $sql);
                        echo "<td><select>";
                        echo '<option value="" selected="">-----</option>';
                        while ($cat = mysqli_fetch_assoc($resultaat)) {
                            //echo '<li><a href="#">'.$cat['soort']. '</a></li>';
                            echo '<option value="' . $cat['soort'] . '">' . $cat['soort'] . '</option>';
                        }
                        echo "</select></td>"
                        ?>

                        <td><select>
                                <option value="" selected="">------</option>
                                <option value="gender1">Man</option>
                                <option value="gender2">Vrouw</option>
                            </select></td>
                        <td><select>
                                <option value="" selected="">------</option>
                                <option value="size1">140-160</option>
                                <option value="size2">160-180</option>
                                <option value="size3">180-200</option>
                            </select></td>
                        <td><select>
                                <option value="12" selected="">------</option>
                                <option value="13">This is item 2</option>
                                <option value="14">This is item 3</option>
                            </select></td>
                        <td><select>
                                <option value="12" selected="">------</option>
                                <option value="13">This is item 2</option>
                                <option value="14">This is item 3</option>
                            </select></td>
                        <td><button class="btn btn-outline-primary" type="button" style="background-image:url(&quot;assets/img/vergrootglas.png&quot;);background-size:contain;background-repeat:no-repeat;">&nbsp; &nbsp;</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:10px;"></th>
                        <th style="width:110px;">Fietsnummer</th>
                        <th style="width:110px;">Type</th>
                        <th style="width:110px;">Geslacht</th>
                        <th style="width:110px;">Bandmaat</th>
                        <th style="width:110px;">Merk</th>
                        <th style="width:110px;">Model</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>10023</td>
                        <td>Cell 1</td>
                        <td>Cell 2</td>
                        <td>Cell 3</td>
                        <td>Cell 4</td>
                        <td>Cell 5</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>40020</td>
                        <td>Cell 3</td>
                        <td>Cell 2</td>
                        <td>Cell 3</td>
                        <td>Cell 4</td>
                        <td>Cell 5</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <form method="post" action="php/bicycles-list.php">
        <div class="container">
            <div class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="width:160px;background-color:white;color:black;">Sorteer</a>
                <div class="dropdown-menu" role="menu" style="background-color:white;">
                    <a class="dropdown-item" role="presentation" href="bicycle-list.php?sort_by=fiets_id" style="background-color:white;color:black;">Fietsnummer (ID)</a>
                    <a class="dropdown-item" role="presentation" href="bicycle-list.php?sort_by=soort" style="background-color:white;color:black;">Soort</a>
                    <a class="dropdown-item" role="presentation" href="bicycle-list.php?sort_by=merk" style="background-color:white;color:black;">Merk</a>
                    <a class="dropdown-item" role="presentation" href="bicycle-list.php?sort_by=model" style="background-color:white;color:black;">Model</a>
                    <a class="dropdown-item" role="presentation" href="bicycle-list.php?sort_by=geslacht" style="background-color:white;color:black;">Geslacht</a>
                    <a class="dropdown-item" role="presentation" href="bicycle-list.php?sort_by=bandmaat" style="background-color:white;color:black;">Bandmaat</a>
                    <a class="dropdown-item" role="presentation" href="bicycle-list.php?sort_by=status" style="background-color:white;color:black;">Status</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <?php
                    if ($result_bicycles->num_rows > 0) {


                        echo
                            '<thead>
                        <tr>
                        <th style="width:50px;">ID</th>
                        <th style="width:150px;">Soort</th>
                        <th style="width:100px;">Merk</th>
                        <th style="width:100px;">Model</th>
                        <th style="width:50px;">Geslacht</th>
                        <th style="width:80px;">Bandmaat</th>
                        <th style="width:80px;">Status</th>
                        </tr>
                        </thead>
                        <tbody>';
                        while ($row_bicycles = $result_bicycles->fetch_assoc()) {

                            // $status_bike = $row_bicycles["status"];
                            // if ($status_bike == "Beschikbaar"){
                            //     $checkbox_show = "<input type=checkbox name=checkbox[] value=".$row_bicycles["fiets_id"].">";
                            // }
                            // else{
                            //     $checkbow_show = " ";
                            // }

                            // echo "<tr><td>".$row_bicycles["fiets_id"]."</td><td>".$row_bicycles["soort"]."</td><td>".$row_bicycles["merk"]."</td><td>".$row_bicycles["model"]."</td><td>".$row_bicycles["geslacht"]."</td><td>".$row_bicycles["bandmaat"]."</td><td>".$row_bicycles["status"]."</td><td>". $checkbox_show. "</td></tr>" ;
                            echo "<tr><td>" . $row_bicycles["fiets_id"] . "</td><td>" . $row_bicycles["soort"] . "</td><td>" . $row_bicycles["merk"] . "</td><td>" . $row_bicycles["model"] . "</td><td>" . $row_bicycles["geslacht"] . "</td><td>" . $row_bicycles["bandmaat"] . "</td><td>" . $row_bicycles["status"] . "</td></tr>";
                        }
                        echo '</tbody>';
                    } else {
                        echo "Er zijn momenteel geen fietsen bekend in de database!";
                    }
                    ?>

                </table>
            </div>
        </div>
        <div class="container d-flex justify-content-end"><input class="btn btn-primary" type="submit" value="Toepassen" class="btn btn-primary btn-block btn-lg"></div>
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>
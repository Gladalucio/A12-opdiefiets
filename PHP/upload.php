<?php require_once "php/functions.php";
db_connect(); ?>

<html>

<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Selecteer user ID:
        <br>
        <input type="number" name="user">
        <br>
        <br>
        Selecteer afbeelding:
        <br>
        <br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>

</html>
<?php

$user = $_POST['user'];

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// kijken of het een echte afbeelding is
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "Dit bestand is een afbeelding " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Dit bestand is geen afbeelding.";
        $uploadOk = 0;
    }
}
// kijken of het bestand al bestaat
if (file_exists($target_file)) {
    echo "Dit bestand bestaat al.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, je bestand is te groot.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg") {
    echo "Sorry, alleen JPG bestanden zijn toegestaan.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, je bestand is niet geüpload.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Uploaden van " . basename($_FILES["fileToUpload"]["name"]) . " geslaagd.";
        $image_path = $target_dir . $_FILES["fileToUpload"]["name"];

        echo "<br>";
        echo $_FILES["fileToUpload"]["name"];
        echo "<br>";
        echo $user;
        echo "<br>";
        echo $target_dir . $_FILES["fileToUpload"]["name"];

        $sql_update_photo = "UPDATE klanten SET afb_url = '$image_path' WHERE klant_id = '$user'";
        $query_update_photo = mysqli_query($conn, $sql_update_photo);
    } else {
        echo "Sorry, er is iets foutgegaan bij het uploaden van je bestand.";
    }
}



?>
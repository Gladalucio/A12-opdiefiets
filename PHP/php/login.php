<?php
require_once "functions.php";
db_connect();

$username = "admin";

//$pin = $_POST['pin'];
$sql = "SELECT user_id,pin FROM users WHERE pin = ?";

$user_pin = htmlspecialchars($_POST['pin']);

$statement = $conn->prepare($sql);
$statement->bind_param('i', $user_pin);
$statement->execute();
$statement->store_result();
$statement->bind_result($user_id, $pin);
$statement->fetch();

if ($statement->execute()) {
    if (/*password_verify($_POST['pin'],*/$pin) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        redirect_to("../index.php");
    } else {
        redirect_to("../login.php");
    }
} else {
    echo "Error: " . $conn->error;
}

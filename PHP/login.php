<?php require_once "php/functions.php"; ?>

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
    <h1 class="text-center" style="margin-top:10px;margin-bottom:20px;">Inloggen</h1>
    <div class="container d-flex justify-content-center" style="width:200px;"><small style="font-size:16px;">Administrator PIN</small></div>
    <div class="container" style="width:200px;">
        <form method="post" action="php/login.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="form-group d-flex justify-content-center"><input class="form-control" type="password" name="pin" placeholder="PIN"></div>
            <div class="form-group"><input type="submit" value="Inloggen" class="btn btn-primary btn-block btn-lg"></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>
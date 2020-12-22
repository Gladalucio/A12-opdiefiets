<?php
require_once "functions.php";
db_connect();

session_destroy();

redirect_to("../logout.php");

<?php
require_once __DIR__ . "/../config/session_config.php";
echo "Session before destruction:<br>";

session_unset();
session_destroy();
echo "Session after destruction:<br>";


 header("location: ../auth/login.php");
?>
<?php
date_default_timezone_set("America/Lima");
$servername = "localhost";
$database = "u149885982_portalstp";
$username = "u149885982_weadminstp";
$password = "Sixta*123456";
$mysqli = new mysqli($servername, $username, $password, $database);
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
?>
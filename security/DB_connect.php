<?php

$server = "sql100.ezyro.com";
$user = "ezyro_39640403";
$password = "d5caab485af";
$database = "ezyro_39640403_x_forum";

$conn = mysqli_connect($server, $user, $password, $database);

if(!$conn) {
    die("Commection Error". mysqli_connect_error());
}
?>
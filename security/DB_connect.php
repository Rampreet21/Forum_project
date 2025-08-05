<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "x_forum";

$conn = mysqli_connect($server, $user, $password, $database);

if(!$conn) {
    die("Commection Error". mysqli_connect_error());
}
?>
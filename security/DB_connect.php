<?php

$server = "localhost";
$user = "root";
$password = "";
// $database = "forum"; // set your database name

$conn = mysqli_connect($server, $user, $password, $database);

if(!$conn) {
    die("Commection Error". mysqli_connect_error());
}
?>

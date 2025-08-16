<?php

$server = "localhost";
$user = "root"; 
$password = "";
// $dbname = "";


$conn = mysqli_connect($server, $user, $password, $dbname);

if(!$conn) {
    die("Commection Error". mysqli_connect_error());
}
?>
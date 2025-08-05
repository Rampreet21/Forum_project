<?php

$server = "db.us-losa1.bengt.wasmernet.com";
$user = "22e3c590723c80001159b33c1d21";
$password = "068922e3-c590-7563-8000-80213cd4c006";
// $database = "dbmK3ksj9PzcWsBTpcFQUqEy";

$conn = mysqli_connect($server, $user, $password);

if(!$conn) {
    die("Commection Error". mysqli_connect_error());
}
?>
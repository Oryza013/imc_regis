<?php
$host = "localhost";
$database = "imc";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $database);
mysqli_set_charset($conn,"utf8");
?>
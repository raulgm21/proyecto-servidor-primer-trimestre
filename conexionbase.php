<?php

// ************************************************************* //
// ************ BASE DE DATOS - CREACIÓN Y CONEXIÓN ************ //
// ************************************************************* //   

$servername     = "localhost";
$username       = "root";
$password       = "";
$database       = "biblioteca";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {die("Conexión Fallida: " . $conn->connect_error);}

// ************************************************************* //
// ************ BASE DE DATOS - CREACIÓN Y CONEXIÓN ************ //
// ************************************************************* //   

?>
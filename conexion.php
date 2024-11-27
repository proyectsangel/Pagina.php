<?php

$servername = "localhost";
$database = "sistemadeventas"; // nombre de la base de datos
$username = "root"; 
$password = ""; 

// Se crea la conexion a la base de datos
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Establecer el conjunto de caracteres para evitar problemas de codificación
if (!mysqli_set_charset($conn, "utf8")) {
    die("Error al establecer el conjunto de caracteres: " . mysqli_error($conn));
}


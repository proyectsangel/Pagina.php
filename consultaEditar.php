<?php
include 'conexion.php';

// Obtener valores del formulario
$IDempleado = $_POST['idEmpleado2']; 
$Nombre = $_POST['nombreEmpleado2'];
$Apellidopat = $_POST['ApatEmpleado2'];
$Apellidomat = $_POST['MmatEmpleado2'];
$Numtelefono = $_POST['TelefonoEmpleado2'];
$Direccion = $_POST['DireccionEmpleado2'];
$rfc = $_POST['RfcEmpleado2'];


// Actualizar la tabla 'empleados'
$query_update = "UPDATE empleados SET 
    Nombre = '$Nombre', 
    Apellidopat = '$Apellidopat', 
    Apellidomat = '$Apellidomat', 
    Numtelefono = '$Numtelefono', 
    Direccion = '$Direccion', 
    rfc = '$rfc' 
    WHERE IDempleado = '$IDempleado'"; 

    //var_dump($query_update);

$result_update = mysqli_query($conn, $query_update);

if (!$result_update) {
    die("Error al actualizar empleado: " . mysqli_error($conn));
}

echo "Empleado actualizado correctamente.";
?>

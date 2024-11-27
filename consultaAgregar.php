<?php

include 'conexion.php';

// Verificamos que la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recibimos los datos del POST de forma segura
    $Nombre = mysqli_real_escape_string($conn, $_POST['nombreEmpleado']);
    $Apellidopat = mysqli_real_escape_string($conn, $_POST['ApatEmpleado']);
    $Apellidomat = mysqli_real_escape_string($conn, $_POST['MmatEmpleado']);
    $Numtelefono = mysqli_real_escape_string($conn, $_POST['TelefonoEmpleado']);
    $Direccion = mysqli_real_escape_string($conn, $_POST['DireccionEmpleado']);
    $rfc = mysqli_real_escape_string($conn, $_POST['RfcEmpleado']);
    
    // Crear la consulta SQL
    $query = "INSERT INTO empleados (Nombre, Apellidopat, Apellidomat, Numtelefono, Direccion, rfc) VALUES 
              ('$Nombre', '$Apellidopat', '$Apellidomat', '$Numtelefono', '$Direccion','$rfc')";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $query);

    // Comprobamos si la inserción fue exitosa
    if ($result) {
        // Devolvemos una respuesta en formato JSON para ser manejada en el AJAX
        echo json_encode(['success' => true, 'message' => 'Empleado guardado correctamente']);
    } else {
        // En caso de error, devolver una respuesta de error en JSON
        echo json_encode(['success' => false, 'message' => 'Error al guardar Empleado']);
    }
} else {
    // Si la solicitud no es POST, devolver un error
    echo json_encode(['success' => false, 'message' => 'Método de solicitud no válido']);
}
?>
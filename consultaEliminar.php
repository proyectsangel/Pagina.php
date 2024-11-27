<?php
include 'conexion.php'; // Se manda a llamar la conexion de la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idempleado = $_POST['IDempleado'];

    if (isset($idempleado) && !empty($idempleado)) {
        // Preparar la consulta de eliminación
        $sql = "UPDATE empleados SET guardar = 1 WHERE IDempleado = ?";
        
        // Preparar la sentencia SQL
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idempleado); // "i" es para entero

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "success"; // Si la eliminación es exitosa, responde "success"
        } else {
            echo "error"; // Si falla, responde "error"
        }

        // Cerrar la sentencia y la conexión
        $stmt->close();
    } else {
        echo "error"; // Si no se recibe el ID, responde "error"
    }

    // Cerrar la conexión
    $conn->close();
}
?>

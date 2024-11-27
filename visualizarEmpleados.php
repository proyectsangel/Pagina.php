<?php
include 'conexion.php';

    if (isset($_GET['IDempleado'])) {
        $id_g = $_GET['IDempleado'];
    
        // Realizar la consulta para obtener los datos del usuario y el ID del grupo
        $query = "SELECT *
                  FROM empleados
                  WHERE IDempleado = $id_g";
        
        $result = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($result) == 1) {
            $cct = mysqli_fetch_assoc($result);
    
            echo json_encode($cct);
        } else {
            // Si no se encontró el usuario, devolver un mensaje de error
            echo json_encode(['error' => 'Empleado no encontrado']);
        }
    } else {
        // Si no se recibió el parámetro 'id', devolver un mensaje de error
        echo json_encode(['error' => 'ID de empleado no proporcionado']);
    }
    
?>

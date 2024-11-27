<?php

// Incluir la conexión
include("conexion.php");

// Crear la consulta SQL para obtener todos los empleados
$sql = "SELECT * FROM empleados WHERE guardar = 0"; // Ajustar la bandera en 0
$result = mysqli_query($conn, $sql);


// Encabezado de la tabla HTML
$tabla = '
<br>
<div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px; width: 100%; gap: 20px;">
    <!-- Título de la página (centrado) -->
    <h2 style="font-size: 24px; font-weight: bold; margin-right: 20px;">Empleados de la Tienda</h2>

    <!-- Botón para abrir el modal (Agregar Empleado) -->
    <button class="btn btn-warning hover-scale" 
        style="height: 3.5rem; border-radius: 0.5rem; font-size: 14px; width: 140px; padding: 10px; box-shadow: 0 4px 8px rgba(255, 165, 0, 0.2); transition: all 0.3s ease;" 
        data-bs-placement="top" 
        title="Agregar Empleado" 
        data-bs-toggle="modal" 
        data-bs-target="#agregarEmpleadoModal">
    <span class="svg-icon svg-icon-muted svg-icon-1">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7 3.3C19.7 2.3 18.3 2.3 17.3 3.3L14.7 5.9L18.1 9.3L20.7 6.7C21.7 5.7 21.7 4.2 20.7 3.3ZM18.2 10.3L14.9 13.7L10.7 12.4L9.4 16.6L13.7 17.9C13.8 18 13.9 18 14 18C14.2 18 14.3 17.9 14.4 17.8L19.1 14.7C19.7 14.3 19.9 13.6 19.5 13L18.2 10.3Z" fill="currentColor"/>
        </svg>
    </span>
    <span>Agregar</span>
</button>

    <!-- Botón para Cerrar Sesión (Naranja) -->
    <a href="login.php" class="btn" 
       style="background-color: #ff7f00; color: white; height: 3.5rem; border-radius: 0.5rem; font-size: 14px; padding: 10px 20px; box-shadow: 0 4px 8px rgba(255, 165, 0, 0.3); transition: all 0.3s ease; width: 180px; display: flex; align-items: center; justify-content: center;">
        Cerrar sesión
    </a>
</div>



<div id="kt_docs_search_handler_responsive" class="d-flex align-items-center w-lg-300px mx-2 card-toolbar">
     <div class="input-group rounded">
       <input id="search" class="form-control rounded card-item-alto" placeholder="Buscar Empleado" aria-label="Search" aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
    <i class="fas fa-search"></i>
    </span>
    </div>
</div>
<br>
<table id="tabla-conf" class="table table-striped table-bordered table-hover" style="font-size: 14px; width: 100%; border-collapse: collapse; border-radius: 10px; overflow: hidden;">
    <thead class="thead-dark" style="background-color: #007bff; color: #fff;">
        <tr class="text-center">
            <th class="min-w-50px" style="border: 2px solid #dee2e6; padding: 12px; font-weight: bold;">ID Empleado</th>
            <th class="min-w-150px" style="border: 2px solid #dee2e6; padding: 12px; font-weight: bold;">Nombre</th>
            <th class="min-w-150px" style="border: 2px solid #dee2e6; padding: 12px; font-weight: bold;">Apellido Paterno</th>
            <th class="min-w-150px" style="border: 2px solid #dee2e6; padding: 12px; font-weight: bold;">Apellido Materno</th>
            <th class="min-w-100px" style="border: 2px solid #dee2e6; padding: 12px; font-weight: bold;">Teléfono</th> 
            <th class="min-w-200px" style="border: 2px solid #dee2e6; padding: 12px; font-weight: bold;">Dirección</th> 
            <th class="min-w-100px" style="border: 2px solid #dee2e6; padding: 12px; font-weight: bold;">RFC</th>
            <th class="min-w-150px" style="border: 2px solid #dee2e6; padding: 12px; font-weight: bold;">Operaciones</th>
        </tr>
    </thead>
    <tbody style="background-color: #f8f9fa;">
';

// Verificar si la consulta devolvió resultados
if (mysqli_num_rows($result) > 0) {
    // Recorremos cada fila de la consulta
    while ($row = mysqli_fetch_assoc($result)) {
        // Concatenar cada fila de datos en la tabla HTML
        $tabla .= "
        <tr>
            <td style='border: 1px solid #ddd; padding: 8px; text-align: center;'>{$row['IDempleado']}</td>
            <td style='border: 1px solid #ddd; padding: 8px;'>{$row['Nombre']}</td>
            <td style='border: 1px solid #ddd; padding: 8px;'>{$row['Apellidopat']}</td>
            <td style='border: 1px solid #ddd; padding: 8px;'>{$row['Apellidomat']}</td>
            <td style='border: 1px solid #ddd; padding: 8px;'>{$row['Numtelefono']}</td>
            <td style='border: 1px solid #ddd; padding: 8px;'>{$row['Direccion']}</td>
            <td style='border: 1px solid #ddd; padding: 8px;'>{$row['rfc']}</td>
            <td class='text-center'>
                <!-- Botón para Editar -->
                <button class='btn btn-success hover-scale' style='height: 3.5rem; border-radius: 0.5rem; font-size: 14px; width: 120px; padding: 8px;' 
                    data-bs-placement='top' 
                    title='Editar Empleado' 
                    data-bs-toggle='modal' 
                    onClick='usar_id({$row['IDempleado']})' 
                    data-bs-target='#editarEmpleadoModal'>
                    <span class='svg-icon svg-icon-muted svg-icon-1'>
                        <svg width='18' height='18' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path opacity='0.3' fill-rule='evenodd' clip-rule='evenodd' d='M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z' fill='currentColor'/>
                            <path d='M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2015 13.4641 12.811 13.0736L10.9256 11.1882Z' fill='currentColor'/>
                        </svg>
                    </span>
                    <span>Editar</span>
                </button>

                <!-- Botón para Eliminar -->
                <button class='btn btn-danger hover-scale' style='height: 3.5rem; border-radius: 0.5rem; font-size: 14px; width: 120px; padding: 8px;' 
                    data-bs-placement='top' 
                    title='Eliminar Empleado' 
                    data-bs-toggle='modal' 
                    data-bs-target='#modalEliminarEmpleado' 
                    onclick='prepararEliminarEmpleado({$row['IDempleado']})'>
                    <span class='svg-icon svg-icon-muted svg-icon-1'>
                        <svg width='18' height='18' viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z' fill='currentColor'/>
                            <path opacity='0.5' d='M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z' fill='currentColor'/>
                            <path opacity='0.5' d='M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z' fill='currentColor'/>
                        </svg>
                    </span>
                    <span>Eliminar</span>
                </button>
            </td>
        </tr>";
    }
} else {
    $tabla .= "<tr><td colspan='8' style='text-align:center;'>No se encontraron resultados.</td></tr>";
}

$tabla .= '</tbody></table>';

// Mostrar la tabla en el navegador
echo $tabla;

// Cerrar la conexión a la base de datos
mysqli_close($conn);

?>


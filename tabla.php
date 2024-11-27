<!DOCTYPE html>
<html lang="es">

<?php
include 'head.php';
?>


<body>
    
   <?php
   include 'vista.php';
   include 'modalAgregar.php';
   include 'modalEditar.php';
   include 'modalEliminar.php';
   ?>



   <?php
   //script (librería) para hacer que funcione el modal
   include 'script.php';
   ?>
</body>
</html>

<script>
    // Function para visualizar el contenido al abrir el form(modal) editar
    function usar_id(IDempleado) {
            var url = "visualizarEmpleados.php?IDempleado=" + IDempleado;

            $.get(url, function(result) {
                var data = JSON.parse(result);
                cargarEmpleadoEnFormulario(data);
            });
        }

        function cargarEmpleadoEnFormulario(data) {
            $("#idEmpleado2").val(data.IDempleado);
            $("#nombreEmpleado2").val(data.Nombre);
            $("#ApatEmpleado2").val(data.Apellidopat);
            $("#MmatEmpleado2").val(data.Apellidomat);
            $('#TelefonoEmpleado2').val(data.Numtelefono);
            $("#DireccionEmpleado2").val(data.Direccion);
            $("#RfcEmpleado2").val(data.rfc);
        }

    //script para filtrar búsqueda de empleados 
    $(document).ready(function() {
        // Ejecutar búsqueda cuando se teclea algo en el input de búsqueda
        $('#search').on('keyup', function() {
            // Obtener el valor del campo de búsqueda
            const searchValue = this.value;
            // Almacenar el valor en el localStorage para mantener la búsqueda tras recargar
            localStorage.setItem("searchMat", searchValue);
            // Aplicar el filtro a la tabla
            filterTable(searchValue);
        });

        // Recuperar el valor de búsqueda de localStorage si existe
        function applySearchFromStorage() {
            const searchTxt = localStorage.getItem("searchMat");
            if (searchTxt) {
                $('#search').val(searchTxt);
                filterTable(searchTxt);
            }
        }

        // Filtrar la tabla según el valor de búsqueda
        function filterTable(query) {
            const rows = $('#tabla-conf tbody tr'); // Seleccionamos las filas de la tabla
            rows.each(function() {
                const row = $(this);
                const rowText = row.text().toLowerCase(); // Convertir todo el texto de la fila a minúsculas para la comparación
                if (rowText.indexOf(query.toLowerCase()) === -1) {
                    row.hide(); // Ocultamos la fila si no coincide con la búsqueda
                } else {
                    row.show(); // Mostramos la fila si coincide con la búsqueda
                }
            });
        }

        // Aplicar la búsqueda desde el localStorage al cargar la página
        applySearchFromStorage();
    });
</script>


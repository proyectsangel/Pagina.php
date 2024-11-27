<!-- Modal de Confirmación para Eliminar Empleado -->
<div class="modal fade" id="modalEliminarEmpleado" tabindex="-1" aria-labelledby="modalEliminarEmpleadoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarEmpleadoLabel">Eliminar Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar a este empleado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmarEliminarEmpleado">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
  let idEmpleadoEliminar = null;

// Función para preparar el modal con el ID del empleado a eliminar
function prepararEliminarEmpleado(idempleado) {
    idEmpleadoEliminar = idempleado; // Guardar el ID del empleado a eliminar
}

// Añadir el evento de click en el botón "Eliminar"
document.getElementById('confirmarEliminarEmpleado').addEventListener('click', function() {
    if (idEmpleadoEliminar !== null) {
        // Enviar la solicitud AJAX para eliminar el empleado
        $.ajax({
            url: 'consultaEliminar.php', // Archivo PHP que maneja la eliminación
            type: 'POST',
            data: { IDempleado: idEmpleadoEliminar }, // Enviar el ID del empleado
            success: function(response) {
                console.log('Respuesta del servidor:', response); // Verificar la respuesta del servidor
                if(response === 'success') {
                    alert('Empleado eliminado correctamente.');
                    $('#modalEliminarEmpleado').modal('hide'); // Cerrar el modal
                    location.reload(); // Recargar la página para reflejar los cambios
                } else {
                    alert('Hubo un error al eliminar al empleado.');
                }
            },
            error: function() {
                alert('Error de comunicación con el servidor.');
            }
        });
    } else {
        alert('No se ha seleccionado un empleado para eliminar.');
    }
});

</script>

<!-- Modal -->
<div class="modal fade" id="editarEmpleadoModal" tabindex="-1" aria-labelledby="editarEmpleadoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarEmpleadoModalLabel">Editar Empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="empleadoEditarForm">

          <input type="hidden" class="form-control" id="idEmpleado2" name="idEmpleado2">

          <div class="mb-3">
            <label for="nombreEmpleado2" class="form-label">Nombre(s) del Empleado</label>
            <input type="text" class="form-control" id="nombreEmpleado2" name="nombreEmpleado2" required>
          </div>
          <div class="mb-3">
            <label for="ApatEmpleado2" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="ApatEmpleado2" name="ApatEmpleado2" required>
          </div>
          <div class="mb-3">
            <label for="MmatEmpleado2" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" id="MmatEmpleado2" name="MmatEmpleado2" required>
          </div>
          <div class="mb-3">
            <label for="TelefonoEmpleado2" class="form-label">Numero de Telefono</label>
            <input type="text" class="form-control" id="TelefonoEmpleado2" name="TelefonoEmpleado2" required>
          </div>
          <div class="mb-3">
            <label for="DireccionEmpleado2" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="DireccionEmpleado2" name="DireccionEmpleado2" required>
          </div>
          <div class="mb-3">
            <label for="RfcEmpleado2" class="form-label">RFC</label>
            <input type="text" class="form-control" id="RfcEmpleado2" name="RfcEmpleado2" required>
          </div>
          <!-- Cambiar a type="submit" para usar el comportamiento estándar del formulario -->
          <button type="submit" class="btn btn-success btn-lg" style="width: 220px;">Editar</button>
          <button type="button" class="btn btn-light btn-lg" data-bs-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
 // Agregar el evento de submit al formulario
document.getElementById('empleadoEditarForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío predeterminado

    const Nombre = document.getElementById('nombreEmpleado2').value;
    const Apellidopat = document.getElementById('ApatEmpleado2').value;
    const Apellidomat = document.getElementById('MmatEmpleado2').value;
    const Numtelefono = document.getElementById('TelefonoEmpleado2').value;
    const Direccion = document.getElementById('DireccionEmpleado2').value;
    const Rfc = document.getElementById('RfcEmpleado2').value;
    const idEmpleado = document.getElementById('idEmpleado2').value;

    // Validar que todos los campos estén llenos
    if (!Nombre || !Apellidopat || !Apellidomat || !Numtelefono || !Direccion || !Rfc) {
      alert('Todos los campos son obligatorios.');
    } else {
      // Crear FormData para enviar los datos
      const formData = new FormData();
      formData.append('idEmpleado2', idEmpleado);
      formData.append('nombreEmpleado2', Nombre);
      formData.append('ApatEmpleado2', Apellidopat);
      formData.append('MmatEmpleado2', Apellidomat);
      formData.append('TelefonoEmpleado2', Numtelefono);
      formData.append('DireccionEmpleado2', Direccion);
      formData.append('RfcEmpleado2', Rfc);

      // Realizar la petición AJAX para editar el empleado
      fetch('consultaEditar.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        alert('Empleado Editado con éxito');
        location.reload(); // Recargar la página si es necesario
      })
      .catch(error => {
        alert('Error al editar el empleado');
        console.error(error);
      });
    }
});

</script>

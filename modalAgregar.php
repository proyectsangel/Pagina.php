<!-- Modal -->
<div class="modal fade" id="agregarEmpleadoModal" tabindex="-1" aria-labelledby="agregarEmpleadoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarEmpleadoModalLabel">Agregar Empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="empleadoForm">
          <div class="mb-3">
            <label for="nombreEmpleado" class="form-label">Nombre(s) del Empleado</label>
            <input type="text" class="form-control" id="nombreEmpleado" name="nombreEmpleado" required>
          </div>
          <div class="mb-3">
            <label for="ApatEmpleado" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="ApatEmpleado" name="ApatEmpleado" required>
          </div>
          <div class="mb-3">
            <label for="MmatEmpleado" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" id="MmatEmpleado" name="MmatEmpleado" required>
          </div>
          <div class="mb-3">
            <label for="TelefonoEmpleado" class="form-label">Numero de Telefono</label>
            <input type="text" class="form-control" id="TelefonoEmpleado" name="TelefonoEmpleado" required>
          </div>
          <div class="mb-3">
            <label for="DireccionEmpleado" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="DireccionEmpleado" name="DireccionEmpleado" required>
          </div>
          <div class="mb-3">
            <label for="RfcEmpleado" class="form-label">RFC</label>
            <input type="text" class="form-control" id="RfcEmpleado" name="RfcEmpleado" required>
          </div>
          <!-- Cambiar a type="submit" para usar el comportamiento estándar del formulario -->
          <button type="submit" class="btn btn-warning btn-lg" style="width: 200px;">Guardar</button>
          <button type="button" class="btn btn-light btn-lg" data-bs-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Agregar el evento de submit al formulario
  document.getElementById('empleadoForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío predeterminado

    const Nombre = document.getElementById('nombreEmpleado').value;
    const Apellidopat = document.getElementById('ApatEmpleado').value;
    const Apellidomat = document.getElementById('MmatEmpleado').value;
    const Numtelefono = document.getElementById('TelefonoEmpleado').value;
    const Direccion = document.getElementById('DireccionEmpleado').value;
    const Rfc = document.getElementById('RfcEmpleado').value;

    // Validar que todos los campos estén llenos
    if (!Nombre || !Apellidopat || !Apellidomat || !Numtelefono || !Direccion || !Rfc) {
      alert('Todos los campos son obligatorios.');
    } else {
      // Crear FormData para enviar los datos
      const formData = new FormData();
      formData.append('nombreEmpleado', Nombre);
      formData.append('ApatEmpleado', Apellidopat);
      formData.append('MmatEmpleado', Apellidomat);
      formData.append('TelefonoEmpleado', Numtelefono);
      formData.append('DireccionEmpleado', Direccion);
      formData.append('RfcEmpleado', Rfc);

      // Realizar la petición AJAX para agregar el empleado
      fetch('consultaAgregar.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        alert('Empleado agregado con éxito');
        location.reload(); // Recargar la página si es necesario
      })
      .catch(error => {
        alert('Error al agregar el empleado');
        console.error(error);
      });
    }
  });
</script>

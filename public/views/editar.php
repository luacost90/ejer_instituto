<?php
    require_once '../models/Alumno.php';
    $id = $_GET['id'];
    $alumnoModel = new Alumno();
    $alumno = $alumnoModel->obtenerAlumnoPorId($id);
?>

<form method="POST" class="form-actualizar">

    <h2>✏️ Editar Estudiante</h2>

    <div class="form-section">
      <h3>📂 Datos personales</h3>
      <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
      <label for="nombre">Nombre completo</label>
    <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($alumno['nombre']) ?>" required>

      <label for="nombre">Apellido</label>
    <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($alumno['apellido']) ?>" required>
      
      <label for="cedula">Cédula</label>
      <input type="text" id="cedula" name="cedula" value="<?= htmlspecialchars($alumno['cedula']) ?>" required>

      <label for="nacimiento">Fecha de nacimiento</label>
      <input type="date" id="nacimiento" name="nacimiento" value="<?= htmlspecialchars($alumno['fecha_nacimiento']) ?>">

      <label for="sexo">Sexo</label>
      <select id="sexo" name="sexo">
        <option value="masculino" selected>Masculino</option>
        <option value="femenino">Femenino</option>
      </select>
    </div>

    <div class="form-section">
      <h3>🎓 Datos académicos</h3>

      <label for="grado">Grado</label>
      <input type="text" id="grado" name="grado" value="<?= htmlspecialchars($alumno['grado']) ?>">

      <label for="seccion">Sección</label>
      <input type="text" id="seccion" name="seccion" value="<?= htmlspecialchars($alumno['seccion']) ?>">
    </div>

    <div class="form-section">
      <h3>👨‍👩‍👧 Representante</h3>
      <input type="hidden" name="id_representante" value="<?= htmlspecialchars($alumno['fk_representante']) ?>">
      <label for="nombre_representante">Nombre del representante</label>
      <input type="text" id="nombre_representante" name="nombre_representante" value="<?= htmlspecialchars($alumno['nombre_representante']) ?>">

      <label for="apellido_representante">Apellido del representante</label>
      <input type="text" id="apellido_representante" name="apellido_representante" value="<?= htmlspecialchars($alumno['apellido_representante']) ?>">

      <label for="telefono">Teléfono</label>
      <input type="tel" id="telefono" name="telefono" value="<?= htmlspecialchars($alumno['telefono_representante']) ?>">

      <label for="direccion">Dirección</label>
      <input type="text" id="direccion" name="direccion" value="<?= htmlspecialchars($alumno['direccion_representante']) ?>">
    </div>

    <div class="button-group">
      <button type="submit" class="save-btn">💾 Guardar</button>
      <button type="reset" class="cancel-btn">↩️ Cancelar</button>
      <button type="button" class="back-btn" onclick="window.history.back();">🔙 Volver</button>
    </div>

    <button type="submit" class="btn-actualizar" data-id="<?=$id?>">Actualizar</button>
</form>
<p><a href="./dashboard.php">← Volver al listado</a></p>
<script src="js/actualizar.js"></script>
<?php
    require_once '../models/Alumno.php';
    $id = $_GET['id'];
    $alumnoModel = new Alumno();
    $alumno = $alumnoModel->obtenerAlumnoPorId($id);
?>
<h2>Editar Alumno</h2>
<form method="POST" class="form-actualizar">

    <label>Nombre del Alumno:</label>
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="text" name="nombre" id="edit-nombre" value="<?= htmlspecialchars($alumno['nombre']) ?>" required>

    <button type="submit" class="btn-actualizar" data-id="<?=$id?>">Actualizar</button>
</form>
<p><a href="/alumnos">← Volver al listado</a></p>
<script src="js/actualizar.js"></script>
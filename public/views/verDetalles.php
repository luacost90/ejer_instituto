<?php
    require_once '../models/Alumno.php';
    $id = $_GET['id'];
    $alumnoModel = new Alumno();
    $alumno = $alumnoModel->obtenerAlumnoPorId($id);
?>
<h2>
    Detalles de la entidad: <?= $alumno['nombre'] ?>
</h2>
<button id="btn-inscripcion" data-id=<?=$id?>>Constancia de Inscripción</button>
<button id="btn-estudios" data-id=<?=$id?>>Constancia de Estudios</button>
<script src="js/constancias.js"></script>
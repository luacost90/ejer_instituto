<?php
    require_once '../models/Alumno.php';
    $id = $_GET['id'];
    $alumnoModel = new Alumno();
    $alumno = $alumnoModel->obtenerAlumnoPorId($id);
?>
<div class="student-card">
  <div class="profile-header">
    <div class="info">
      <h2><?= htmlspecialchars($alumno['nombre']) ?></h2>
    <p>Cédula: <?= htmlspecialchars($alumno['cedula']) ?></p>
    <p>Edad: <?= htmlspecialchars($alumno['edad']) ?> años | Sexo: <?= ucfirst(htmlspecialchars($alumno['sexo'])) ?></p>
    </div>
  </div>

  <div class="section">
    <h3>Datos Académicos</h3>
    <p>Plantel: <?= htmlspecialchars($alumno['nombre_plantel']) ?></p>
    <p>Grado: <?= htmlspecialchars($alumno['grado']) ?> | Sección: <?= htmlspecialchars($alumno['seccion']) ?></p>
    <p>Año Escolar: <?= htmlspecialchars($alumno['anio_inicio']) ?> - <?= htmlspecialchars($alumno['anio_fin']) ?></p>
  </div>

  <div class="section">
    <h3>Representante</h3>
    <p>Nombre: <?= htmlspecialchars($alumno['nombre_representante']) ?></p>
    <p>Teléfono: <?= htmlspecialchars($alumno['telefono_representante']) ?></p>
    <p>Dirección: <?= htmlspecialchars($alumno['direccion_representante']) ?></p>
  </div>

  <div class="section">
    <h3>Documentos</h3>
    <button id="btn-inscripcion" data-id=<?=$id?>>📄Constancia de Inscripción</button>
    <button id="btn-estudios" data-id=<?=$id?>>📄Constancia de Estudios</button>
  </div>
</div>
<script src="js/constancias.js"></script>
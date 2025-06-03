<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../models/Alumno.php';

    use Mpdf\Mpdf;

    $id = $_GET['id'] ?? null;

    if (!$id) {
        die("ID no proporcionado.");
    }

    $alumnoModel = new Alumno();
    $alumno = $alumnoModel->obtenerAlumnoPorId($id); // Método que tú defines 

    if (!$alumno) {
        die("Alumno no encontrado.");
    }

    $mpdf = new Mpdf();
    $html = "
        <h1>Constancia de Estudio</h1>
        <p>Alumno: {$alumno['nombre']}</p>
        <p>Representante ID: {$alumno['id_representante']}</p>
    ";

    $mpdf->WriteHTML($html);
    $mpdf->Output('constancia-estudios.pdf', 'I');

?>
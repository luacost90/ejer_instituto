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
        <style>
            body { font-family: Arial, sans-serif; }
            .header { text-align: center; margin-bottom: 30px; }
            .logo { width: 120px; margin-bottom: 10px; }
            .section { margin-bottom: 15px; }
            .label { font-weight: bold; }
            .content { margin-left: 10px; }
            .footer { margin-top: 40px; text-align: right; }
        </style>
        <div class='header'>
            <img src='../public/img/LOGO.jpg' class='logo' alt='Logo de la Institución'>
            <h1>Constancia de Inscripción</h1>
            <p>La presente certifica que el alumno ha sido inscrito en nuestra institución.</p>
        </div>
        <div class='section'>
            <span class='label'>Nombre completo:</span>
            <span class='content'>{$alumno['nombre']}</span>
        </div>
        <div class='section'>
            <span class='label'>Cédula/RIF:</span>
            <span class='content'>{$alumno['cedula']}</span>
        </div>
        <div class='section'>
            <span class='label'>Fecha de nacimiento:</span>
            <span class='content'>{$alumno['fecha_nacimiento']}</span>
        </div>
        <div class='section'>
            <span class='label'>Dirección:</span>
            <span class='content'>{$alumno['direccion_representante']}</span>
        </div>
        <div class='section'>
            <span class='label'>Teléfono:</span>
            <span class='content'>{$alumno['telefono_representante']}</span>
        </div>
        <div class='section'>
            <span class='label'>Grado:</span>
            <span class='content'>{$alumno['grado']}</span>
        </div>
        <div class='section'>
            <span class='label'>Sección:</span>
            <span class='content'>{$alumno['seccion']}</span>
        </div>
        <div class='footer'>
            <p>Fecha de emisión: " . date('d/m/Y') . "</p>
            <p>__________________________<br>Firma y Sello</p>
        </div>
    ";

    $mpdf->WriteHTML($html);
    $mpdf->Output('constancia-inscripcion.pdf', 'I');

?>
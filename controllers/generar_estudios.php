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
        <div style='text-align: center;'>
            <img src='../public/img/LOGO.jpg' class='logo' alt='Logo de la Institución' style='width: 100px; height: auto; margin-bottom: 10px;'>
            <h2>{$alumno['nombre_plantel']}</h2>
            <h3>Constancia de Estudios</h3>
        </div>
        <p>Por medio de la presente se hace constar que el(la) alumno(a): <strong>{$alumno['nombre']}</strong>, con cédula escolar <strong>{$alumno['cedula']}</strong>, está inscrito(a) en nuestra institución durante el presente año escolar {$alumno['anio_inicio']} - {$alumno['anio_fin']}.</p>
        <p>Representante: <strong>{$alumno['nombre_representante']}</strong> (de cédula: {$alumno['cedula_representante']})</p>
        <br>
        <p>Se expide la presente constancia a solicitud de la parte interesada en la ciudad de San Carlos de Austria, Edo Cojedes, a la fecha " . date('d/m/Y') . ".</p>
        <br><br>
        <div style='text-align:right;'>
            <p>__________________________<br>
            Firma y Sello</p>
        </div>
    ";


    $mpdf->WriteHTML($html);
    $mpdf->Output('constancia-estudios.pdf', 'I');

?>
<?php
require_once '../controllers/AlumnoController.php';

$path = $_GET['action'] ?? '';

switch($path){
    
    case 'registrar':
        (new AlumnoController())->registrar();
        break;
    case 'buscar-representante':
        (new AlumnoController())->buscarRepresentante();
        break; 

    default:
        http_response_code(404);
}

?>
<?php
require_once '../controllers/AlumnoController.php';
require_once '../controllers/PlantelController.php';
require_once '../controllers/AuthController.php';

$path = $_GET['action'] ?? '';

switch($path){
    
    case 'registrar':
        (new AlumnoController())->registrar();
        break;
        
    case 'buscar-representante':
        (new AlumnoController())->buscarRepresentante();
        break; 

    case 'listar':
        (new AlumnoController())->listar();
        break;

    case 'editar':
        (new AlumnoController())->editar();
        break;

    case 'editar':
        (new AlumnoController())->verEditar();
        break;

    case 'editar':
        (new AlumnoController())->verDetalles();
        break;

    case 'eliminar':
        (new AlumnoController())->eliminar();
        break;

    case 'registrarPlantel':
        (new PlantelController())->registrarPlantel();
        break;

    case 'obtenerTodosPlanteles':
        (new PlantelController())->obtenerTodos();
        break;

    case 'login':
        (new AuthController())->login();
        break;
    default:
        http_response_code(404);
}

?>
<?php
    // require_once '../database/Database.php';

    // $conn = new Database();
    // $pdo = $conn->getConnection();

    // $cedula = $_POST['cedula_representante'] ?? '';
    // $statement = $pdo->prepare("SELECT id FROM representantes WHERE cedula = ?");
    // $statement->execute([$cedula]);

    // if($rep = $statement->fetch()){
    //     echo json_encode(["existe" => true, "id" => $rep['id']]);
    // } else {
    //     echo json_encode(["existe" => false]);
    // }


    require_once '../models/Representante.php';

    $representantes = new Representante();

    $cedula = $_POST['cedula_representante'] ?? null;

    header('Content-Type: application/json');

    if(!$cedula){
        echo json_encode(["existe" => false, "error" => "Cédula no proporcionada"]);
        exit;
    }

    try {
        $data = $representantes->buscarRepresentante($cedula);

        if($rep = $data->fetch()){
            echo json_encode(["existe" => true, "id" => $rep['id']]);
        }else{
            echo json_encode(["existe" => false]);
        }
    } catch (Exception $e) {
        echo json_encode(["existe" => false, "error" => $e->getMessage()]);
    }
    
?>
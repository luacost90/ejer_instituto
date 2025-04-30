<?php

    // require_once '../database/Database.php';

    // $conn = new Database();
    // $pdo = $conn->getConnection();

    // $nombre = $_POST['nombre_alumno'] ?? '';
    // $id_representante = $_POST['id_representante'] ?? 0;

    // $statement = $pdo->prepare("INSERT INTO alumnos (nombre, id_representante) VALUES (?,?)");
    // if($statement->execute([$nombre, $id_representante])){
    //     echo "Alumno registrado";
    // }else{
    //     echo "Error al registrar alumno";
    // }

    require_once '../models/Alumno.php';

    
    $nombre = $_POST['nombre_alumno'] ?? null;
    $id_representante = $_POST['id_representante'] ?? 0;
    
    if(!$nombre || !$id_representante){
        echo json_encode(["existe" => false, "error" => "Nombre o representante no proporcionado"]);
        exit;
    }
    
    try {
        $resultado = new Alumno();
        $resultado->nombre = $nombre;
        $resultado->id_representante = $id_representante;

        $resultado->guardarAlumno();

        if($resultado){
            echo json_encode(["success" => true, "message" => "Alumno registrado correctamente"]);
        }else{
            echo json_encode(["success" => true, "message" => "Error al registrar alumno"]);
        }

    } catch (Exception $e) {
        echo json_encode(["existe" => false, "error" => $e->getMessage()]);
    }

?>
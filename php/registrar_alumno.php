<?php

    require_once '../database/Database.php';

    $conn = new Database();
    $pdo = $conn->getConnection();

    $nombre = $_POST['nombre_alumno'] ?? '';
    $id_representante = $_POST['id_representante'] ?? 0;

    $statement = $pdo->prepare("INSERT INTO alumnos (nombre, id_representante) VALUES (?,?)");
    if($statement->execute([$nombre, $id_representante])){
        echo "Alumno registrado";
    }else{
        echo "Error al registrar alumno";
    }

?>
<?php
    require_once '../database/Database.php';

    $conn = new Database();
    $pdo = $conn->getConnection();

    $nombre = $_POST['nombre_representante'] ?? '';
    $cedula = $_POST['cedula_representante'] ?? '';

    try{

        $statement = $pdo->prepare("INSERT INTO representantes (cedula, nombre) VALUES (?, ?)");

        $statement->execute([$cedula, $nombre]);

        echo json_encode(["success" => true, "id"=> $pdo->lastInsertId()]);

    }catch(Exception $e){

        echo json_encode(["success" => false, "error"=> $e->getMessage()]);
    }   

?>
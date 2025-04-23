<?php
    require_once '../database/Database.php';

    $conn = new Database();
    $pdo = $conn->getConnection();

    $cedula = $_POST['cedula_representante'] ?? '';
    $statement = $pdo->prepare("SELECT id FROM representantes WHERE cedula = ?");
    $statement->execute([$cedula]);

    if($rep = $statement->fetch()){
        echo json_encode(["existe" => true, "id" => $rep['id']]);
    } else {
        echo json_encode(["existe" => false]);
    }
?>
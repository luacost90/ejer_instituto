<?php
require_once 'database/Database.php';

$db = new Database();
$conn = $db->getConnection();

$password = password_hash("admin123", PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (username, password) VALUES ('admin', :password)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':password', $password);
$stmt->execute();

echo "Usuario admin creado";
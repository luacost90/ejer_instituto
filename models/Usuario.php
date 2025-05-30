<?php
    require_once '../database/Database.php';

    class Usuario{
        private $conn;

        public function __construct(){
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function autenticar($username, $password){
            $sql = "SELECT * FROM usuarios WHERE username = :username";
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(':username', $username);
            $statement->execute();

            $usuario = $statement->fetch(PDO::FETCH_ASSOC);

            if($usuario && password_verify($password, $usuario['password'])){
                return $usuario;
            }

            return false;


        }
    }
?>
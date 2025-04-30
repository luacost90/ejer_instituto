<?php
    require_once '../database/Database.php';

    class Representante{
        public $cedula;
        public $nombre;

        private $conn;

        public function __construct(){
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function buscarRepresentante($cedula){
            try {
                $sql = "SELECT id from representantes WHERE cedula = :cedula";

                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':cedula', $cedula);

                $statement->execute();

                return $statement;

            } catch (PDOException $e) {
                echo "Error al buscar representante: " . $e->getMessage();
                return false;
            }
        }

        public function registrarRepresentante(){
            try {
                $sql = "INSERT INTO representantes (cedula, nombre) VALUES (:cedula, :nombre)";

                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':cedula', $this->cedula);
                $statement->bindParam(':nombre', $this->nombre);
                $statement->execute();


                return  $this->conn->lastInsertId();

            } catch (PDOException $e) {
                echo "Error al registrar representante: " . $e->getMessage();
                return false;
            }
        }
     
    }



?>
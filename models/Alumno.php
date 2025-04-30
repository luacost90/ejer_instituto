<?php
    require_once '../database/Database.php';

    class Alumno{
        public $nombre;
        public $id_representante;
        
        
        private $conn;

        public function __construct(){
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function guardarAlumno(){

            try {
                $sql = "INSERT INTO alumnos (nombre, id_representante) VALUES (:nombre, :id_representante)";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':nombre', $this->nombre);
                $statement->bindParam(':id_representante', $this->id_representante);
                return $statement->execute();
            } catch (PDOException $e) {
                echo "Error al guardar alumno: " . $e->getMessage();
                return false;
            }

        }
    }


?>
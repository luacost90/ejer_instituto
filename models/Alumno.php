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

        public function obtenerAlumnoPorId($id){
            try {
                $sql = "SELECT a.id, a.nombre, r.nombre AS nombre_representante, r.cedula 
                        FROM alumnos a 
                        JOIN representantes r ON a.id_representante = r.id 
                        WHERE a.id = :id";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->execute();
                return $statement->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return false;
            }
        }

        public function listarAlumnos(){
            try {
                
                $sql = "SELECT a.id, a.nombre, r.nombre AS nombre_representante, r.cedula FROM alumnos a JOIN representantes r ON a.id_representante = r.id";

                $statement = $this->conn->prepare($sql);
                $statement->execute();

                return $statement->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                return $e;
            }
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

        public function eliminarAlumno($id){

            try {
                $sql = "DELETE FROM alumnos WHERE id = :id";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':id', $id);

                return $statement->execute();
                
            } catch (PDOException $e) {
                return false;
            }
        }

        public function actualizarAlumno($id, $nombre){
            try {
                $sql = "UPDATE alumnos SET nombre = :nombre Where id = :id";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':nombre', $nombre);
                $statement->bindParam(':id', $id);

                return $statement->execute();

            } catch (PDOEXception $e) {

                return false;

            }
        }
    }


?>
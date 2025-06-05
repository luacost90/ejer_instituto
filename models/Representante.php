<?php
    require_once '../database/Database.php';

    class Representante{
        public $cedula;
        public $nombre;
        public $apellido;
        public $telefono;
        public $direccion;

        private $conn;

        public function __construct(){
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function buscarRepresentante($cedula){
            try {
                $sql = "SELECT id_representante from representante WHERE cedula = :cedula";

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
                $sql = "INSERT INTO representante (cedula, nombre, apellido, telefono, direccion) VALUES (:cedula, :nombre, :apellido, :telefono, :direccion)";

                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':cedula', $this->cedula);
                $statement->bindParam(':nombre', $this->nombre);
                $statement->bindParam(':apellido', $this->apellido);
                $statement->bindParam(':telefono', $this->telefono);
                $statement->bindParam(':direccion', $this->direccion);
                $statement->execute();


                return  $this->conn->lastInsertId();

            } catch (PDOException $e) {
                echo "Error al registrar representante: " . $e->getMessage();
                return false;
            }
        }

        public function editarRepresentante($data) {
            try {
                $sql = "UPDATE representante SET cedula = :cedula, nombre = :nombre, apellido = :apellido, telefono = :telefono, direccion = :direccion WHERE id_representante = :id";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':cedula', $data['cedula']);
                $statement->bindParam(':nombre', $data['nombre']);
                $statement->bindParam(':apellido', $data['apellido']);
                $statement->bindParam(':telefono', $data['telefono']);
                $statement->bindParam(':direccion', $data['direccion']);
                $statement->bindParam(':id', $data['id'], PDO::PARAM_INT);
                return $statement->execute();
            } catch (PDOException $e) {
                echo "Error al editar representante: " . $e->getMessage();
                return false;
            }
        }
     
    }



?>
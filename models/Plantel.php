<?php
    require_once '../database/Database.php';

    class Plantel{
        public $eponimo;
        public $codigo_dea;
        public $nombre;
        public $apellido;
        public $cedula;
        public $telefono;
        public $tipo_matricula;

        private $conn;

        public function __construct(){
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function guardarPlantel(){
             try {
                $sql = "INSERT INTO plantel (eponimo, codigo_dea, nombre, apellido, cedula, telefono, tipo_matricula) VALUES (:eponimo, :codigo_dea, :nombre, :apellido, :cedula, :telefono, :tipo_matricula)";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':eponimo', $this->eponimo);
                $statement->bindParam(':codigo_dea', $this->codigo_dea);
                $statement->bindParam(':nombre', $this->nombre);
                $statement->bindParam(':apellido', $this->apellido);
                $statement->bindParam(':cedula', $this->cedula);
                $statement->bindParam(':telefono', $this->telefono);
                $statement->bindParam(':tipo_matricula', $this->tipo_matricula);
                return $statement->execute();
            } catch (PDOException $e) {
                echo "Error al guardar alumno: " . $e->getMessage();
                return false;
            }
        }

        public function obtenerTodosPlanteles() {
            try {
                $sql = "SELECT * FROM plantel";
                $statement = $this->conn->prepare($sql);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error al obtener planteles: " . $e->getMessage();
                return false;
            }
        }
    }

?>
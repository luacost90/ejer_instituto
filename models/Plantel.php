<?php
    require_once '../database/Database.php';

    class Plantel{
        public $eponimo;
        public $codigo_dea;
        public $nombre;
        public $cedula;
        public $telefono;
        public $seccion;
        public $tipo_matricula;
        public $grado;

             
        private $conn;

        public function __construct(){
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function guardarPlantel(){
             try {
                $sql = "INSERT INTO plantel (eponimo, codigo_dea, nombre, cedula, telefono, seccion, tipo_matricula, grado) VALUES (:eponimo, :codigo_dea, :nombre, :cedula, :telefono, :seccion, :tipo_matricula, :grado)";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':eponimo', $this->eponimo);
                $statement->bindParam(':codigo_dea', $this->codigo_dea);
                $statement->bindParam(':nombre', $this->nombre);
                $statement->bindParam(':cedula', $this->cedula);
                $statement->bindParam(':telefono', $this->telefono);
                $statement->bindParam(':seccion', $this->seccion);
                $statement->bindParam(':tipo_matricula', $this->tipo_matricula);
                $statement->bindParam(':grado', $this->grado);
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
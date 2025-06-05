<?php
    require_once '../database/Database.php';

    class Alumno{

        public $cedula;
        public $nombre;
        public $apellido;
        public $fecha_nacimiento;
        public $edad;
        public $sexo;
        public $seccion;
        public $grado;
        public $anio_inicio;
        public $anio_fin;
        public $fk_representante;
        public $fk_plantel;
        
        
        private $conn;

        public function __construct(){
            $database = new Database();
            $this->conn = $database->getConnection();
        }

        public function obtenerAlumnoPorId($id){
            try {
                $sql = "SELECT e.*, 
                               r.nombre AS nombre_representante,
                               r.apellido AS apellido_representante, 
                               r.cedula AS cedula_representante, 
                               r.telefono AS telefono_representante,
                               r.direccion AS direccion_representante,
                               p.eponimo AS nombre_plantel
                        FROM estudiante e
                        JOIN representante r ON e.fk_representante = r.id_representante
                        JOIN plantel p ON e.fk_plantel = p.id_plantel
                        WHERE e.id_estudiante = :id";
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
                
                $sql = "SELECT e.id_estudiante, e.nombre, r.nombre AS nombre_representante, r.cedula FROM estudiante e JOIN representante r ON e.fk_representante = r.id_representante";

                $statement = $this->conn->prepare($sql);
                $statement->execute();

                return $statement->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                return $e;
            }
        }

        public function guardarAlumno(){
            try {
                $sql = "INSERT INTO estudiante (cedula, nombre, apellido, fecha_nacimiento, edad, sexo, seccion, grado, anio_inicio, anio_fin, fk_representante, fk_plantel) VALUES (:cedula, :nombre, :apellido, :fecha_nacimiento, :edad, :sexo, :seccion, :grado, :anio_inicio, :anio_fin, :fk_representante, :fk_plantel)";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':cedula', $this->cedula);
                $statement->bindParam(':nombre', $this->nombre);
                $statement->bindParam(':apellido', $this->apellido);
                $statement->bindParam(':fecha_nacimiento', $this->fecha_nacimiento);
                $statement->bindParam(':edad', $this->edad);
                $statement->bindParam(':sexo', $this->sexo);
                $statement->bindParam(':seccion', $this->seccion);
                $statement->bindParam(':grado', $this->grado);
                $statement->bindParam(':anio_inicio', $this->anio_inicio);
                $statement->bindParam(':anio_fin', $this->anio_fin);
                $statement->bindParam(':fk_representante', $this->fk_representante);
                $statement->bindParam(':fk_plantel', $this->fk_plantel);
                return $statement->execute();
            } catch (PDOException $e) {
                echo "Error al guardar alumno: " . $e->getMessage();
                return false;
            }
        }

        public function eliminarAlumno($id){

            try {
                $sql = "DELETE FROM estudiante WHERE id_estudiante = :id";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':id', $id);

                return $statement->execute();
                
            } catch (PDOException $e) {
                return false;
            }
        }

        public function actualizarAlumno($data){
            try {
                $sql = "UPDATE estudiante SET 
                            cedula = :cedula,
                            nombre = :nombre,
                            apellido = :apellido,
                            fecha_nacimiento = :fecha_nacimiento,
                            sexo = :sexo,
                            seccion = :seccion,
                            grado = :grado
                        WHERE id_estudiante = :id_estudiante";
                $statement = $this->conn->prepare($sql);
                $statement->bindParam(':cedula', $data['cedula']);
                $statement->bindParam(':nombre', $data['nombre']);
                $statement->bindParam(':apellido', $data['apellido']);
                $statement->bindParam(':fecha_nacimiento', $data['fecha_nacimiento']);
                $statement->bindParam(':sexo', $data['sexo']);
                $statement->bindParam(':seccion', $data['seccion']);
                $statement->bindParam(':grado', $data['grado']);
                $statement->bindParam(':id_estudiante', $data['id']);
                return $statement->execute();

            } catch (PDOEXception $e) {

                return false;

            }
        }
    }


?>
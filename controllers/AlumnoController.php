<?php
    require_once '../models/Alumno.php';
    require_once '../models/Representante.php';

    class AlumnoController{

        public function registrar(){
            header('Content-Type: application/json');

            $nombreRep =$_POST['nombre_representante'] ?? null;
            $cedulaRep =$_POST['cedula_representante'] ?? null;
            $nombreAlumno = $_POST['nombre_alumno'] ?? null;

            if(!$nombreRep || !$cedulaRep || !$nombreAlumno){
                echo json_encode(["success" => false, "error" => "faltan datos"]);
                return;
            }

            $representante =  new Representante();
            $representante->nombre = $nombreRep;
            $representante->cedula = $cedulaRep;


            $result = $representante->buscarRepresentante($cedulaRep);

            if($fila = $result->fetch()){
                $idRepresentante = $fila["id"];
            }else{
                $idRepresentante = $representante->registrarRepresentante();
            }

            $alumno = new Alumno();
            $alumno->nombre = $nombreAlumno;
            $alumno->id_representante = $idRepresentante;

            if($alumno->guardarAlumno()){
                echo json_encode(["success"=> true, "message" => "Alumno registrado"]);
            }else{
                echo json_encode(["false"=> true, "message" => "Error al registrar"]);
            }
            
        }

        public function listar(){
            header("Content-Type: application/json");

            $alumno = new Alumno();
            $lista = $alumno->listarAlumnos();

            echo json_encode($lista);
        }

        public function eliminar(){
            $data = json_decode(file_get_contents('php://input'), true);
            $id = isset($data['id']) ? (int)$data['id'] : null;

            if(!$id){
                echo json_encode(["success" => false, "error" => "ID no proporcionado"]);
                return;
            }

            $alumnoModel = new Alumno();
            if($alumnoModel->eliminarAlumno($id)){
                echo json_encode(["success" => true]);
            }else{
                echo json_encode(["success" => false, "error" => "No se pudo eliminar"]);
            }
        }

        public function editar(){
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'] ?? null;

            if (!$id || !$nombre) {
                // echo json_encode(["success" => false, "error" => "Datos incompletos"]);
                echo json_encode(["error" => "Datos no proporcionados"]);
                return;
            }

            $alumnoModel = new Alumno();
            $alumnoModel->actualizarAlumno($id,$nombre);

            echo json_encode(["success" => true, "message" => "Se ha actualizado exitosamente"]);
            exit;
        }

        public function verEditar(){
            
            $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

            if(!$id){
                 echo json_encode(["success" => false, "error" => "id No proporcionado"]);
                return;
            }

            $alumnoModel = new Alumno();
            $alumno = $alumnoModel->obtenerAlumnoPorId($id);

            if(!$alumno){
                echo json_encode(["success" => false, "error" => "Alumno no encontrado"]);
                return;
            }

            echo json_encode($alumno);

        }
    }

?>
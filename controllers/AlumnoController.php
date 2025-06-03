<?php
    require_once '../models/Alumno.php';
    require_once '../models/Representante.php';

    class AlumnoController{

        public function registrar(){
            header('Content-Type: application/json');

            // Representante
            $cedulaRep =$_POST['cedula_representante'] ?? null;
            $nombreRep =$_POST['nombre_representante'] ?? null;
            $apellidoRep =$_POST['apellido_representante'] ?? null;
            $telefonoRep =$_POST['telefono_representante'] ?? null;
            
            //Alumno
            $cedulaAlumno = $_POST['cedula_alumno'] ?? null;
            $nombreAlumno = $_POST['nombre_alumno'] ?? null;
            $apellidoAlumno = $_POST['apellido_alumno'] ?? null;
            $fechaNacimientoAlumno = $_POST['fecha_nacimiento'] ?? null;
            $sexoAlumno = $_POST['sexo'] ?? null;
            $idPlantelAlumno = $_POST['fk_plantel'] ?? null;

            $edadAlumno = null;
            if ($fechaNacimientoAlumno) {
                $anioNacimiento = date('Y', strtotime($fechaNacimientoAlumno));
                $anioActual = date('Y');
                $edadAlumno = $anioActual - $anioNacimiento;
            }

            if(!$nombreRep || !$cedulaRep || !$nombreAlumno){
                echo json_encode(["success" => false, "error" => "faltan datos"]);
                return;
            }

            $representante =  new Representante();
            $representante->cedula = $cedulaRep;
            $representante->nombre = $nombreRep;
            $representante->apellido = $apellidoRep;
            $representante->telefono = $telefonoRep;


            $result = $representante->buscarRepresentante($cedulaRep);

            if($fila = $result->fetch()){
                $idRepresentante = $fila["id"];
            }else{
                $idRepresentante = $representante->registrarRepresentante();
            }

            $alumno = new Alumno();
            $alumno->cedula = $cedulaAlumno;
            $alumno->nombre = $nombreAlumno;
            $alumno->apellido = $apellidoAlumno;
            $alumno->fecha_nacimiento = $fechaNacimientoAlumno;
            $alumno->edad = $edadAlumno;
            $alumno->sexo = $sexoAlumno;
            $alumno->fk_representante = $idRepresentante;
            $alumno->fk_plantel = $idPlantel;

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
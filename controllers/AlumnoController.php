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
            $direccionRep =$_POST['direccion_representante'] ?? null;
            
            //Alumno
            $cedulaAlumno = $_POST['cedula_alumno'] ?? null;
            $nombreAlumno = $_POST['nombre_alumno'] ?? null;
            $apellidoAlumno = $_POST['apellido_alumno'] ?? null;
            $fechaNacimientoAlumno = $_POST['fecha_nacimiento'] ?? null;
            $sexoAlumno = $_POST['sexo'] ?? null;
            $seccionAlumno = $_POST['seccion_alumno'] ?? null;
            $gradoAlumno = $_POST['grado_alumno'] ?? null;
            $idPlantelAlumno = $_POST['fk_plantel'] ?? null;

            $anio_inicio = date('Y');
            $anio_fin = date('Y', strtotime('+1 year'));

            $edadAlumno = null;
            if ($fechaNacimientoAlumno) {
                $anioNacimiento = date('Y', strtotime($fechaNacimientoAlumno));
                $anioActual = date('Y');
                $edadAlumno = $anioActual - $anioNacimiento;
            }

            // Validar campos requeridos
            $requiredFields = [
                'cedula_representante' => $cedulaRep,
                'nombre_representante' => $nombreRep,
                'apellido_representante' => $apellidoRep,
                'telefono_representante' => $telefonoRep,
                'cedula_alumno' => $cedulaAlumno,
                'nombre_alumno' => $nombreAlumno,
                'apellido_alumno' => $apellidoAlumno,
                'fecha_nacimiento' => $fechaNacimientoAlumno,
                'sexo' => $sexoAlumno,
                'fk_plantel' => $idPlantelAlumno
            ];

            $missingFields = [];
            foreach ($requiredFields as $field => $value) {
                if (empty($value)) {
                    $missingFields[] = $field;
                }
            }

            if (!empty($missingFields)) {
                echo json_encode([
                    "success" => false,
                    "error" => "Faltan datos: " . implode(', ', $missingFields)
                ]);
                return;
            }

            $representante =  new Representante();
            $representante->cedula = $cedulaRep;
            $representante->nombre = $nombreRep;
            $representante->apellido = $apellidoRep;
            $representante->telefono = $telefonoRep;
            $representante->direccion = $direccionRep;


            $result = $representante->buscarRepresentante($cedulaRep);

            if($fila = $result->fetch()){
                $idRepresentante = $fila["id_representante"];
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
            $alumno->seccion = $seccionAlumno;
            $alumno->grado = $gradoAlumno;
            $alumno->anio_inicio = $anio_inicio;
            $alumno->anio_fin = $anio_fin;
            $alumno->fk_representante = $idRepresentante;
            $alumno->fk_plantel = $idPlantelAlumno;

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
            // Formulario de alumno
            $id = $_POST['id'] ?? null;
            $nombre = $_POST['nombre'] ?? null;
            $apellido = $_POST['apellido'] ?? null;
            $cedula = $_POST['cedula'] ?? null;
            $fecha_nacimiento = $_POST['nacimiento'] ?? null;
            $sexo = $_POST['sexo'] ?? null;
            $grado = $_POST['grado'] ?? null;
            $seccion = $_POST['seccion'] ?? null;

            // Formulario de representante
            $id_representante = $_POST['id_representante'];
            $nombre_representante = $_POST['nombre_representante'];
            $apellido_representante = $_POST['apellido_representante'];
            $telefono_representante = $_POST['telefono'];
            $direccion_representante = $_POST['direccion'];

            // Validar campos requeridos
            $requiredFields = [
                'id' => $id,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'cedula' => $cedula,
                'fecha_nacimiento' => $fecha_nacimiento,
                'sexo' => $sexo,
                'grado' => $grado,
                'seccion' => $seccion
            ];

            $missingFields = [];
            foreach ($requiredFields as $field => $value) {
                if (empty($value)) {
                    $missingFields[] = $field;
                }
            }

            if (!empty($missingFields)) {
                echo json_encode(["success" => false, "error" => "Faltan datos: " . implode(', ', $missingFields)]);
                return;
            }

            $datos = [
                'id' => $id,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'cedula' => $cedula,
                'fecha_nacimiento' => $fecha_nacimiento,
                'sexo' => $sexo,
                'grado' => $grado,
                'seccion' => $seccion
            ];

            $datos_representante = [
                'id' => $id_representante,
                'nombre' => $nombre_representante,
                'apellido' => $apellido_representante,
                'telefono' => $telefono_representante,
                'direccion' => $direccion_representante
            ];

            $alumnoModel = new Alumno();
            $representanteModel = new Representante();
            if ($alumnoModel->actualizarAlumno($datos) && $representanteModel->editarRepresentante($datos_representante)) {
                echo json_encode(["success" => true, "message" => "Se ha actualizado exitosamente"]);
            } else {
                echo json_encode(["success" => false, "error" => "No se pudo actualizar"]);
            }
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
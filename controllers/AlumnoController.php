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
    }

?>
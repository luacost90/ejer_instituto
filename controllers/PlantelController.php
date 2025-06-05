<?php
    require_once '../models/Plantel.php';

    class PlantelController{
        public function registrarPlantel() {
            header('Content-Type: application/json');

            // Obtener datos del formulario
            $eponimo = $_POST['eponimo'] ?? null;
            $codigo_dea = $_POST['codigo_dea'] ?? null;
            $nombre = $_POST['nombre'] ?? null;
            $apellido = $_POST['apellido'] ?? null;
            $cedula = $_POST['cedula'] ?? null;
            $telefono = $_POST['telefono'] ?? null;
            $tipo_matricula = $_POST['tipo_matricula'] ?? null;

            // Validar datos requeridos
            if (!$eponimo || !$codigo_dea || !$nombre || !$cedula) {
            echo json_encode(["success" => false, "error" => "Faltan datos obligatorios"]);
            return;
            }

            // Crear instancia del modelo Plantel
            $plantel = new Plantel();
            $plantel->eponimo = $eponimo;
            $plantel->codigo_dea = $codigo_dea;
            $plantel->nombre = $nombre;
            $plantel->apellido = $apellido;
            $plantel->cedula = $cedula;
            $plantel->telefono = $telefono;
            $plantel->tipo_matricula = $tipo_matricula;

            // Guardar plantel
            if ($plantel->guardarPlantel()) {
            echo json_encode(["success" => true, "message" => "Plantel registrado"]);
            } else {
            echo json_encode(["success" => false, "message" => "Error al registrar plantel"]);
            }
        }

        public function obtenerTodos() {
            header('Content-Type: application/json');
            $plantel = new Plantel();
            $resultados = $plantel->obtenerTodosPlanteles();
            if ($resultados !== false) {
                echo json_encode(["success" => true, "data" => $resultados]);
            } else {
                echo json_encode(["success" => false, "message" => "No se pudieron obtener los planteles"]);
            }
        }
    }

    

?>
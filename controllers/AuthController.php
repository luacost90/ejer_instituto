<?php
    session_start();
    require_once '../models/Usuario.php';

    class AuthController{

        public function login(){
            $username = $_POST['username'] ?? null;
            $password = $_POST['password'] ?? null;

            if(!$username  || !$password){
                echo json_encode(["success" => false, "message" => "Usuario o campos vacios"]);
                exit;
            }

            $usuarioModel = new Usuario();
            $usuario = $usuarioModel->autenticar($username, $password);

            if($usuario){
                $_SESSION['usuario'] =[
                    'id'=> $usuario['id_usuario'],
                    'nombre'=> $usuario['username']
                ];
                echo json_encode(["success" => true]);
                exit;
            }else{
                echo json_encode(["success" => false, "message" => "Usuario o contraseña incorrectos"]);
                exit;
            }
        }
    }
?>
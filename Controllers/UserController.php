<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Usuarios.php';


class UserController
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->getConexion();
    }

    public function insertData()
    {
        $email =  $_POST['email'];

        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $rol_id =  $_POST['rol'];

        $auth = new Usuarios;

        $auth->register($email,  $hash, $rol_id);
       # header('location: ../Views/tabla.php');

    }

    public function login()
    {
        $email =  $_POST['email'];

        $password =  $_POST['password'];

        $usuarios = new Usuarios;
        $user = $usuarios->select($email);

        if (password_verify($password, $user['password'])) {

            session_start();
            $_SESSION['userData'] =  $user;
            
            header('location: ../Views/info.php');
        } else {
            header('location: ../Views/login.php');

        }
 
    }
}


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

    public function index()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/tabla.php';
    }


    public function dashboard()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/dashboard.php';
    }



    #FUCIONA
    public function login()
    {
        $email =  $_POST['email'];
        $password =  $_POST['password'];
        $usuarios = new Usuarios;
        $user = $usuarios->select($email);

        $nombre_clase_master = $usuarios->traerClaseName($email);

        if (password_verify($password, $user['password'])) {

            session_start();
            $_SESSION['userData'] =  $user;
            $_SESSION['claseData'] =  $nombre_clase_master;


            header('location: ../index.php');
        } else {
            header('location: ../Views/login.php');
        }
    }


    #funciona ACTUALIZADO 
    public function registerTeacher()
    {

        $email =  $_POST['email'];
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nombres =  $_POST['nombres'];
        $apellidos =  $_POST['apellidos'];
        $direccion =  $_POST['direccion'];
        $fechaNacimiento =  $_POST['fechaNacimiento'];
        $claseAsignada =  $_POST['claseAsignada'];
        $rol_id = $_POST['rol'];

        $usuarios = new Usuarios;
        $usuarios->registerTeacher($email,  $rol_id, $nombres, $apellidos, $hash, $direccion, $fechaNacimiento, $claseAsignada);

        header('location:  index.php?controller=UserController&action=index');
    }

    #X METODO GET = ID 
    public function update()
    {
        $id = $_GET['id'];
        $email =  $_POST['email'];
        $nombres =  $_POST['nombres'];
        $apellidos =  $_POST['apellidos'];
        $direccion =  $_POST['direccion'];
        $fechaNacimiento =  $_POST['fechaNacimiento'];
        $claseAsignada =  $_POST['claseAsignada'];

        $usuarios = new Usuarios;
        $usuarios->update($email, $nombres, $apellidos, $direccion, $fechaNacimiento, $claseAsignada, $id);


        header('location:  index.php?controller=UserController&action=index');
    }



    public function destroy()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Usuarios;
            $usuario->delete($id, $usuario);

            header('location:  index.php?controller=UserController&action=index');
        }
    }

    public function logout()
    {
        session_destroy();
        header('location: ../Views/login.php');
    }
}

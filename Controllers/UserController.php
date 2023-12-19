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

    #FUNCIONA
    public function insertData()
    {
        $email =  $_POST['email'];
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rol_id =  $_POST['rol'];
        $auth = new Usuarios;
        $auth->register($email,  $hash, $rol_id);
       # header('location: ../Views/tabla.php');

    }

    #FUCIONA
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
    
    public function registerTeacher(){
        $email =  $_POST['email'];
        $nombres =  $_POST['nombres'];
        $apellidos =  $_POST['apellidos'];
        $direccion =  $_POST['direccion'];
        $fechaNacimiento =  $_POST['fechaNacimiento'];
        $claseAsignada =  $_POST['claseAsignada'];

        $usuarios= new Usuarios;
        $usuarios->registerTeacher($email, $nombres, $apellidos, $direccion, $fechaNacimiento, $claseAsignada);
        
        header('location: ../Views/tabla.php' ); 
    }

    public function update(){
        $email =  $_POST['email'];
        $nombres =  $_POST['nombres'];
        $apellidos =  $_POST['apellidos'];
        $direccion =  $_POST['direccion'];
        $fechaNacimiento =  $_POST['fechaNacimiento'];
        $claseAsignada =  $_POST['claseAsignada'];

        $usuarios= new Usuarios;
        $usuarios->update($email, $nombres, $apellidos, $direccion, $fechaNacimiento, $claseAsignada);
    
    }

    public function delete(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Usuarios;
            $usuario->delete($id);
        }
}

    public function selectTeacher()
    {
        $email =  $_POST['email'];
        $usuarios= new Usuarios;
        $usuarios->selectRegisterTeacher($email);
    }


    #actualizar los permisos de usuarios //FUNCIONA
    public function permisosController()
    {
        $email = $_POST['email'];
        $rol_id =  $_POST['rol'];
        $usuarios= new Usuarios;
        $usuarios->permisos($rol_id, $email);

    }
}

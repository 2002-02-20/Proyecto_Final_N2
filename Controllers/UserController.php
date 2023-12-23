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
        $a = new Usuarios();
        $b = $a->selectRegisterTeacher();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/tabla.php';

    }


    #FUNCIONA
    public function insertData()
    {
        $email =  $_POST['email'];
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rol_id =  $_POST['rol'];
        $auth = new Usuarios;
        $auth->register($email,  $hash, $rol_id);
       #header('location: ../Views/tabla.php');

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
            
            header('location: ../index.php');
            exit();

        } else {
            #header('location: ../index.php');

        }
 
    }
    
    #funciona ACTUALIZADO 
    public function registerTeacher(){

        $email =  $_POST['email'];
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $nombres =  $_POST['nombres'];
        $apellidos =  $_POST['apellidos'];
        $direccion =  $_POST['direccion'];
        $fechaNacimiento =  $_POST['fechaNacimiento'];
        $claseAsignada =  $_POST['claseAsignada'];
        $rol_id = $_POST['rol']; 



        $usuarios= new Usuarios;
        $usuarios->registerTeacher($email,  $rol_id, $nombres, $apellidos, $hash, $direccion, $fechaNacimiento, $claseAsignada);
        
        header('location:  index.php?controller=UserController&action=index');
    }

    public function update(){
        $id = $_POST['id'];
        $email =  $_POST['email'];
        $nombres =  $_POST['nombres'];
        $apellidos =  $_POST['apellidos'];
        $direccion =  $_POST['direccion'];
        $fechaNacimiento =  $_POST['fechaNacimiento'];
        $claseAsignada =  $_POST['claseAsignada'];

        $usuarios= new Usuarios;
        $usuarios->update($email, $nombres, $apellidos, $direccion, $fechaNacimiento, $claseAsignada, $id);


        header('location:  index.php?controller=UserController&action=index');

    }

    public function destroy() //Jairo
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Usuarios;
            $usuario->delete($id, $usuario);

            header('location:  index.php?controller=UserController&action=index');
        }
    }
    

    #actualizar los permisos de usuarios //FUNCIONA
    public function permisosController()
    {
        $email = $_POST['email'];
        $rol_id =  $_POST['rol'];
        $usuarios= new Usuarios;
        $usuarios->permisos($rol_id, $email);

       
        #header('location: ../Views/permisos.php');
        #exit();
        print_r($usuarios); 
    }

    public function logout()
    {
        session_destroy();
        header('location: ../index.php');
        exit();

    }
}


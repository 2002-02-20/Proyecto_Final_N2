<?php

/* require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Usuarios.php';
 */ require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Permisos.php';


class PermisosController
{

    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->getConexion();
    }


    public function selecRol()
    {
        $select = new Permisos();
        $selectRol = $select->selectRol();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/permisos.php';
    }


    public function permisosController()
    {
        $id = $_GET['id'];
        $email = $_POST['email'];
        $rol_id =  $_POST['rol_id'];
        $status = $_POST['status'];
        $status = isset($_POST['status']) ? 1 : 0;

        $usuario = new Permisos;
        $usuario->permisos($rol_id, $status, $id);

        header('location:  index.php?controller=PermisosController&action=selecRol');
    }
}

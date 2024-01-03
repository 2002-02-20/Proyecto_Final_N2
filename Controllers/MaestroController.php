<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Usuarios.php';


class MaestroController
{

    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->getConexion();
    }



    public function index()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/maestroClases.php';
    }


 

}

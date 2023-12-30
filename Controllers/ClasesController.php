<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Usuarios.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Clases.php';


class ClasesController
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->getConexion();
    }

    public function index()
    {
       require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/clases.php';
    }

    public function materias()
    {
        $select = new Clases();
        $selectClase = $select->materiasA();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/Views/clases.php';

    }


    public function agregarMateria()
    {
        $nombreMateria = $_POST['nombreMateria']; 
        
        $materia = new Clases;
        $agregarMat = $materia->agregarMateriaModel($nombreMateria); 
        header('location:  index.php?controller=ClasesController&action=index');

    }

    public function updateClases()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $nombre_clase = $_POST['materia']; 

            $update = new Clases;
            $clasesUpdate = $update->updateClaseController($nombre_clase, $id); 
            header('location:  index.php?controller=ClasesController&action=index');

        }
    }

    public function destroy() 
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $usuario = new Clases;
            $usuario->deleteClass($id, $usuario);

            header('location:  index.php?controller=ClasesController&action=index');
        }
    }

}
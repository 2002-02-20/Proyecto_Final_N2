<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Database.php';



class Maestros
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->getConexion();
    }


    public function allDataMaestros()
    {
        $query = 'SELECT * FROM informacion WHERE id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }



    
}
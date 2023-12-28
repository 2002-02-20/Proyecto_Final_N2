<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controllers/PermisosController.php';


class Permisos
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->getConexion();
    }


    public function selectRol()
    {
        $query = 'SELECT informacion.*, roles.id AS roles_id, roles.rol AS rol_nombre FROM informacion JOIN roles ON roles.id = informacion.rol_id';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function permisos($rol_id, $email)
    {
        $query = 'UPDATE `informacion` SET `rol_id`=? WHERE email = ?';
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$rol_id, $email]);
            $result = $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Database.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controllers/UserController.php';



class Usuarios
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->getConexion();
    }

    public function register($email, $password, $rol_id)
    {
        $query = "INSERT INTO usuarios(`email`, `password`, `rol_id`) VALUES (?,?,?)";
        
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email, $password, $rol_id]);

            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function registerTeacher($email, $nombres, $apellidos,  $direccion, $fechaNacimiento, $claseAsignada)
    {
        $query = "INSERT INTO informacion(`email`, `nombres`, `apellidos`, `direccion`, `fecha_nacimiento`, `clase_id`) VALUES (?,?,?,?,?,?)"; //
        
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email, $nombres, $apellidos,  $direccion, $fechaNacimiento, $claseAsignada]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
        

    public function update($email, $nombres, $apellidos, $direccion, $fechaNacimiento, $claseAsignada)
    {

        $query = "UPDATE `informacion` SET `email`=?, `nombres`= ?,`apellidos`=?,`direccion`=?, `fecha_nacimiento`=?, `clase_id`=?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email, $nombres, $apellidos, $direccion, $fechaNacimiento, $claseAsignada]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function select($email)
    {
        $query = 'SELECT * FROM usuarios WHERE email = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email]);

            $result = $stm->fetch(PDO::FETCH_ASSOC);

            return $result; 
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function delete($id)
    {
        $query = 'DELETE FROM informacion WHERE id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}


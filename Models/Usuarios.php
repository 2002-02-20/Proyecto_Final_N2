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

    
    #FUNCIONA
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

    public function select($email){
        $query = 'SELECT * FROM informacion WHERE email =?';

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


    #ACTUALIZADO FUNCIONA
    public function registerTeacher($email,  $rol_id, $nombres, $apellidos, $hash, $direccion, $fechaNacimiento, $claseAsignada)
    {
        $query = "INSERT INTO informacion(`email`, `rol_id`, `nombres`, `apellidos`, `password`, `direccion`, `fecha_nacimiento`, `clase_id`) VALUES (?,?,?,?,?,?,?,?)"; //
        
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email,  $rol_id, $nombres, $apellidos, $hash, $direccion, $fechaNacimiento, $claseAsignada]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

       #TRAER TODOS LOS MAESTROS A LA VISTA
    public function selectRegisterTeacher()
    {
        $query = 'SELECT * FROM informacion';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result; 
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function update($email, $nombres, $apellidos, $direccion, $fechaNacimiento, $claseAsignada, $id)
    {

        $query = "UPDATE `informacion` SET `email`=?, `nombres`= ?,`apellidos`=?,`direccion`=?, `fecha_nacimiento`=?, `clase_id`=? WHERE id=?";

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email, $nombres, $apellidos, $direccion, $fechaNacimiento, $claseAsignada, $id]);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    #PENDIENTE 
    public function selectJoin()
    {
        $query = 'SELECT informacion.*, clases.id AS clases_id, clases.clases AS clases_nombre FROM informacion JOIN clases ON clases.id = informacion.clase_id';


        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result; 
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    
    #actualizar los permisos de usuarios //FUNCIONA
    public function permisos($rol_id, $email)
    {
        $query = 'UPDATE `informacion` SET `rol_id`=? WHERE email=?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$rol_id, $email]);
            $result = $stm->fetch(PDO::FETCH_ASSOC);

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


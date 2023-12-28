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

    public function roles()
    {
        $query = 'SELECT * FROM roles';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

 
    public function select($email)
    {
        $query = 'SELECT * FROM informacion WHERE email =?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$email]);
            $result = $stm->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
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
        $query = 'SELECT informacion.*, clases.id AS clases_id, clases.clases AS clases_nombre FROM informacion LEFT JOIN clases ON clases.id = informacion.clase_id WHERE informacion.rol_id = 2';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function selectClases()
    {

        $query = 'SELECT * FROM clases JOIN informacion ON clase_id = clases.id';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function asignMateria($asignaruta_id, $id)
    {
        $query = "UPDATE `informacion` SET asignatura_id = ?  Where id=? ";
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$asignaruta_id, $id]);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function delete($id)
    {
        $query = 'DELETE FROM informacion WHERE id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}


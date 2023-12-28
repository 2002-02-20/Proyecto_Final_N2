<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Models/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controllers/ClasesController.php';


class Clases
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->getConexion();
    }


        #TERMINAR LA FUNCION
        public function agregarMateriaModel($clases)
        {
    
            $query = 'INSERT INTO `clases` (`clases`) VALUES (?)';
    
            try {
                $stm = $this->conexion->prepare($query);
                $stm->execute([$clases]);
    
    /*             if ($user_id) {
                    $last_id = $this->conexion->lastInsertId();
                    $this->asignMateria($last_id, $user_id);
                }
     */            return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        
    public function materiasA()
    {
        $query = 'SELECT clases.id AS num_clases, clases. clases, informacion.*
        FROM clases
        LEFT JOIN informacion ON informacion.clase_id = clases.id';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

      #TEMRINARL LA FUNCION 
      public function traerMaestroModel()
      {
          $query = "SELECT informacion.id, informacion.nombres ,informacion.apellidos, informacion.clase_id FROM informacion WHERE rol_id = 2 and clase_id is null";
          try {
              $stm = $this->conexion->prepare($query);
              $stm->execute();
              $rs = $stm->fetchAll(PDO::FETCH_ASSOC);
              return $rs;
          } catch (PDOException $e) {
              echo $e->getMessage();
          }
      }

      

    public function deleteClass($id)
    {
        $query = 'DELETE FROM clases WHERE id = ?';

        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute([$id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
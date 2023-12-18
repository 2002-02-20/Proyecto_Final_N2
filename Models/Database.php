<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/conn.php';

class Database
{
    private $hostname;
    private $username;
    private $password;
    private $dbname;
    private $conexion;

    public function __construct()
    {
        $this->hostname = HOST_NAME;
        $this->username = USER_NAME;
        $this->password = PASSWORD;
        $this->dbname = DB_NAME;

        $this->conexion = new \PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username,$this->password); 
    }

    function getConexion()
    {
        return $this->conexion;
    }

    function closeConexion()
    {
        $this->conexion = null;
    }
}


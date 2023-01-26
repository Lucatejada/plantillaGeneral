
<?php

class Conexion
{

    protected $conexion;
    protected $dbhost = "localhost";
    protected $dbuser = "root";
    protected $dbpass = "";
    protected $dbname = "test";


    public function __construct()
    {
        $this->conexion = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

        if ($this->conexion->connect_errno) {
            echo 'Error al conectar la base de datos: ' . $this->conexion->connect_errno;
            return;
        }

        $this->conexion->set_charset('UTF8');
    }
}

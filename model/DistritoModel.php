<?php

require_once('../../config/Conexion.php');

class DistritoModel extends Conexion
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getDistritosM()
    {
        $sql = "SELECT * FROM distritos";
        $result = $this->conexion->query($sql);
        $listDistritos = $result->fetch_all(MYSQLI_ASSOC);
        return $listDistritos;
    }


}

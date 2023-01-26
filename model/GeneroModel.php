<?php

if (file_exists('../../config/Conexion.php')) {
    require_once('../../config/Conexion.php');
} else {
    require_once('../../../../config/Conexion.php');
}

class GeneroModel extends Conexion
{

    public function getGenerosM()
    {
        $sql = "SELECT p.*, g. * from personas p, genero g WHERE p.id_genero2 = g.id";
        $result = $this->conexion->query($sql);
        $listGenero = $result->fetch_all(MYSQLI_ASSOC);
        return $listGenero;
    }
}

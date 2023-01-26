<?php

require_once('conexionDeporte.php');

class mdlDistrito extends Conexion
{

    public function mostrarDistrito()
    {
        $sql = "SELECT * FROM distritos";
        $resultado = $this->conexion->query($sql);
        $listaDistritos = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listaDistritos;
    }
}

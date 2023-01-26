<?php
require_once('conexion.php');
class mdlActividades extends Conexion
{
   

    public function mostrarActividades()
    {
        $sql = "SELECT * FROM actividades";
        $resultado = $this->conexion->query($sql);
        $listaActividades = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listaActividades;
    }
    
}

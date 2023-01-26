<?php

require_once('conexion.php');

class mdlAsistencia extends Conexion
{

    public function mostrarAsistencia()
    {
        $sql = "SELECT u.cuil, u.nombre, u.apellido, u.telefono, a.nombre as nombre_actividad, d.nombre as nombre_distrito, r.nombre as nombre_roles 
        FROM usuarios u, actividades a, distritos d, roles r WHERE u.id_actividad2 = a.actividad_id and u.id_distrito2 = d.id and u.id_roles2 = r.id;";
        $resultado = $this->conexion->query($sql);
        $listaAsistencia = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listaAsistencia;
    }
}

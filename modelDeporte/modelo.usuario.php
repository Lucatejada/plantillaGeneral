<?php

require_once('conexion.php');

class mdlUsuario extends Conexion
{

    public function registrarUsuarioM($cuil, $nombre, $apellido, $telefono, $actividades, $distrito, $roles)
    {
        $sql = "INSERT INTO usuarios (cuil, nombre, apellido, telefono, id_actividad2, id_distrito2, id_roles2) VALUES ('$cuil','$nombre', '$apellido', '$telefono',  '$actividades', '$distrito', '$roles')";
        try {
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function rolesUsuarioM()
    {
        $sql = "SELECT * FROM roles";
        $resultado = $this->conexion->query($sql);
        $listaRoles = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listaRoles; 
    }


}

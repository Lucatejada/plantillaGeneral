<?php

require_once('../../config/Conexion.php');


class UsuarioModel extends Conexion
{

    public function __construct()
    {
        parent::__construct();
    }


    public function getUsuarios()
    {
        $sql = "SELECT u.dni, u.nombre, u.apellido, u.correo, 
                FROM usuario u, rol r 
                WHERE u.id_rol2 = r.id";
        $result = $this->conexion->query($sql);
        $listUsuarios = $result->fetch_all(MYSQLI_ASSOC);
        return $listUsuarios;
    }

    public function getPersonas()
    {
        $sql = "SELECT p.dni, p.nombre, p.apellido, p.email, date_format(p.nacimiento, '%d/%m/%Y') as fecha_nacimiento, g.nombre as tipo_genero, p.telefono, d.nombre AS nombre_distrito 
        from personas p, genero g, distritos d 
        WHERE p.id_genero2 = g.id & p.id_distritos2 = d.id;";
        $result = $this->conexion->query($sql);
        $listPersonas = $result->fetch_all(MYSQLI_ASSOC);
        return $listPersonas;
    }
    public function getHombres()
    {
        $sql = "SELECT dni, nombre, apellido, email, genero FROM personas ";
        $result = $this->conexion->query($sql);
        $listPersonas = $result->fetch_all(MYSQLI_ASSOC);
        return $listPersonas;
    }
    public function getMujeres()
    {
        $sql = "SELECT dni, nombre, apellido, email, genero FROM personas ";
        $result = $this->conexion->query($sql);
        $listPersonas = $result->fetch_all(MYSQLI_ASSOC);
        return $listPersonas;
    }
    public function getNb()
    {
        $sql = "SELECT dni, nombre, apellido, email, genero FROM personas ";
        $result = $this->conexion->query($sql);
        $listPersonas = $result->fetch_all(MYSQLI_ASSOC);
        return $listPersonas;
    }


    public function getUsuariosSupervisores()
    {
        $sql = "SELECT u.dni, u.nombre, u.apellido, u.correo, u.username, date_format(u.fecha_creado, '%d/%m/%Y, %H:%i:%s') as fecha_creado, 
                u.usuario_creado, date_format(u.fecha_modificado, '%d/%m/%Y, %H:%i:%s') as fecha_modificado, u.usuario_modificado, 
                date_format(u.fecha_baja, '%d/%m/%Y, %H:%i:%s') as fecha_baja, u.motivo_baja, u.usuario_baja, 
                DATE_FORMAT(u.ultimo_acceso, '%d/%m/%Y, %H:%i:%s') AS ultimo_acceso, r.tipo_usuario
                FROM usuario u, rol r 
                WHERE u.id_rol2 = r.id and r.id != 3";
        $result = $this->conexion->query($sql);
        $listUsuarios = $result->fetch_all(MYSQLI_ASSOC);
        return $listUsuarios;
    }

    public function listarRoles()
    {
        $sql = "SELECT r.id, r.tipo_usuario from rol r";
        $result = $this->conexion->query($sql);
        $listRoles = $result->fetch_all(MYSQLI_ASSOC);
        return $listRoles;
    }

    public function listarUsuariosNoAdmin()
    {
        $sql = "SELECT u.dni, concat(u.nombre, ' ', u.apellido) as nombre_apellido from usuario u where u.id_rol2 != 3";
        $result = $this->conexion->query($sql);
        $listUsuarios = $result->fetch_all(MYSQLI_ASSOC);
        return $listUsuarios;
    }

    //PAGINA USUARIOS
    public function agregarUsuarioM($dni, $nombre, $apellido, $correo, $genero, $nacimiento, $celular, $distrito)
    {


        $sql = "INSERT INTO personas(dni, nombre, apellido, email, genero, nacimiento, celular, id_distritos2) 
                VALUES ('$dni', '$nombre', '$apellido', '$correo', '$genero', '$nacimiento', '$celular', '$distrito')";
        $result = $this->conexion->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function darBajaUsuarioM($dni, $motivoBaja, $rolAnterior, $userActual)
    {
        $motivo = $this->conexion->real_escape_string($motivoBaja);
        $sql = "UPDATE usuario set fecha_baja = now(), motivo_baja = '$motivo', usuario_baja = '$userActual', 
                rol_anterior = '$rolAnterior', id_rol2 = null where dni = '$dni'";
        $result = $this->conexion->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //LISTADO DE BAJAS
    public function listarBajasM()
    {
        $sql = "SELECT u.dni, u.nombre, u.apellido, u.correo, u.username, date_format(u.fecha_creado, '%d/%m/%Y, %H:%i:%s') as fecha_creado, 
                u.usuario_creado, date_format(u.fecha_modificado, '%d/%m/%Y, %H:%i:%s') as fecha_modificado, u.usuario_modificado, 
                date_format(u.fecha_baja, '%d/%m/%Y, %H:%i:%s') as fecha_baja, u.motivo_baja, u.usuario_baja, u.rol_anterior,
                DATE_FORMAT(u.ultimo_acceso, '%d/%m/%Y, %H:%i:%s') AS ultimo_acceso
                FROM usuario u
                WHERE u.id_rol2 is null";
        $result = $this->conexion->query($sql);
        $listBajas = $result->fetch_all(MYSQLI_ASSOC);
        return $listBajas;
    }



    //MODIFICAR DATOS PERSONALES
    public function listarUsuarioActualM($dni)
    {
        $sql = "SELECT u.dni, u.nombre, u.apellido, u.correo FROM usuario u
                WHERE u.dni = '$dni'";
        $result = $this->conexion->query($sql);
        $listUsuario = $result->fetch_all(MYSQLI_ASSOC);
        return $listUsuario;
    }

    public function editarDatosPersonalesM($nombre, $apellido, $correo, $dni)
    {
        $sql = "UPDATE usuario set nombre = '$nombre', apellido = '$apellido', correo = '$correo',
                fecha_modificado = now(), usuario_modificado where dni = '$dni'";
        $result = $this->conexion->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function cambiarPassM($pass, $userActual, $dni)
    {
        $sql = "UPDATE usuario set pass = '$pass', fecha_modificado = now(), usuario_modificado = '$userActual' where dni = '$dni'";
        $result = $this->conexion->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

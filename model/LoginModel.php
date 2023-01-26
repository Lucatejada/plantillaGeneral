<?php
if (file_exists('../../config/Conexion.php')) {
    require_once('../../config/Conexion.php');
} else {
    require_once('config/Conexion.php');
}

class LoginModel extends Conexion
{

    public function autenticarUsuario($user, $pass)
    {
        $result = $this->conexion->query("SELECT * from usuario u where u.username = '$user' and u.pass = '$pass'");
        $logueado = $result->num_rows;
        if ($logueado == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function verificarDniUsuario($user)
    {
        $sql = $this->conexion->query("SELECT u.dni from usuario u where u.username = '$user'");
        $result = $sql->fetch_all(MYSQLI_NUM);
        foreach ($result as $dniResult) {
            $dni = $dniResult[0];
        }
        return $dni;
    }

    public function verificarTipoUsuario($dni)
    {
        $sql = $this->conexion->query("SELECT r.id from rol r where r.id in (select u.id_rol2 from usuario u where u.dni = '$dni')");
        $result = $sql->fetch_all(MYSQLI_NUM);
        foreach ($result as $row) {
            $rol = $row[0];
        }
        return $rol;
    }

    public function mostrarNombreApellido($dni)
    {
        $sql = $this->conexion->query("SELECT concat(u.nombre, ' ', u.apellido) from usuario u where u.dni = '$dni'");
        $nombre = $sql->fetch_row()[0];
        return $nombre;
    }

}
?>
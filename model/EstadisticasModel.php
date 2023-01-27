<?php

require('../../config/Conexion.php');
require('../../config/conexionDeporte.php');

class EstadisticasModel extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mostrarRespuestas()
    {
        $sql = "SELECT nombre, apellido, cuil, telefono, sangre, peso, talle, uno, dos, tres, cuatro, cinco, seis, siete, ocho, nueve, diez, once, doce, trece, catorce, quince, nombre_tutor, telEmergencia, archivo FROM resultado";
        $resultado = $this->conexion1->query($sql);
        $listaRespuestas = $resultado->fetch_all(MYSQLI_ASSOC);
        return $listaRespuestas;
    }

    //INICIO
    public function contarTotalMsjM()
    {
        $sql = "SELECT COUNT(*) FROM mensaje";
        $result = $this->conexion->query($sql);
        $cantMsj = $result->fetch_row()[0];
        return $cantMsj;
    }

    public function contarTotalMsjxEstadoM($estado)
    {
        $sql = "SELECT COUNT(*) AS total
                FROM mensaje m, estado_msj em 
                WHERE m.id_estado_msj2 = em.id AND em.estado = '$estado'";
        $result = $this->conexion->query($sql);
        $cantMsjxEstado = $result->fetch_row()[0];
        return $cantMsjxEstado;
    }

    public function contarTotalDistritosM()
    {
        $sql = "SELECT COUNT(*) 
                FROM distritos";
        $result = $this->conexion->query($sql);
        $cantDistritos = $result->fetch_row()[0];
        return $cantDistritos;
    }

 

    //MOVILIDADES
    public function contarTotalMovilidadesM()
    {
        $sql = "SELECT count(*) from movilidad m";
        $result = $this->conexion->query($sql);
        $cantMovilidades = $result->fetch_row()[0];
        return $cantMovilidades;
    }

    public function contarMovilidadesxEstadoM($estado)
    {
        $sql = "SELECT count(*) 
                from movilidad m, estado_movilidad em
                where m.id_estado_movilidad2 = em.id and em.estado = '$estado'";
        $result = $this->conexion->query($sql);
        $cantxEstado = $result->fetch_row()[0];
        return $cantxEstado;
    }

    //USUARIOS
    public function contarUsuariosM()
    {
        $sql = "SELECT count(*) from personas ";
        $result = $this->conexion->query($sql);
        $cantPersonas = $result->fetch_row()[0];
        return $cantPersonas;
    }

    public function contarPersonasMascM()
    {
        $sql = "SELECT count(*) from personas WHERE id_genero2 = 1";
        $result = $this->conexion->query($sql);
        $cantHombres = $result->fetch_row()[0];
        return $cantHombres;
    }

    public function contarPersonasFemM()
    {
        $sql = "SELECT count(*) from personas WHERE id_genero2 = 2;";
        $result = $this->conexion->query($sql);
        $cantMujeres = $result->fetch_row()[0];
        return $cantMujeres;
    }

    public function contarPersonasNbM()
    {
        $sql = "SELECT count(*) from personas WHERE id_genero2 = 3;";
        $result = $this->conexion->query($sql);
        $cantNb = $result->fetch_row()[0];
        return $cantNb;
    }

    public function contarUsuariosSalud()
    {
        $sql = "SELECT count(*) from resultado";
        $result = $this->conexion1->query($sql);
        $registroSalud = $result->fetch_row()[0];
        return $registroSalud;
    }

    public function contarUsuariosBajaM()
    {
        $sql = "SELECT count(*) from usuario u where u.id_rol2 is null";
        $result = $this->conexion->query($sql);
        $cantUsuariosBaja = $result->fetch_row()[0];
        return $cantUsuariosBaja;
    }


    //PAGINA ESTADISTICAS
    public function contarMsjActualesM()
    {
        $sql = "SELECT count(*) from mensaje m
                where date_format(m.fecha_emergencia, '%Y/%m/%d') = curdate()";
        $result = $this->conexion->query($sql);
        $cantMsj = $result->fetch_row()[0];
        return $cantMsj;
    }

    public function listarMsjActualesxEstadoM()
    {
        $sql = "SELECT count(m.id_estado_msj2) as total, em.estado from mensaje m
                right join estado_msj em on em.id = m.id_estado_msj2
                and date_format(m.fecha_emergencia, '%Y/%m/%d') = curdate() group by em.id";
        $result = $this->conexion->query($sql);
        $listMsjEstado = $result->fetch_all(MYSQLI_ASSOC);
        return $listMsjEstado;
    }

    public function contarMsjxRangosM($fechaDesde, $fechaHasta)
    {
        $sql = "SELECT count(*) from mensaje m
                where date_format(m.fecha_emergencia, '%Y-%m-%d') between '$fechaDesde' and '$fechaHasta'";
        $result = $this->conexion->query($sql);
        $cantMsj = $result->fetch_row()[0];
        return $cantMsj;
    }

    public function listarMsjxRangosM($fechaDesde, $fechaHasta)
    {
        $sql = "SELECT count(m.id_estado_msj2) as total, em.estado from mensaje m
                right join estado_msj em on em.id = m.id_estado_msj2
                and date_format(m.fecha_emergencia, '%Y-%m-%d') between '$fechaDesde' and '$fechaHasta' 
                group by em.id";
        $result = $this->conexion->query($sql);
        $listMsjEstado = $result->fetch_all(MYSQLI_ASSOC);
        return $listMsjEstado;
    }

    //ROL AGENTE: INICIO
    public function contarMsjxEstadoAgenteM($dni, $estado)
    {
        $sql = "SELECT count(*)
                from mensaje m, mensaje_usuario mu, usuario u, estado_msj em 
                where m.id = mu.id_mensaje2 and mu.dni_usuario2 = u.dni and m.id_estado_msj2 = em.id 
                and u.dni = '$dni' and em.estado = '$estado'";
        $result = $this->conexion->query($sql);
        $cantMsjEstado = $result->fetch_row()[0];
        return $cantMsjEstado;
    }
}


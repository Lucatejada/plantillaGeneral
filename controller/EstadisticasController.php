<?php

require('../../model/EstadisticasModel.php');
class EstadisticasController
{
    public static function index()
    {
        echo '<title>Inicio</title>';
        session_start();
        $estModel = new EstadisticasModel();

        $cantDistritos = $estModel->contarTotalDistritosM();


        if ($_SESSION['rol'] != 1) {
            
            $registroSalud = $estModel->contarUsuariosSalud();
            $cantPersonas = $estModel->contarUsuariosM();
            $cantHombres = $estModel->contarPersonasMascM();
            $cantMujeres = $estModel->contarPersonasFemM();
            $cantNb = $estModel->contarPersonasNbM();
        }

        require_once('plantilla.php');
        require_once('estadisticas/inicio.php');
    }

    public static function mostrarRtas()
    {
        echo '<title>Datos de Salud</title>';
        $estModel = new EstadisticasModel();
        $listaRespuestas = $estModel->mostrarRespuestas();
        require_once('plantilla.php');
        require_once('estadisticas/listarEstadisticas.php');
    }

    public static function getActuales()
    {
        echo '<title>Estadistícas</title>';
        $estModel = new EstadisticasModel();

        $filtro = 'Día actual';
        $cantMsj = $estModel->contarMsjActualesM();
        $listMsjxEstado = $estModel->listarMsjActualesxEstadoM();

        require_once('plantilla.php');
        require_once('estadisticas/listarEstadisticas.php');
    }

    public static function getPorRango()
    {
        echo '<title>Estadísticas</title>';
        $estModel = new EstadisticasModel();

        $fechaDesde = $_POST['fechaDesde'];
        $fechaHasta = $_POST['fechaHasta'];

        $dateDesde = date_create($fechaDesde);
        $dateHasta = date_create($fechaHasta);

        $fechaDesdeFormat = date_format($dateDesde, 'd/m/Y');
        $fechaHastaFormat = date_format($dateHasta, 'd/m/Y');

        $filtro = 'Desde el día ' . $fechaDesdeFormat . ' hasta ' . $fechaHastaFormat;
        $cantMsj = $estModel->contarMsjxRangosM($fechaDesde, $fechaHasta);
        $listMsjxEstado = $estModel->listarMsjxRangosM($fechaDesde, $fechaHasta);

        require_once('plantilla.php');
        require_once('estadisticas/listarEstadisticas.php');
    }
}

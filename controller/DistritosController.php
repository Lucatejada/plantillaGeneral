<?php

class DistritosController
{

    public static function index()
    {
        echo '<title>Distritos</title>';
        require_once('../../model/DistritoModel.php');
        $modelDistrito = new DistritoModel();
        $listDistritos = $modelDistrito->getDistritosM();
        require_once('plantilla.php');
        require_once('distritos/listarDistritos.php');
    }

}

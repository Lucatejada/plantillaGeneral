<?php



class GeneroController
{

    public static function getGenerosC(){

        require_once('../../model/GeneroModel.php');
        $modelGeneros = new GeneroModel();
        $listGeneros = $modelGeneros->getGenerosM();
        require_once('plantilla.php');
    }


}

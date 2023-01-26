<?php

class ctrDistrito {

    public static function ctrMostrarDistritos(){
        require_once("modelos/modelo.distrito.php");
        $mdlDistritos = new mdlDistrito(); 
        $listaDistritos = $mdlDistritos->mostrarDistrito();
        // require_once("vistas/paginas/registro.php"); 
    }
}
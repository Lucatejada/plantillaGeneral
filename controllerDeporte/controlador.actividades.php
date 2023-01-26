<?php

class ctrActividades
{

    public static function ctrMostrarActividades()
    {
        require_once("modelDeporte/modelo.actividades.php");
        require_once("modelDeporte/modelo.distrito.php");
        $mdlActividades = new mdlActividades();
        $listaActividades = $mdlActividades->mostrarActividades();
        $listaDistritos = $mdlDistritos->mostrarDistrito();
        $mdlDistritos = new mdlDistrito();
        // require_once("vistas/paginas/registro.php");
    }

    public static function mostrarRtas()
    {
        require_once("modelDeporte/modelo.respuestas.php");
        $mdlRespuestas = new mdlRespuestas();
        $listaRespuestas = $mdlRespuestas->mostrarRespuestas();
        // require_once("views/admin/estadisticas/inicio.php");
    }

//     public static function mostrarRtas2()
//     {
//         require_once("modelos/modelo.respuestas.php");
//         $mdlRespuestas = new mdlRespuestas();
//         $listaRespuestas2 = $mdlRespuestas->mostrarRespuestas2();
//         require_once("vistas/plantilla.php");
//         require_once("vistas/paginas/datos.completos.php");
//     }
// }
}
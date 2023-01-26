<?php
session_start();
require_once("../modelos/modelo.formulario.php");

class controladorFormularios
{

    public static function ctrActualizarRegistro()
    {
        $mdlformulario = new ModeloFormularios();
        if (isset($_POST["actualizarNombre"])) {
        }
        $tabla = "usuarios";
        $nombre =  $_POST["actualizarNombre"];
        $apellido = $_POST["actualizarApellido"];
        $dni =  $_POST["cuil"];
        
        if ($mdlformulario->mdlActualizarRegistro($tabla, $nombre, $dni, $apellido)){
            $_SESSION['nombreActualizado'] = true; 
            header( "Location: ../index.php?pagina=principal");
        }
    }

    
    public static function ctrEliminarUsuario()
    {
        $mdldrop = new ModeloFormularios();
        $tabla = "usuarios";
        $dni =  $_GET["dni"];
        if ($mdldrop->mdlEliminarUsuario($tabla, $dni)){
            $_SESSION['usuarioEliminado'] = true; 
            header( "Location: ../index.php?pagina=principal");
        }
        // echo $dni;

    }
}

<?php

require_once('../../model/UsuarioModel.php');

class UsuariosController
{

    public static function index()
    {
        session_start();
        $user = new UsuarioModel();
        if ($_SESSION['rol'] == 2) {
            $listPersonas = $user->getUsuariosSupervisores();
        } else if ($_SESSION['rol'] == 3) {
            $listPersonas = $user->getPersonas();
        }
        require_once('plantilla.php');
        require_once('usuarios/listarPersonas.php');
    }

    //MODIFICAR DATOS PERSONALES
    public static function editarDatos()
    {
        $userModel = new UsuarioModel();

        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];

        if ($userModel->editarDatosPersonalesM($nombre, $apellido, $correo, $dni)) {
            session_start();
            $_SESSION['datosPersEditados'] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }


    public static function agregarUsuario()
    {
        $userModel = new UsuarioModel();

        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $genero = $_POST['genero'];
        $nacimiento = $_POST['nacimiento'];
        $telefono = $_POST['telefono'];
        $distrito = $_POST['distrito'];

        if ($userModel->agregarUsuarioM($dni, $nombre, $apellido, $correo, $genero, $nacimiento, $telefono, $distrito)) {
            session_start();
            $_SESSION['usuarioOk'] = true;
            header('Location: index.php?c=UsuariosController&a=index');
        }
    }

   
}

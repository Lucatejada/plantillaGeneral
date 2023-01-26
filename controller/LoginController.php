<?php

require_once('model/LoginModel.php');

class LoginController
{

    public static function index()
    {
        require_once('views/login.php');
    }

    public static function login()
    {
        $model = new LoginModel();

        $user = $_POST['username'];
        $pass = $_POST['pass'];

        $login = $model->autenticarUsuario($user, $pass);

        if ($login) {

            $dni = $model->verificarDniUsuario($user);
            $tipoUsuario = $model->verificarTipoUsuario($dni);

            switch ($tipoUsuario) {
                case 1:
                    session_start();
                    $_SESSION['dni'] = $dni;
                    $_SESSION['nombre'] = $model->mostrarNombreApellido($dni);
                    $_SESSION['rol'] = $tipoUsuario;
                    $model->verificarTipoUsuario($dni);
                    header('Location: views/agente/index.php?c=EstadisticasController&a=index');
                    break;
                case 2:
                    session_start();
                    $_SESSION['dni'] = $dni;
                    $_SESSION['nombre'] = $model->mostrarNombreApellido($dni);
                    $_SESSION['rol'] = $tipoUsuario;
                    // $model->verificarUltimoAcceso($dni);
                    header('Location: views/supervisor/index.php?c=EstadisticasController&a=index');
                    break;
                case 3:
                    session_start();
                    $_SESSION['dni'] = $dni;
                    $_SESSION['nombre'] = $model->mostrarNombreApellido($dni);
                    $_SESSION['rol'] = $tipoUsuario;
                    // $model->verificarUltimoAcceso($dni); 
                    header('Location: views/admin/index.php?c=EstadisticasController&a=index');
                    break;
            }

        } else {
            session_start();
            $_SESSION['loginError'] = true;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public static function logout(){
        session_start();
        session_destroy();
        header('Location: index.php?c=LoginController&a=index');
    }
}

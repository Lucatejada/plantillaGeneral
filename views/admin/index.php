<?php

if (!isset($_REQUEST['c'])) {
    header('Location: index.php?c=MensajesController&a=index');
} else {
    $controller = $_REQUEST['c'];

    if (file_exists('../../controller/' . $controller . '.php')) {
        require_once('../../controller/' . $controller . '.php');
    } else {
        echo '<script>window.history.go(-1)</script>';
    }

    if (isset($_REQUEST['a'])) {
        $accion = $_REQUEST['a'];
    } else {
        $accion = 'index';
    }

    $controller = ucwords($controller);

    if (method_exists($controller, $accion)) {
        call_user_func(array($controller, $accion));
    } else {
        echo '<script>window.history.go(-1)</script>';
    }
}

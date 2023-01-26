<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if (isset($_SESSION['dni'])) {
    if ($_SESSION['rol'] == 2) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

            <!-- DATATABLES -->
            <link rel="stylesheet" type="text/css" href="../asset/DataTables/datatables.min.css" />
            <script type="text/javascript" src="../asset/Datatables/datatables.min.js"></script>

            <script>
                function mostrarContrasenia(check) {
                    var pass = document.getElementById('pass');
                    if (check.checked) {
                        pass.setAttribute('type', 'text');
                    } else {
                        pass.setAttribute('type', 'password');
                    }
                }
            </script>


        </head>

        <body>

            <!-- ALERTAS -->
            <?php
            error_reporting(E_ALL ^ E_WARNING);
            if ($_SESSION['datosPersEditados']) {
            ?>
                <div class="toast-container position-fixed top-0 end-0 p-3">

                    <div class="toast align-items-center text-bg-success border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="bi bi-check-circle"></i>
                                Los datos han sido modificados
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>

                </div>
            <?php
                unset($_SESSION['datosPersEditados']);
            }
            ?>

            <?php
            if ($_SESSION['passCambiada']) {
            ?>
                <div class="toast-container position-fixed top-0 end-0 p-3">

                    <div class="toast align-items-center text-bg-success border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="bi bi-check-circle"></i>
                                La contraseña ha sido cambiada
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>

                </div>
            <?php
                unset($_SESSION['passCambiada']);
            }
            ?>

            <div class="container-fluid sticky-top pb-4">

                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <img src="../asset/logo.png" alt="Logo" width="30" height="30">
                        <a class="navbar-brand px-2" href="#">RCP YA! - Salud</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="index.php?c=EstadisticasController&a=index">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?c=MensajesController&a=index">Mensajes de atención RCP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?c=DistritosController&a=index">Distritos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?c=MovilidadController&a=index">Movilidades</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?c=UsuariosController&a=index">Listado de agentes/supervisores</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Estadisticas
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="index.php?c=EstadisticasController&a=getActuales">Día actual</a></li>
                                        <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalEstadisticasRango">Rango de fechas</a></li>
                                    </ul>
                                </li>

                            </ul>


                            <ul class="navbar-nav">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $_SESSION['nombre'] ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalDatosPersonales">Modificar datos personales</a></li>
                                        <li><a class="dropdown-item" href="../../index.php?c=LoginController&a=logout">Salir</a></li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>


            <!-- MODAL ESTADISTICAS POR RANGO -->
            <div class="modal fade" id="modalEstadisticasRango" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="index.php?c=EstadisticasController&a=getPorRango" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Rango de mensajes por fecha enviada</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-6">Especificar los siguientes campos para visualizar el gráfico desde una fecha determinada</p>

                                <div class="mb-3">
                                    <label for="" class="form-label">Desde</label>
                                    <input type="date" class="form-control" name="fechaDesde" id="" aria-describedby="helpId" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Hasta</label>
                                    <input type="date" class="form-control" name="fechaHasta" id="" aria-describedby="helpId" placeholder="">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MODAL DATOS PERSONALES -->
            <div class="modal fade" id="modalDatosPersonales" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="index.php?c=UsuariosController&a=editarDatos" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modificar datos personales</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-6">Editar el campo que desee</p>

                                <?php
                                require_once('../../model/UsuarioModel.php');
                                $userModel = new UsuarioModel();
                                $listUsuario = $userModel->listarUsuarioActualM($_SESSION['dni']);

                                foreach ($listUsuario as $usuario) {
                                ?>

                                    <input type="hidden" name="dni" value="<?= $_SESSION['dni'] ?>">
                                    <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                    <div class="mb-3">
                                        <label for="" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="" value="<?= $usuario['nombre'] ?>" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" name="apellido" id="" value="<?= $usuario['apellido'] ?>" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Correo</label>
                                        <input type="email" class="form-control" name="correo" id="" value="<?= $usuario['correo'] ?>" aria-describedby="helpId" placeholder="Correo no proporcionado">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nombre de usuario</label>
                                        <input type="text" class="form-control" name="username" id="" value="<?= $usuario['username'] ?>" aria-describedby="helpId" placeholder="">
                                    </div>
                                    <div class="mb-3" id="btnCambiar">
                                        <a role="button" class="btn btn-info" data-bs-toggle="modal" href="#modalPass">Cambiar contraseña</a>
                                    </div>



                                <?php
                                }
                                ?>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MODAL CAMBIO DE CONTRASEÑA -->
            <div class="modal fade" id="modalPass" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="index.php?c=UsuariosController&a=cambiarPass" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Cambio de contraseña</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <input type="hidden" name="dni" value="<?= $_SESSION['dni'] ?>">
                                <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                <div class="mb-3">
                                    <label for="" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onclick="mostrarContrasenia(this)" value="" id="">
                                    <label class="form-check-label" for="">
                                        Mostrar contraseña
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        </body>

        </html>

<?php
    } else {
        $_SESSION['accesoDenegado'] = true;
        header('Location: ../../index.php?c=LoginController&a=index');
    }
} else {
    $_SESSION['sessionExpired'] = true;
    header('Location: ../../index.php?c=LoginController&a=index');
}
?>
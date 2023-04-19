<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if (isset($_SESSION['dni'])) {
    if ($_SESSION['rol'] == 3) {
?>

        <!DOCTYPE html>
        <html lang="en" data-bs-theme="dark">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <link rel="shortcut icon" href="../asset/logo.png">

            <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

            <!-- DATATABLES -->
            <link rel="stylesheet" type="text/css" href="../asset/Datatables/datatables.min.css" />
            <script type="text/javascript" src="../asset/Datatables/datatables.min.js"></script>

            <!-- SELECT2 -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

            <!--  -->
            <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.css" />
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.css" />
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.js"></script>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


        </head>

        <body>




            <div class="container-fluid sticky-top pb-4">

                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <img src="../asset/logo.png" alt="Logo" width="30" height="30">
                        <a class="navbar-brand px-2" href="index.php?c=EstadisticasController&a=index">Base de datos General </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                            <ul class="navbar-nav">

                            </ul>

                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-person-lines-fill"></i> <?= $_SESSION['nombre'] ?>
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


            <!-- MODAL AGREGAR USUARIO -->


            <div class="modal fade" id="modalAgregarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="index.php?c=UsuariosController&a=agregarUsuario" method="post">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar nuevo usuario</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <font color=red>
                                    Obligatorio! (*)
                                </font>

                                <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                <div class="mb-3">
                                    <label for="" class="form-label">DNI (*)</label>
                                    <input type="number" class="form-control" name="dni" oninput="validarDni(this);" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                                    <small id="txtDni" class="form-text text-danger"></small>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre (*)</label>
                                    <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Apellido (*)</label>
                                    <input type="text" class="form-control" name="apellido" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Correo</label>
                                    <input type="email" class="form-control" name="correo" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Genero</label>
                                    <select aria-label="Default select example" name="genero" required="" class="form-control">
                                        <option selected>Seleccione su genero</option>
                                        <?php
                                        require_once("../../model/GeneroModel.php");
                                        $generos = new GeneroModel();
                                        $listGeneros = $generos->getGenerosM();
                                        foreach ($listGeneros as $generos) {
                                        ?>
                                            <option value="<?= $generos['id'] ?>"> <?= $generos['nombre'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Fecha nacimiento (*)</label>
                                    <input type="date" class="form-control" name="nacimiento" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Celular</label>
                                    <input type="number" class="form-control" name="celular" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                                </div>
                                <!-- SELECCIONAR DISTRITOS  -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Distrito</label>
                                    <select aria-label="Default select example" name="distrito" required="" class="form-control">
                                        <option selected>Seleccione su distrito</option>
                                        <?php
                                        require_once("../../model/DistritoModel.php");
                                        $distritos = new DistritoModel();
                                        $listaDistritos = $distritos->getDistritosM();
                                        foreach ($listaDistritos as $distritos) {
                                        ?>
                                            <option value="<?= $distritos['id'] ?>"> <?= $distritos['nombre'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" id="btnAgregar" class="btn btn-primary">Agregar usuario</button>
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
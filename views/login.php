<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<!-- 
<script>
    var alertList = document.querySelectorAll('.alert');
    alertList.forEach(function(alert) {
        new bootstrap.Alert(alert)
    })
</script> -->

<body>

    <div class="container-fluid position-absolute">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container ">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <img src="views/asset/logo.png" alt="Logo" width="30" height="30">
                        <a class="navbar-brand px-2" href="#">Municipalidad de Guaymallén</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-lg-3">

                <form action="index.php?c=LoginController&a=login" method="post" class="border px-4 pt-3 pb-3">

                    <div class="row">
                        <p class="fs-4">Acceder</p>
                    </div>

                    <?php
                    if ($_SESSION['sessionExpired']) {

                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Sesión expirada</strong>
                            <br>
                            <span>Iniciar sesión nuevamente</span>
                        </div>

                    <?php
                        unset($_SESSION['sessionExpired']);
                    }

                    if ($_SESSION['accesoDenegado']) {

                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Acceso restringido</strong>
                            <br>
                            <span>Iniciar sesión nuevamente</span>
                        </div>

                    <?php
                        unset($_SESSION['accesoDenegado']);
                    }

                    if ($_SESSION['loginError']) {
                    ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Datos incorrectos</strong>
                            <br>
                            <span>Intente nuevamente</span>
                        </div>

                        <script>
                            var alertList = document.querySelectorAll('.alert');
                            alertList.forEach(function(alert) {
                                new bootstrap.Alert(alert)
                            })
                        </script>

                    <?php
                        unset($_SESSION['loginError']);
                    }
                    ?>




                    <div class="row mb-3">
                        <label for="" class="form-label">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                    </div>
                    <div class="row mb-3">
                        <label for="" class="form-label">Contraseña</label>
                        <input type="text" class="form-control" name="pass" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                    </div>

                    <div class="row mb-3">
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
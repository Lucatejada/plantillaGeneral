<script>
    $(document).ready(function() {
        $('#tablaDinamica').DataTable({
            lengthMenu: [25, 50, 100, 200],
            order: [1, 'asc'],
            language: {
                url: '../asset/Datatables/es.json',
            }
        });
    })
</script>

<!-- ALERTAS -->
<?php
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['usuarioOk']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-success border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle"></i>
                    El usuario ha sido agregado exitosamente!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['usuarioOk']);
}
?>

<?php
if ($_SESSION['bajaOk']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    El usuario ha sido dado de baja
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['bajaOk']);
}
?>

<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
</script>

<div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a type="button" href="index.php?c=EstadisticasController&a=index"> Volver al estadisticas</a>
    </div>

    <div class="row justify-content-between">
        <div class="col-auto">
            <p class="fs-6 fw-bold">Listado de usuarios en total</p>
        </div>
        <div class="col-auto">
            <a href="index.php?c=UsuariosController&a=listarBajas" class="link-danger">Usuarios de baja</a>
            <a role="button" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario" class="link-success">Nuevo usuario</a>
        </div>
    </div>

    <div class="table-responsive-xxl">
        <table class="table table-striped table-hover" id="tablaDinamica">
            <thead>
                <tr>
                    <th scope="col">Dni</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Nombre de usuario</th>
                    <!-- <th scope="col">Tipo de usuario</th> -->
                    <!-- <th scope="col">Último acceso</th> -->
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listUsuarios as $usuario) {
                ?>
                    <tr class="align-middle">
                        <td scope="row"><?= $usuario['dni'] ?></td>
                        <td><?= $usuario['nombre'] ?></td>
                        <td><?= $usuario['apellido'] ?></td>
                        <td><?= $usuario['correo'] ?></td>
                        <td><?= $usuario['username'] ?></td>
                        <!-- <td><?= $usuario['tipo_usuario'] ?></td> -->

                        <td>
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acción
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <a role="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfo<?= $usuario['dni'] ?>">Más info</a>
                                    <?php
                                    if ($usuario['dni'] != $_SESSION['dni']) {
                                    ?>
                                        <a role="button" class="dropdown-item" href="index.php?c=UsuariosController&a=listarMsjAsignados&dni=<?= $usuario['dni'] ?>">
                                            Ver los mensajes en donde se desempeño
                                        </a>
                                        <a role="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalBaja<?= $usuario['dni'] ?>">Dar de baja</a>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- MODAL INFO USUARIO -->
                    <div class="modal fade modal-lg" id="modalInfo<?= $usuario['dni'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Información del usuario</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Dni</label>
                                                <input type="text" class="form-control" value="<?= $usuario['dni'] ?>" aria-describedby="helpId" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" value="<?= $usuario['nombre'] ?>" aria-describedby="helpId" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Apellido</label>
                                                <input type="text" class="form-control" value="<?= $usuario['apellido'] ?>" aria-describedby="helpId" disabled>
                                            </div>

                                            <?php
                                            if ($usuario['correo'] == '') {
                                                $correo = 'No proporcionado';
                                            } else {
                                                $correo = $usuario['correo'];
                                            }
                                            ?>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Correo</label>
                                                <input type="text" class="form-control" value="<?= $correo ?>" aria-describedby="helpId" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nombre de usuario</label>
                                                <input type="text" class="form-control" value="<?= $usuario['username'] ?>" aria-describedby="helpId" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Tipo de usuario</label>
                                                <input type="text" class="form-control" value="<?= $usuario['tipo_usuario'] ?>" aria-describedby="helpId" disabled>
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Fecha de alta</label>
                                                <input type="text" class="form-control" value="<?= $usuario['fecha_creado'] ?>" aria-describedby="helpId" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Usuario que le dio de alta</label>
                                                <input type="text" class="form-control" value="<?= $usuario['usuario_creado'] ?>" aria-describedby="helpId" disabled>
                                            </div>

                                            <?php
                                            if ($usuario['fecha_modificado'] != '') {
                                            ?>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha modificado</label>
                                                    <input type="text" class="form-control" value="<?= $usuario['fecha_modificado'] ?>" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Usuario que lo modifico</label>
                                                    <input type="text" class="form-control" value="<?= $usuario['usuario_modificado'] ?>" aria-describedby="helpId" disabled>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Último acceso al sistema</label>
                                                <input type="text" class="form-control" value="<?= $usuario['ultimo_acceso'] ?>" aria-describedby="helpId" disabled>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL BAJA USUARIO -->
                    <div class="modal fade" id="modalBaja<?= $usuario['dni'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Dar de baja: <?= $usuario['nombre'] . ' ' . $usuario['apellido'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="index.php?c=UsuariosController&a=darBajaUsuario" method="post">
                                    <div class="modal-body">

                                        <input type="hidden" name="dni" value="<?= $usuario['dni'] ?>">
                                        <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">
                                        <input type="hidden" name="rol" value="<?= $usuario['tipo_usuario'] ?>">

                                        <p class="fs-6">Para continuar debe especificar el siguiente campo</p>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Motivo de baja</label>
                                            <textarea class="form-control" name="motivoBaja" id="" rows="5" placeholder="Escribe aquí"></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
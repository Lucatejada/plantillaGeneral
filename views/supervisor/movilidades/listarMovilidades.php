<script>
    $(document).ready(function() {
        $('#tablaDinamica').DataTable({
            lengthMenu: [25, 50, 100, 200],
            stateSave: true,
            language: {
                url: '../asset/Datatables/es.json'
            }
        });
    })
</script>

<script>
    function cambiarEstadoPendiente(idMov, userActual) {
        if (confirm('Desea cambiar la movilidad N°' + idMov + ' a "Disponible?"')) {
            location.href = 'index.php?c=MovilidadController&a=cambiarAPendiente&idMov=' + idMov + '&userActual=' + userActual;
        }
    }
</script>

<?php
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['movCreada']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-success border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle"></i>
                    La movilidad ha sido creada
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['movCreada']);
}
?>

<?php
if ($_SESSION['movIndisponible']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    La movilidad ha cambiado de estado a No disponible
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['movIndisponible']);
}
?>

<?php
if ($_SESSION['estadoDisponible']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    La movilidad ha cambiado de estado a Disponible
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['estadoDisponible']);
}
?>

<?php
if ($_SESSION['movEditada']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    La movilidad ha sido modificada
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['movEditada']);
}
?>

<?php
if ($_SESSION['movRepetida']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-danger border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-x-circle"></i>
                    Error!! <br>
                    No se ha podido guardar la movilidad. Probablemente el nombre ingresado ya existe en el sistema. Intente nuevamente
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['movRepetida']);
}
?>

<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
</script>

<div class="container">
    <div class="row justify-content-between">
        <div class="col-auto">
            <p class="fs-6 fw-bold">Listado de movilidades</p>
        </div>
        <div class="col-auto">
            <a type="button" class="link-danger" href="index.php?c=MovilidadController&a=listarBajas">Movilidades de baja</a>
            <a type="button" class="link-success" data-bs-toggle="modal" data-bs-target="#modalNuevaMov">Nueva movilidad</a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12">
            <ul class="list-group">
                <?php
                foreach ($listMovilidadesOcupadas as $movOcupada) {
                ?>
                    <li class="list-group-item list-group-item-info"><?= $movOcupada['info_mov_ocupada'] ?></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="table-responsive-xxl">
        <table class="table table-hover table-striped" id="tablaDinamica">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listMovilidades as $movilidad) {
                ?>
                    <tr class="align-middle">
                        <td class="text-center"><?= $movilidad['id'] ?></td>
                        <td><?= $movilidad['nombre'] ?></td>
                        <td><?= $movilidad['descripcion'] ?></td>
                        <td><?= $movilidad['estado'] ?></td>
                        <td class="text-center">
                            <div class="dropdown open">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalInfoMov<?= $movilidad['id'] ?>">Más info</button>

                                    <?php
                                    if ($movilidad['estado'] != 'Ocupado' && $movilidad['estado'] != 'No disponible') {
                                    ?>
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalIndisponible<?= $movilidad['id'] ?>">Cambiar el estado a 'No disponible'</button>
                                    <?php
                                    }

                                    if ($movilidad['estado'] == 'No disponible') {
                                    ?>
                                        <button class="dropdown-item" onclick="cambiarEstadoPendiente(<?= $movilidad['id']; ?>, '<?= $_SESSION['nombre']; ?>');">Cambiar estado a 'Disponible'</button>
                                    <?php
                                    }
                                    ?>

                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEditarMov<?= $movilidad['id'] ?>">Editar</button>
                                </div>
                            </div>
                        </td>

                        <!-- Modal NUEVA MOVILIDAD -->
                        <div class="modal fade" id="modalNuevaMov" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Nueva movilidad</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="index.php?c=MovilidadController&a=agregarMovilidad" method="post">
                                        <div class="modal-body">

                                            <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                            <p class="fs-6">Llenar los siguientes campos</p>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="Escribe aquí">
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Descripción</label>
                                                <textarea class="form-control" name="descripcion" id="" rows="5" placeholder="Escribe aquí"></textarea>
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

                        <!-- Modal INFO MOVILIDADES -->
                        <div class="modal fade modal-lg" id="modalInfoMov<?= $movilidad['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Información de la movilidad N°<?= $movilidad['id'] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row">

                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" name="nombreDistrito" id="nombreDistrito" value="<?= $movilidad['nombre'] ?>" aria-describedby="helpId" disabled>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="" class="form-label">Descripción</label>
                                                    <textarea class="form-control" rows="4" disabled><?= $movilidad['descripcion'] ?></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha de creación</label>
                                                    <input type="text" class="form-control" value="<?= $movilidad['fecha_creado'] ?>" aria-describedby="helpId" disabled>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="" class="form-label">Usuario que creo el registro</label>
                                                    <input type="text" class="form-control" name="cp" id="cp" value="<?= $movilidad['usuario_creado'] ?>" aria-describedby="helpId" disabled>
                                                </div>

                                                <?php
                                                if ($movilidad['fecha_modificado'] != '') {
                                                ?>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Fecha de modificación</label>
                                                        <input type="text" class="form-control" value="<?= $movilidad['fecha_modificado'] ?>" aria-describedby="helpId" disabled>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Usuario que lo modifico</label>
                                                        <input type="text" class="form-control" value="<?= $movilidad['usuario_modificado'] ?>" aria-describedby="helpId" disabled>
                                                    </div>

                                                <?php
                                                }

                                                if ($movilidad['motivo_indisponible'] != '') {
                                                ?>
                                                    <hr>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Motivo de la indisponibilidad</label>
                                                        <textarea class="form-control" rows="5" disabled><?= $movilidad['motivo_indisponible'] ?></textarea>
                                                    </div>

                                                <?php
                                                }
                                                ?>

                                            </div>

                                            <div class="col-lg-6">

                                                <div class="mb-3">
                                                    <label for="" class="form-label">Estado</label>
                                                    <input type="text" class="form-control" value="<?= $movilidad['estado'] ?>" aria-describedby="helpId" disabled>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha de estado (Disponible/Ocupado/No disponible)</label>
                                                    <input type="text" class="form-control" value="<?= $movilidad['fecha_estado'] ?>" aria-describedby="helpId" disabled>
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

                        <!-- Modal CAMBIAR MOVILIDAD A NO DISPONIBLE -->
                        <div class="modal fade" id="modalIndisponible<?= $movilidad['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Establecer la indisponibilidad a la movilidad N°<?= $movilidad['id'] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="index.php?c=MovilidadController&a=cambiarEstadoIndisponible" method="post">
                                        <div class="modal-body">

                                            <input type="hidden" name="idMov" value="<?= $movilidad['id'] ?>">
                                            <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                            <p class="fs-6">Completar el siguiente campo para continuar</p>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Motivo de la indisponibilidad</label>
                                                <textarea class="form-control" name="motivoIndisponible" id="" rows="5" placeholder="Escribe aquí"></textarea>
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

                        <!-- Modal EDITAR MOVILIDAD -->
                        <div class="modal fade" id="modalEditarMov<?= $movilidad['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar la movilidad N°<?= $movilidad['id'] ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="index.php?c=MovilidadController&a=editarMovilidad" method="post">
                                        <div class="modal-body">

                                            <input type="hidden" name="idMov" value="<?= $movilidad['id'] ?>">
                                            <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                            <p class="fs-6">Modificar según corresponda</p>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" value="<?= $movilidad['nombre'] ?>" name="nombre" id="" aria-describedby="helpId">
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Descripción</label>
                                                <textarea class="form-control" name="descripcion" id="" rows="5"><?= $movilidad['descripcion'] ?></textarea>
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


                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
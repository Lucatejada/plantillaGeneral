<script type="text/javascript">
    function quitarAsignacionMovilidad(idMsj, idMovilidad) {
        if (confirm("Desea quitar la movilidad a la solicitud N° " + idMsj + "?")) {
            location.href = "index.php?c=MovilidadController&a=quitarMovilidadAsignada&idMsj=" + idMsj + "&idMov=" + idMovilidad;
        }
    }

    function quitarDistritoAsignado(idMsj) {
        if (confirm("Desea quitar el distrito a la solicitud N° " + idMsj + "?")) {
            location.href = "index.php?c=DistritosController&a=quitarDistritoAsignado&idMsj=" + idMsj;
        }
    }
</script>

<?php
error_reporting(E_ALL ^ E_WARNING);
if ($_SESSION['movAsignado']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-success border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle"></i>
                    La movilidad ha sido asignada a la solicitud!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['movAsignado']);
}
?>

<?php
if ($_SESSION['movQuitado']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    Se ha quitado la movilidad de la solicitud!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['movQuitado']);
}
?>

<!-- ALERTAS DE DISTRITOS -->
<?php
if ($_SESSION['distritoAsignado']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-success border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle"></i>
                    El distrito ha sido asignado
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['distritoAsignado']);
}
?>

<?php
if ($_SESSION['distritoQuitado']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    El distrito ha sido quitado de la solicitud
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['distritoQuitado']);
}
?>

<!-- ALERTAS DE AGENTES -->
<?php
if ($_SESSION['agenteAsignado']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-success border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle"></i>
                    El/La agente ha sido asignado a la solicitud exitosamente!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['agenteAsignado']);
}
?>

<?php
if ($_SESSION['asignadoAnteriormente']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-warning border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-exclamation-circle"></i>
                    Atención
                    <br>
                    El/La agente ya se encuentra asignado a esta solicitud
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['asignadoAnteriormente']);
}
?>

<?php
if ($_SESSION['asignacionQuitada']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    Se ha quitado la asignación de la solicitud al agente
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['asignacionQuitada']);
}
?>

<?php
if ($_SESSION['agenteNoSeleccionado']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-warning border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-exclamation-circle"></i>
                    Atención
                    <br>
                    No se seleccionó a ningún agente. Cambios no realizados
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['agenteNoSeleccionado']);
}
?>

<!-- Alertas de la accion CONCLUIR MENSAJE -->
<?php
if ($_SESSION['movilidadVacia']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-danger border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-x-circle"></i>
                    Error!
                    <br>
                    No se ha podido concluir la solicitud ya que no se estableció la movilidad. Completar e intente nuevamente
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['movilidadVacia']);
}
?>

<?php
if ($_SESSION['distritoVacio']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-danger border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-x-circle"></i>
                    Error!
                    <br>
                    No se ha podido concluir la solicitud ya que no se estableció el distrito. Completar e intente nuevamente
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['distritoVacio']);
}
?>

<?php
if ($_SESSION['movilidadDistritoVacio']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-danger border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-x-circle"></i>
                    Error!
                    <br>
                    No se ha podido concluir la solicitud ya que no se estableció la movilidad y el distrito. Completar e intente nuevamente
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['movilidadDistritoVacio']);
}
?>

<?php
if ($_SESSION['msjConcluido']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-success border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle"></i>
                    La solicitud de ayuda RCP ha sido concluida!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['msjConcluido']);
}
?>

<!-- MSJ CANCELADOS - Alertas -->

<?php
if ($_SESSION['msjCancelado']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    La solicitud de atención RCP ha sido cancelada
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['msjCancelado']);
}
?>

<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
</script>


<!-- DATATABLES -->

<script>
    $(document).ready(function() {
        $('#tablaDinamica').DataTable({
            lengthMenu: [25, 50, 100, 200],
            order: [0, 'desc'],
            language: {
                url: '../asset/Datatables/es.json'
            }
        });
    });
</script>

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

<div class="container">

    <div class="table-responsive-xxl" id="prueba">

    </div>

    <div class="row">
        <p class="fs-6 fw-bold">Listado de mensajes recibidos</p>
    </div>

    <div class="row mb-3">

        <div class="col-auto">

            <div class="mb-3">
                <input class="btn-check" type="radio" autocomplete="off" onclick="mostrarMsjxEstado(this);" value="0" name="flexRadioDefault" id="todosRadio">
                <label class="btn btn-outline-dark" for="todosRadio">
                    General
                </label>
            </div>

        </div>

        <div class="col-auto">
            <div class="mb-3">
                <input class="btn-check" type="radio" autocomplete="off" onclick="mostrarMsjxEstado(this);" value="1" name="flexRadioDefault" id="pendienteRadio">
                <label class="btn btn-outline-secondary" for="pendienteRadio">
                    Solicitudes pendientes
                </label>
            </div>
        </div>

        <div class="col-auto">
            <div class="mb-3">
                <input class="btn-check" type="radio" onclick="mostrarMsjxEstado(this);" value="2" name="flexRadioDefault" id="cursoRadio">
                <label class="btn btn-outline-primary" for="cursoRadio">
                    Solicitudes en curso
                </label>
            </div>
        </div>

        <div class="col-auto">
            <div class="mb-3">
                <input class="btn-check" type="radio" onclick="mostrarMsjxEstado(this);" value="3" name="flexRadioDefault" id="concluidoRadio">
                <label class="btn btn-outline-success" for="concluidoRadio">
                    Solicitudes concluidas
                </label>
            </div>
        </div>

        <div class="col-auto">
            <div class="mb-3">
                <input class="btn-check" type="radio" onclick="mostrarMsjxEstado(this);" value="4" name="flexRadioDefault" id="canceladoRadio">
                <label class="btn btn-outline-danger" for="canceladoRadio">
                    Solicitudes canceladas
                </label>
            </div>
        </div>

        <div class="col-auto">
            <div class="mb-3">
                <input class="btn-check" type="radio" onclick="mostrarMsjxEstado(this);" value="5" name="flexRadioDefault" id="eliminadoRadio">
                <label class="btn btn-outline-warning" for="eliminadoRadio">
                    Solicitudes eliminadas
                </label>
            </div>
        </div>

    </div>

    <div class="table-responsive-xxl">
        <table class="table table-striped table-hover" id="tablaDinamica">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Fecha enviado</th>
                    <th scope="col">Movilidad</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Asignado/s</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listMensajes as $mensaje) {
                ?>
                    <tr class="align-middle">
                        <td class="text-center"><?= $mensaje['id'] ?></td>
                        <td scope="row"><?= $mensaje['motivo'] ?></td>
                        <td scope="row"><?= $mensaje['celular'] ?></td>
                        <td scope="row"><?= $mensaje['ubicacion'] ?></td>
                        <td scope="row"><?= $mensaje['fecha_emergencia'] ?></td>
                        <td scope="row"><?= $mensaje['nombre_movilidad'] ?></td>
                        <td scope="row"><?= $mensaje['nombre_distrito'] ?></td>
                        <td class="text-center">
                            <?php
                            switch ($mensaje['estado']) {
                                case 'Pendiente':
                                    echo '<span class="badge rounded-pill text-bg-secondary">' . $mensaje["estado"] . '</span>';
                                    break;
                                case 'En curso':
                                    echo '<span class="badge rounded-pill text-bg-primary">' . $mensaje["estado"] . '</span>';
                                    break;
                                case 'Concluido':
                                    echo '<span class="badge rounded-pill text-bg-success">' . $mensaje["estado"] . '</span>';
                                    break;
                                case 'Cancelado':
                                    echo '<span class="badge rounded-pill text-bg-danger">' . $mensaje["estado"] . '</span>';
                                    break;
                                case 'Eliminado':
                                    echo '<span class="badge rounded-pill text-bg-warning">' . $mensaje["estado"] . '</span>';
                            }
                            ?>
                        </td>
                        <td><?= $mensaje['nombre_usuario'] ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Acción
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalMasInfo<?= $mensaje['id'] ?>">Más info</a>
                                    </li>

                                    <?php

                                    if ($mensaje['estado'] != 'Eliminado') {

                                        if ($mensaje['estado'] == 'En curso') {
                                    ?>
                                            <li>
                                                <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalAgregarObs<?= $mensaje['id'] ?>">Agregar observaciones y concluir la solicitud</a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if ($mensaje['nombre_movilidad'] == '' && $mensaje['estado'] != 'Concluido' && $mensaje['estado'] != 'Cancelado') {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalAsignarMovilidad<?= $mensaje['id'] ?>">Asignar movilidad encargada del procedimiento</a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if ($mensaje['nombre_movilidad'] != '' && $mensaje['estado'] != 'Concluido' && $mensaje['estado'] != 'Cancelado') {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" role="button" onclick="quitarAsignacionMovilidad(<?= $mensaje['id'] ?>, <?= $mensaje['id_movilidad'] ?>);">Quitar movilidad encargada del procedimiento</a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if ($mensaje['nombre_distrito'] == '' && $mensaje['estado'] != 'Concluido' && $mensaje['estado'] != 'Cancelado') {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalAsignarDistrito<?= $mensaje['id'] ?>">Asignar el distrito en donde ocurrió</a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if ($mensaje['nombre_distrito'] != '' && $mensaje['estado'] != 'Concluido' && $mensaje['estado'] != 'Cancelado') {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" role="button" onclick="quitarDistritoAsignado(<?= $mensaje['id'] ?>)">Quitar el distrito en donde ocurrió</a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if ($mensaje['estado'] != 'Concluido' && $mensaje['estado'] != 'Cancelado') {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalAsignarAgentes<?= $mensaje['id'] ?>">Asignar agentes que llevarán a cabo la solicitud</a>
                                            </li>

                                            <?php
                                            if (str_contains(strval($mensaje['dni']), $_SESSION['dni']) == false) {
                                            ?>
                                                <li>
                                                    <form action="index.php?c=UsuariosController&a=asignarAgentesSolicitud" method="post">
                                                        <input type="hidden" name="dni" value="<?= $_SESSION['dni'] ?>">
                                                        <input type="hidden" name="idMsj" value="<?= $mensaje['id'] ?>">
                                                        <input type="hidden" name="user" value="<?= $_SESSION['nombre'] ?>">
                                                        <button type="submit" class="dropdown-item">Asignarme la solicitud</button>
                                                    </form>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>


                                        <?php
                                        if ($mensaje['nombre_usuario'] != '' && $mensaje['estado'] != 'Concluido' && $mensaje['estado'] != 'Cancelado') {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalquitarAgentesMsj<?= $mensaje['id'] ?>">Quitar agentes que llevarán a cabo la solicitud</a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <?php
                                        if ($mensaje['estado'] != 'Concluido' && $mensaje['estado'] != 'Cancelado') {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" role="button" data-bs-toggle="modal" data-bs-target="#modalCancelarMsj<?= $mensaje['id'] ?>">Cancelar solicitud</a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal MÁS INFO -->
                    <div class="modal fade modal-lg" id="modalMasInfo<?= $mensaje['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Información de la solicitud N°<?= $mensaje['id'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Motivo</label>
                                                <input type="text" class="form-control" value="<?= $mensaje['motivo'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Celular</label>
                                                <input type="text" class="form-control" value="<?= $mensaje['celular'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Ubicación</label>
                                                <input type="text" class="form-control" value="<?= $mensaje['ubicacion'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Fecha enviado</label>
                                                <input type="text" class="form-control" value="<?= $mensaje['fecha_emergencia'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Movilidad</label>
                                                <input type="text" class="form-control" value="<?= $mensaje['nombre_movilidad'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Distrito</label>
                                                <input type="text" class="form-control" value="<?= $mensaje['nombre_distrito'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Estado de la solicitud</label>
                                                <input type="text" class="form-control" value="<?= $mensaje['estado'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                            </div>

                                            <?php
                                            if ($mensaje['fecha_en_curso'] != '') {
                                            ?>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha de asignación</label>
                                                    <input type="text" class="form-control" value="<?= $mensaje['fecha_en_curso'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($mensaje['estado'] == 'Concluido') {
                                            ?>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Observaciones</label>
                                                    <textarea class="form-control" name="" id="" rows="6" disabled><?= $mensaje['observaciones'] ?></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha de finalización</label>
                                                    <input type="text" class="form-control" value="<?= $mensaje['fecha_concluida'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if ($mensaje['nombre_usuario'] != '') {
                                                $asignados = $mensaje['nombre_usuario'];
                                            } else {
                                                $asignados = 'No hay agentes asignados';
                                            }
                                            ?>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Agentes asignados a la solicitud</label>
                                                <p class="fs-6 fst-italic"><?= $asignados ?></p>
                                            </div>

                                        </div>

                                    </div>


                                    <hr>

                                    <div class="row">
                                        <?php
                                        if ($mensaje['fecha_modificada'] != '') {
                                        ?>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha modificada</label>
                                                    <input type="text" class="form-control" value="<?= $mensaje['fecha_modificada'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Usuario que lo modifico</label>
                                                    <input type="text" class="form-control" value="<?= $mensaje['usuario_modificado'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if ($mensaje['fecha_cancelada'] != '') {
                                        ?>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha Cancelada</label>
                                                    <input type="text" class="form-control" value="<?= $mensaje['fecha_cancelada'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Usuario que cancelo la solicitud</label>
                                                    <input type="text" class="form-control" value="<?= $mensaje['usuario_cancelado'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Motivo de cancelación</label>
                                                    <textarea class="form-control" name="" id="" rows="3" disabled><?= $mensaje['motivo_cancelacion'] ?></textarea>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>

                                    <?php
                                    if ($mensaje['fecha_baja'] != '') {
                                    ?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha eliminada</label>
                                                    <input type="text" class="form-control" value="<?= $mensaje['fecha_baja'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Usuario que lo eliminó</label>
                                                    <input type="text" class="form-control" value="<?= $mensaje['usuario_baja'] ?>" name="" id="" aria-describedby="helpId" disabled>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Motivo de eliminación</label>
                                                    <textarea class="form-control" name="" id="" rows="3" disabled><?= $mensaje['motivo_baja'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>


                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal ASIGNAR MOVILIDAD -->
                    <div class="modal fade" id="modalAsignarMovilidad<?= $mensaje['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Movilidad encargada del procedimiento</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="index.php?c=MovilidadController&a=asignarMovilidad" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Movilidades disponibles</label>
                                            <select class="form-select" name="selectMovilidad" id="">
                                                <option selected>Seleccione...</option>

                                                <?php
                                                foreach ($listMovilidadesOk as $movilidad) {
                                                ?>
                                                    <option value="<?= $movilidad['id'] ?>"><?= $movilidad['nombre'] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                            <input type="hidden" name="idMsj" value="<?= $mensaje['id'] ?>">
                                            <input type="hidden" name="username" value="<?= $_SESSION['nombre'] ?>">
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

                    <!-- Modal ASIGNAR DISTRITO -->
                    <div class="modal fade" id="modalAsignarDistrito<?= $mensaje['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Asignar distrito en donde ocurrió</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="index.php?c=DistritosController&a=asignarDistrito" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Distritos</label>
                                            <select class="form-select" name="selectDistrito" id="">
                                                <option selected>Seleccione...</option>

                                                <?php
                                                foreach ($listDistritos as $distrito) {
                                                ?>
                                                    <option value="<?= $distrito['id'] ?>"><?= $distrito['nombre'] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                            <input type="hidden" name="idMsj" value="<?= $mensaje['id'] ?>">
                                            <input type="hidden" name="user" value="<?= $_SESSION['nombre'] ?>">
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

                    <!-- Modal ASIGNAR AGENTES -->
                    <div class="modal fade" id="modalAsignarAgentes<?= $mensaje['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Asignar agentes. Solicitud N°<?= $mensaje['id'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="index.php?c=UsuariosController&a=asignarAgentesSolicitud" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Listado de agentes</label>
                                            <select class="form-select" name="dni" id="">
                                                <option selected>Seleccione...</option>

                                                <?php
                                                foreach ($listUsuariosNoAdmin as $usuario) {
                                                ?>
                                                    <option value="<?= $usuario['dni'] ?>"><?= $usuario['nombre_apellido'] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>

                                            <input type="hidden" name="idMsj" value="<?= $mensaje['id'] ?>">
                                            <input type="hidden" name="user" value="<?= $_SESSION['nombre'] ?>">
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

                    <!-- Modal QUITAR AGENTES MSJ -->
                    <div class="modal fade" id="modalquitarAgentesMsj<?= $mensaje['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Quitar asignación. Solicitud N°<?= $mensaje['id'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="index.php?c=UsuariosController&a=quitarAsignacionMsj" method="post">
                                    <div class="modal-body">

                                        <input type="hidden" name="idMsj" value="<?= $mensaje['id'] ?>">
                                        <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                        <div class="mb-3">
                                            <label for="" class="form-label">Listado de agentes que llevan a cabo la solicitud</label>
                                            <p class="fs-6">Seleccione a los agentes que desea quitar de la solicitud</p>

                                            <?php
                                            require_once('../../model/UsuarioModel.php');
                                            $userModel = new UsuarioModel();
                                            $listadoAsignadosMsj = $userModel->verificarAgentesAsignados($mensaje['id']);


                                            foreach ($listadoAsignadosMsj as $userAsignados) {
                                            ?>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="agentesAsignados[]" value="<?= $userAsignados['dni'] ?>" role="switch" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault"><?= $userAsignados['nombre_apellido'] ?></label>
                                                </div>

                                            <?php
                                            }
                                            ?>

                                            <input type="hidden" name="idMsj" value="<?= $mensaje['id'] ?>">
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

                    <!-- Modal AGREGAR OBSERVACIONES MSJ -->
                    <div class="modal fade" id="modalAgregarObs<?= $mensaje['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Concluir la Solicitud N°<?= $mensaje['id'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="index.php?c=MensajesController&a=concluirMensaje" method="post">
                                    <div class="modal-body">

                                        <input type="hidden" name="idMsj" value="<?= $mensaje['id'] ?>">
                                        <input type="hidden" name="idMov" value="<?= $mensaje['id_movilidad'] ?>">
                                        <input type="hidden" name="movilidad" value="<?= $mensaje['nombre_movilidad'] ?>">
                                        <input type="hidden" name="distrito" value="<?= $mensaje['nombre_distrito'] ?>">

                                        <div class="mb-3">
                                            <label for="" class="form-label">Agregar una observación y concluir la solicitud de ayuda RCP</label>
                                            <textarea class="form-control" placeholder="Escribe aquí" name="observacion" id="" rows="8"></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-success">Concluir solicitud</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Modal CANCELAR MSJ -->
                    <div class="modal fade" id="modalCancelarMsj<?= $mensaje['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Cancelar la Solicitud N°<?= $mensaje['id'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="index.php?c=MensajesController&a=cancelarMsj" method="post">
                                    <div class="modal-body">

                                        <input type="hidden" name="idMsj" value="<?= $mensaje['id'] ?>">
                                        <input type="hidden" name="idMov" value="<?= $mensaje['id_movilidad'] ?>">
                                        <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                        <div class="mb-3">
                                            <label for="" class="form-label">Debe especificar el motivo por la cual se cancela</label>
                                            <textarea class="form-control" placeholder="Escribe aquí" name="motivoCancelacion" id="" rows="6"></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger">Cancelar solicitud</button>
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

<script>
    window.onload = function() {
        if (window.location.search == '?c=MensajesController&a=getPendientes') {
            document.getElementById('pendienteRadio').checked = true;
        } else if (window.location.search == '?c=MensajesController&a=getEnCurso') {
            document.getElementById('cursoRadio').checked = true;
        } else if (window.location.search == '?c=MensajesController&a=getConcluidos') {
            document.getElementById('concluidoRadio').checked = true;
        } else if (window.location.search == '?c=MensajesController&a=getCancelados') {
            document.getElementById('canceladoRadio').checked = true;
        } else if (window.location.search == '?c=MensajesController&a=getEliminados') {
            document.getElementById('eliminadoRadio').checked = true;
        } else {
            document.getElementById('todosRadio').checked = true;
        }
    }

    function mostrarMsjxEstado(valor) {
        var estado = valor.value;

        if (estado == 1) {
            location.href = 'index.php?c=MensajesController&a=getPendientes';
        } else if (estado == 2) {
            location.href = 'index.php?c=MensajesController&a=getEnCurso';
        } else if (estado == 3) {
            location.href = 'index.php?c=MensajesController&a=getConcluidos';
        } else if (estado == 4) {
            location.href = 'index.php?c=MensajesController&a=getCancelados';
        } else if (estado == 5) {
            location.href = 'index.php?c=MensajesController&a=getEliminados';
        } else {
            location.href = 'index.php?c=MensajesController&a=index';
        }

        // $.ajax({
        //     type: 'POST',
        //     url: 'mensajes/ajax/listarxEstadoAjax.php',
        //     data: 'estadoMsj='+ estado,
        //     success: function(r){
        //         $('#prueba').html(r);
        //     }
        // });

    }
</script>
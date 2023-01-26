<script>
    $(document).ready(function() {
        $('#tablaDinamica').DataTable({
            lengthMenu: [25, 50, 100, 200],
            stateSave: true,
            order: [
                [0, 'desc']
            ],
            language: {
                url: '../asset/Datatables/es.json'
            }
        });
    })
</script>

<div class="container">
    <p class="fs-6 fw-bold">Listado de mensajes en donde se desempeño <?= $nombre_apellido ?></p>

    <div class="row mb-3">
        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cantidad de solicitudes
                    <span class="badge bg-info rounded-pill"><?= $cantMsj ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    En curso
                    <span class="badge bg-primary rounded-pill"><?= $cantMsjEnCurso ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Concluidas
                    <span class="badge bg-success rounded-pill"><?= $cantMsjConcluido ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Canceladas
                    <span class="badge bg-danger rounded-pill"><?= $cantMsjCancelados ?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Eliminadas
                    <span class="badge bg-warning rounded-pill"><?= $cantMsjEliminados ?></span>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-responsive-xxl">
        <table class="table table-hover table-striped" id="tablaDinamica">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Fecha enviado</th>
                    <th scope="col">Movilidad</th>
                    <th scope="col">Distrito</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Asignado/s</th>
                    <th class="text-center" scope="col">Info</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listMsjAsignado as $msj) {
                ?>
                    <tr class="align-middle">
                        <td class="text-center"><?= $msj['id'] ?></td>
                        <td scope="row"><?= $msj['celular'] ?></td>
                        <td scope="row"><?= $msj['ubicacion'] ?></td>
                        <td scope="row"><?= $msj['fecha_emergencia'] ?></td>
                        <td scope="row"><?= $msj['nombre_movilidad'] ?></td>
                        <td scope="row"><?= $msj['nombre_distrito'] ?></td>
                        <td class="text-center">
                            <?php
                            switch ($msj['estado']) {
                                case 'Pendiente':
                                    echo '<span class="badge rounded-pill text-bg-secondary">' . $msj["estado"] . '</span>';
                                    break;
                                case 'En curso':
                                    echo '<span class="badge rounded-pill text-bg-primary">' . $msj["estado"] . '</span>';
                                    break;
                                case 'Concluido':
                                    echo '<span class="badge rounded-pill text-bg-success">' . $msj["estado"] . '</span>';
                                    break;
                                case 'Cancelado':
                                    echo '<span class="badge rounded-pill text-bg-danger">' . $msj["estado"] . '</span>';
                                    break;
                                case 'Eliminado':
                                    echo '<span class="badge rounded-pill text-bg-warning">' . $msj["estado"] . '</span>';
                            }
                            ?>
                        </td>
                        <td><?= $msj['nombre_usuario'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInfo<?= $msj['id'] ?>"><i class="bi-info-circle"></i></button>
                        </td>
                    </tr>

                    <!-- MODAL INFO -->
                    <div class="modal fade modal-lg" id="modalInfo<?= $msj['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Información de la solicitud N°<?= $msj['id'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <?php
                                    require_once('../../model/UsuarioModel.php');
                                    $userModel = new UsuarioModel();
                                    $listMensajesxId = $userModel->listarMsjAsignadosxIdM($msj['id']);

                                    foreach ($listMensajesxId as $msjId) {
                                    ?>

                                        <div class="row">

                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Motivo</label>
                                                    <input type="text" class="form-control" value="<?= $msjId['motivo'] ?>" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Celular</label>
                                                    <input type="text" class="form-control" value="<?= $msjId['celular'] ?>" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Ubicación</label>
                                                    <input type="text" class="form-control" value="<?= $msjId['ubicacion'] ?>" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fecha enviado</label>
                                                    <input type="text" class="form-control" value="<?= $msjId['fecha_emergencia'] ?>" aria-describedby="helpId" disabled>
                                                </div>

                                                <?php
                                                if ($msjId['fecha_modificada'] != '') {
                                                ?>
                                                    <div class="mb-3">
                                                        <hr>
                                                        <label for="" class="form-label">Fecha editada</label>
                                                        <input type="text" class="form-control" value="<?= $msjId['fecha_modificada'] ?>" aria-describedby="helpId" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Usuario que lo edito</label>
                                                        <input type="text" class="form-control" value="<?= $msjId['usuario_modificado'] ?>" aria-describedby="helpId" disabled>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if ($msj['fecha_cancelada'] != '') {
                                                ?>
                                                    <div class="mb-3">
                                                        <hr>
                                                        <label for="" class="form-label">Fecha cancelada</label>
                                                        <input type="text" class="form-control" value="<?= $msjId['fecha_cancelada'] ?>" aria-describedby="helpId" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Usuario que lo cancelo</label>
                                                        <input type="text" class="form-control" value="<?= $msjId['usuario_cancelado'] ?>" aria-describedby="helpId" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Motivo de la cancelación</label>
                                                        <textarea class="form-control" rows="5" disabled><?= $msjId['motivo_cancelacion'] ?></textarea>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if ($msjId['fecha_baja'] != '') {
                                                ?>
                                                    <div class="mb-3">
                                                        <hr>
                                                        <label for="" class="form-label">Fecha eliminada</label>
                                                        <input type="text" class="form-control" value="<?= $msjId['fecha_baja'] ?>" aria-describedby="helpId" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Usuario que lo elimino</label>
                                                        <input type="text" class="form-control" value="<?= $msjId['usuario_baja'] ?>" aria-describedby="helpId" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Motivo eliminado</label>
                                                        <textarea class="form-control" rows="5" disabled><?= $msjId['motivo_baja'] ?></textarea>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>


                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Nombre de la movilidad</label>
                                                    <input type="text" class="form-control" value="<?= $msjId['nombre_movilidad'] ?>" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Distrito</label>
                                                    <input type="text" class="form-control" value="<?= $msjId['nombre_distrito'] ?>" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Estado</label>
                                                    <input type="text" class="form-control" value="<?= $msjId['estado'] ?>" aria-describedby="helpId" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Usuario/s asignados</label>
                                                    <p class="fs-6 fst-italic"><?= $msjId['nombre_usuario'] ?></p>
                                                </div>

                                                <?php
                                                if ($msjId['fecha_en_curso'] != '') {
                                                ?>
                                                    <div class="mb-3">
                                                        <hr>
                                                        <label for="" class="form-label">Fecha del estado 'En curso'</label>
                                                        <input type="text" class="form-control" value="<?= $msjId['fecha_en_curso'] ?>" aria-describedby="helpId" disabled>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if ($msjId['fecha_concluida'] != '') {
                                                ?>
                                                    <div class="mb-3">
                                                        <hr>
                                                        <label for="" class="form-label">Fecha concluida</label>
                                                        <input type="text" class="form-control" value="<?= $msjId['fecha_concluida'] ?>" aria-describedby="helpId" disabled>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Observaciones</label>
                                                        <textarea class="form-control" name="" id="" rows="5" disabled><?= $msjId['observaciones'] ?></textarea>
                                                    </div>
                                                <?php
                                                }
                                                ?>

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
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
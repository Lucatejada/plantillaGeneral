<script>
    $(document).ready(function() {
        var table = $('#tablaDinamica').DataTable({
            lengthMenu: [25, 50, 100, 200],
            stateSave: true,
            language: {
                url: '../asset/Datatables/es.json'
            }
        });

    })
</script>

<!-- <script>
    function removerBaja(dni, rol) {
        if (confirm('Restaurar el usuario con el DNI N° ' + dni + '?\nEl mencionado volvera a tener el rol de ' + rol)) {
            location.href = 'index.php?c=UsuariosController&a=removerBaja&dni=' + dni + '&rol=' + rol;
        }
    }
</script> -->

<div class="container">
    <p class="fs-6 fw-bold">Listado de usuarios de baja</p>

    <div class="table-responsive-xxl">
        <table class="table table-hover table-striped" id="tablaDinamica">
            <thead>
                <tr>
                    <th scope="col">Dni</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha de baja</th>
                    <th scope="col">Motivo baja</th>
                    <th scope="col">Info</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listBajas as $usuario) {
                ?>
                    <tr class="align-middle">
                        <td scope="row"><?= $usuario['dni'] ?></td>
                        <td scope="row"><?= $usuario['nombre'] ?></td>
                        <td scope="row"><?= $usuario['apellido'] ?></td>
                        <td scope="row"><?= $usuario['username'] ?></td>
                        <td scope="row"><?= $usuario['fecha_baja'] ?></td>
                        <td scope="row"><?= $usuario['motivo_baja'] ?></td>
                        <td class="text-center">

                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInfo<?= $usuario['dni'] ?>"><i class="bi-info-circle"></i></button>

                            <!-- <div class="dropdown open">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Acciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    
                                    <a class="dropdown-item" role="button" onclick="removerBaja(<?= $usuario['dni'] ?>, '<?= $usuario['rol_anterior'] ?>')">Restaurar usuario</a>
                                </div>
                            </div> -->

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
                                                <input type="text" class="form-control" value="<?= $usuario['rol_anterior'] ?>" aria-describedby="helpId" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Último acceso al sistema</label>
                                                <input type="text" class="form-control" value="<?= $usuario['ultimo_acceso'] ?>" aria-describedby="helpId" disabled>
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
                                                <hr>
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

                                            <hr>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Fecha de baja</label>
                                                <input type="text" class="form-control" value="<?= $usuario['fecha_baja'] ?>" aria-describedby="helpId" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Motivo de baja</label>
                                                <textarea class="form-control" rows="5" disabled><?= $usuario['motivo_baja'] ?></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Usuario que le dio de baja</label>
                                                <input type="text" class="form-control" value="<?= $usuario['usuario_baja'] ?>" aria-describedby="helpId" disabled>
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
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
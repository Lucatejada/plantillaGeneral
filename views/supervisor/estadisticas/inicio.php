<script>
    $(document).ready(function() {
        $('#tablaDinamica').DataTable({
            paging: false,
            lengthMenu: [50],
            ordering: false,
            language: {
                url: '../asset/Datatables/es.json'
            }
        });
    })
</script>

<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
</script>

<style>
    .row a {
        text-decoration: none;
    }

    .row a:hover {
        text-decoration: underline;
    }
</style>

<div class="container">

    <p class="fs-6 fw-bold">Bienvenido</p>

    <div class="row mb-3">

        <div class="col-lg-6 mb-3">

            <div class="rounded bg-light px-4 pt-3 pb-3">

                <p class="fs-6">Solicitudes</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-auto">
                        <div class="card border-info mb-3">
                            <div class="card-header">Mensajes de atención RCP</div>
                            <a class="text-info" href="index.php?c=MensajesController&a=index">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantTotalMsj ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center">

                    <div class="col-md-6">
                        <div class="card border-secondary mb-3">
                            <div class="card-header">En espera de una acción</div>
                            <a class="text-secondary" href="index.php?c=MensajesController&a=getPendientes">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantPendientes ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="card border-primary mb-3">
                            <div class="card-header">Llevandose a cabo</div>
                            <a class="text-primary" href="index.php?c=MensajesController&a=getEnCurso">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantEnCurso ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card border-success mb-3">
                            <div class="card-header">Concluidos</div>
                            <a class="text-success" href="index.php?c=MensajesController&a=getConcluidos">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantConcluidos ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card border-danger mb-3">
                            <div class="card-header">Cancelados</div>
                            <a class="text-danger" href="index.php?c=MensajesController&a=getCancelados">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantCancelados ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card border-warning mb-3">
                            <div class="card-header">Eliminados</div>
                            <a class="text-warning" href="index.php?c=MensajesController&a=getEliminados">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantEliminados ?></h5>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-6 mb-3">

            <div class="rounded bg-light px-4 pt-3 pb-3">

                <p class="fs-6">Distritos de Guaymallén</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border-info mb-3">
                            <div class="card-header">Cantidad</div>
                            <a class="text-info" href="index.php?c=DistritosController&a=index">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantDistritos ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <p class="fs-6 mb-1">Cantidad de solicitudes de atención</p>

                    <div class="table-responsive-lg overflow-auto pt-1" style="max-height: 285px;">
                        <table class="table table-striped table-hover" id="tablaDinamica">
                            <thead>
                                <tr>
                                    <th scope="col">Distrito</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listMsjDistritos as $distrito) {
                                ?>
                                    <tr class="">
                                        <td scope="row"><?= $distrito['nombre'] ?></td>
                                        <td><?= $distrito['total'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>

        </div>

    </div>

    <!--Segunda fila-->

    <div class="row mb-3">

        <!-- Movilidades -->
        <div class="col-lg-6 mb-3">

            <div class="rounded bg-light px-4 pt-3 pb-3">

                <p class="fs-6">Movilidades</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border-info mb-3">
                            <div class="card-header">Cantidad</div>
                            <a class="text-info" href="index.php?c=MovilidadController&a=index">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantMovilidades ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-evenly">

                    <div class="col-auto">

                        <div class="card border-success mb-3">
                            <div class="card-header">Disponible</div>
                            <div class="card-body">
                                <h4 class="card-title fs-2"><?= $cantMovDisponibles ?></h4>
                                <p class="card-text">Unidades en total</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-auto">

                        <div class="card border-danger mb-3">
                            <div class="card-header">Ocupado</div>
                            <div class="card-body">
                                <h4 class="card-title fs-2"><?= $cantMovOcupadas ?></h4>
                                <p class="card-text">Unidades en total</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row justify-content-evenly">

                    <div class="col-auto">

                        <div class="card border-secondary mb-3">
                            <div class="card-header">No disponible</div>
                            <div class="card-body">
                                <h4 class="card-title fs-2"><?= $cantMovNoDisponibles ?></h4>
                                <p class="card-text">Unidades en total</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-auto">

                        <div class="card border-warning mb-3">
                            <div class="card-header">Baja</div>
                            <div class="card-body">
                                <h4 class="card-title fs-2"><?= $cantMovBajas ?></h4>
                                <p class="card-text">Unidades en total</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Usuarios -->

        <div class="col-lg-6 mb-3">

            <div class="rounded bg-light px-4 pt-3 pb-3">

                <p class="fs-6">Usuarios</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border-info mb-3">
                            <div class="card-header">Cantidad</div>
                            <a class="text-info" href="index.php?c=UsuariosController&a=index">
                                <div class="card-body">
                                    <h5 class="card-title fs-2"><?= $cantUsuarios ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-4">

                        <div class="card border-info mb-3">
                            <div class="card-header">Administradores</div>
                            <div class="card-body">
                                <h4 class="card-title fs-2"><?= $cantAdmins ?></h4>
                                <p class="card-text">Total</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="card border-info mb-3">
                            <div class="card-header">Supervisores</div>
                            <div class="card-body">
                                <h4 class="card-title fs-2"><?= $cantSupervisores ?></h4>
                                <p class="card-text">Total</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="card border-info mb-3">
                            <div class="card-header">Agentes</div>
                            <div class="card-body">
                                <h4 class="card-title fs-2"><?= $cantAgentes ?></h4>
                                <p class="card-text">Total</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="card border-warning mb-3">
                            <div class="card-header">
                                Bajas
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?= $cantUsuariosBaja ?></h4>
                                <p class="card-text">Total</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
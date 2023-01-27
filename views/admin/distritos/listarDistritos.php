<script>
    $(document).ready(function() {
        $('#tablaDinamica').DataTable({
            paging: false,
            lengthMenu: [50],
            stateSave: true,
            language: {
                url: '../asset/Datatables/es.json'
            }
        });
    })
</script>

<?php
error_reporting(0);
if ($_SESSION['distritoEditado']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    El distrito ha sido modificado
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['distritoEditado']);
}
?>

<?php
if ($_SESSION['distritoEliminado']) {
?>
    <div class="toast-container position-fixed top-0 end-0 p-3">

        <div class="toast align-items-center text-bg-primary border-0" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-info-circle"></i>
                    El distrito ha sido dado de baja
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

    </div>
<?php
    unset($_SESSION['distritoEliminado']);
}
?>

<script>
    const toastLiveExample = document.getElementById('liveToast')
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
</script>

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->

<div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a type="button" href="index.php?c=EstadisticasController&a=index"> Volver al estadisticas</a>
    </div>
    <div class="row mb-3 justify-content-between">
        <div class="col-auto">
            <p class="fs-6 fw-bold">Listado de distritos de Guaymallén</p>
        </div>

    </div>
    <div class="table-responsive-xxl pb-4">

        <table class="table table-striped table-hover" id="tablaDinamica">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Codigo postal</th>
                <th>Acción</th>
            </thead>
            <tbody>
                <?php
                foreach ($listDistritos as $distrito) {
                ?>
                    <tr class="align-middle">
                        <td class="text-center"><?= $distrito['id'] ?></td>
                        <td><?= $distrito['nombre'] ?></td>
                        <td><?= $distrito['codigo_postal'] ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalInfoDistrito<?= $distrito['id'] ?>">
                                <i class="bi bi-info-circle"></i>
                                Info
                            </button>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEditarDistrito<?= $distrito['id'] ?>">
                                <i class="bi bi-pencil-square"></i>
                                Editar
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarDistrito<?= $distrito['id'] ?>">
                                <i class="bi bi-x-circle"></i>
                                Eliminar
                            </button>
                        </td>
                    </tr>

                    <!-- Modal INFO DISTRITO -->
                    <div class="modal fade" id="modalInfoDistrito<?= $distrito['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Información del distrito N°<?= $distrito['id'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <div class="mb-3">
                                        <label for="" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombreDistrito" id="nombreDistrito" value="<?= $distrito['nombre'] ?>" aria-describedby="helpId" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Código Postal</label>
                                        <input type="text" class="form-control" name="cp" id="cp" value="<?= $distrito['codigo_postal'] ?>" aria-describedby="helpId" disabled>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal NUEVO DISTRITO -->
                    <div class="modal fade" id="modalNuevoDistrito" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo distrito</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="index.php?c=DistritosController&a=agregarDistrito" method="post">
                                    <div class="modal-body">
                                        <p class="fs-6">Completar los siguientes campos</p>

                                        <input type="hidden" name="userActual" value="<?= $_SESSION['nombre'] ?>">

                                        <div class="mb-3">
                                            <label for="" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" name="nombreDistrito" id="nombreDistrito" aria-describedby="helpId" placeholder="Escribe aquí">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Código Postal</label>
                                            <input type="number" class="form-control" name="cp" id="cp" aria-describedby="helpId" placeholder="Escribe aquí">
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

                    <!-- Modal EDITAR DISTRITO -->
                    <div class="modal fade" id="modalEditarDistrito<?= $distrito['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar distrito N°<?= $distrito['id'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="index.php?c=DistritosController&a=editarDistrito" method="post">
                                    <div class="modal-body">
                                        <p class="fs-6">Completar los siguientes campos</p>

                                        <input type="hidden" value="<?= $distrito['id'] ?>" name="idDistrito">
                                        <input type="hidden" value="<?= $_SESSION['nombre'] ?>" name="userActual">

                                        <div class="mb-3">
                                            <label for="" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" name="nombreDistrito" id="nombreDistrito" value="<?= $distrito['nombre'] ?>" aria-describedby="helpId" placeholder="Escribe aquí">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Código Postal</label>
                                            <input type="number" class="form-control" name="cp" id="cp" value="<?= $distrito['codigo_postal'] ?>" aria-describedby="helpId" placeholder="Escribe aquí">
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

                    <!-- Modal ELIMINAR DISTRITO -->
                    <div class="modal fade" id="modalEliminarDistrito<?= $distrito['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar distrito N°<?= $distrito['id'] ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="index.php?c=DistritosController&a=eliminarDistrito" method="post">
                                    <div class="modal-body">
                                        <p class="fs-6">
                                            Nota: El distrito no se eliminará del sistema, quedará guardado en la base de datos, pero no podrá estar disponible para las solicitudes de mensajes
                                            <br>
                                            Completar lo siguiente
                                        </p>

                                        <input type="hidden" value="<?= $distrito['id'] ?>" name="idDistrito">
                                        <input type="hidden" value="<?= $_SESSION['nombre'] ?>" name="userActual">

                                        <div class="mb-3">
                                            <label for="" class="form-label">Motivo de baja</label>
                                            <textarea class="form-control" name="motivoBaja" id="" rows="5" placeholder="Escribe aquí"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-danger">Dar de baja</button>
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
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.js"></script> -->


<script>
    $(document).ready(function() {
        $('#tablaD').DataTable({
            lengthMenu: [10, 20, 50, 100],
            order: [1, 'asc'],
            language: {
                url: "../asset/Datatables/es.json",
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
            <p> *Con el boton de acciones podras ver mas datos sobre la persona: </p>
            <p class="fs-6 fw-bold">Listado de usuarios en total</p>
        </div>
    </div>
    <div class="row justify-content-between">
        <!-- <div class="col-auto">
            <a href="index.php?c=UsuariosController&a=listarBajas" class="link-danger">Usuarios de baja</a>
            <a role="button" data-bs-toggle="modal" data-bs-target="#modalAgregarUsuario" class="link-success">Nuevo usuario</a>
    </div> -->
    </div>

    <div class="table-responsive-fluid">
        <table class="table table-striped table-hover" id="tablaD">
            <thead>
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listPersonas as $personas) {
                ?>
                    <tr class="align-middle">
                        <td scope="row"><?= $personas['dni'] ?></td>
                        <td><?= $personas['nombre'] ?></td>
                        <td><?= $personas['apellido'] ?></td>
                        <td><?= $personas['tipo_genero'] ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalMasInfo<?= $personas['dni'] ?>">
                                <i class="bi bi-eye"></i> Más datos
                            </button>
                            <a type="button" class="btn btn-outline-success" href="index.php?c=EstadisticasController&a=mostrarRtas">
                                <i class="bi bi-eye"></i> Salud </a>

                        </td>
                    </tr>

                    <!-- Modal mas datos-->

                    <div class="modal fade" id="modalMasInfo<?= $personas['dni'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title fs-5" id="exampleModalLabel"> Datos de <?= $personas['nombre'] ?></p>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nombre completo</label>
                                        <input type="text" class="form-control" value="<?= $personas["nombre"] . " " . $personas["apellido"] ?>" aria-describedby="helpId" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label"> DNI </label>
                                        <input type="text" class="form-control" value="<?= $personas["dni"] ?>" aria-describedby="helpId" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label"> Correo </label>
                                        <input type="text" class="form-control" value="<?= $personas['email'] ?>" aria-describedby="helpId" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Fecha de nacimiento</label>
                                        <input type="text" class="form-control" value="<?= $personas['fecha_nacimiento'] ?>" aria-describedby="helpId" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Celular</label>
                                        <input type="text" class="form-control" value="<?= $personas['telefono'] ?>" aria-describedby="helpId" disabled>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="" class="form-label">Distrito</label>
                                        <input type="text" class="form-control" value="<?= $personas['nombre_distrito'] ?>" aria-describedby="helpId" disabled>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
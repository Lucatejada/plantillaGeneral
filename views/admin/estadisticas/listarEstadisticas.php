<script>
    $(document).ready(function() {
        $('#table').DataTable({
            lengthMenu: [10, 20, 50, 100],
            order: [1, 'asc'],
            language: {
                url: "../asset/Datatables/es.json",
            }
        });
    })
</script>

<div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a type="button" href="index.php?c=EstadisticasController&a=index"> Volver al estadisticas</a>
    </div>
    <p class="fs-6 fw-bold">
        Estadisticas
        <br>
    </p>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">DNI</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">El que se suscribe</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listaRespuestas as $asistencia) {
                            ?>
                                <tr>

                                    <td> <?= $asistencia["cuil"] ?></td>
                                    <td><?= $asistencia["nombre"] . " " . $asistencia["apellido"] ?></td>

                                    <td><?= $asistencia["nombre_tutor"] ?></td>

                                    <td>
                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalMasInfo<?= $asistencia['cuil'] ?>">
                                            <i class="bi bi-eye"></i> Ver más
                                        </button>
                                    </td>

                                </tr>
                                <div class="modal fade" id="modalMasInfo<?= $asistencia['cuil'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title fs-5" id="exampleModalLabel">Viendo el registro de: <?= $asistencia["nombre"] . " " . $asistencia["apellido"] ?> </p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Telefono</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["telefono"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Telefono de Emergencia</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["telEmergencia"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Peso</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["peso"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Sangre</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["sangre"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Talle</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["talle"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Enfermedades dentro de los 60 dias</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["uno"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Problemas cardiovasculares</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["dos"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Problemas respiratorios</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["tres"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Alergias</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["cuatro"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Enfermedades sufridas</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["cinco"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Operaciones</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["seis"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Fracturas</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["siete"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Problemas en la columna vertebral</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["ocho"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Problemas de vision</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["nueve"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Problemas endocrinos</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["diez"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Problemas en el sistema nervioso</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["once"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Posee limitaciones para realizar actividad fisica</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["trece"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">En la actualidad vive con: </label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["catorce"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Sugerencias</label>
                                                    <input type="text" class="form-control" value="<?= $asistencia["quince"] ?>" aria-describedby="helpId" placeholder="" disabled>
                                                </div>
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

                    </table><br><br>
                    <a class="btn btn-primary" href="index.php?c=UsuariosController&a=index"> Regresar</a>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-6">
            <canvas id="myChart"></canvas>
        </div>
    </div>


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                foreach ($listaRespuestas as $respuesta) {
                    echo "'" . $respuesta['estado'] . "', ";
                }
                ?>
            ],
            datasets: [{
                data: [
                    <?php
                    foreach ($listMsjxEstado as $estado) {
                        echo $estado['total'] . ', ';
                    }
                    ?>
                ],
                backgroundColor: [
                    'Lightgray',
                    'LightSkyBlue',
                    'LightGreen',
                    'LightCoral',
                    'LightYellow',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Total de mensajes (' + <?= $cantMsj ?> + ')'
                },
                legend: {
                    display: false
                },
            }
        }
    });
</script>
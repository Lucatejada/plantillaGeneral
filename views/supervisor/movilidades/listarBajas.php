<script>
    $(document).ready(function() {
        var table = $('#tablaDinamica').DataTable({
            lengthMenu: [25, 50, 100, 200],
            stateSave: true,
            language: {
                url: '../asset/Datatables/es.json'
            },
            columnDefs: [{
                    target: 3,
                    visible: false,
                },
                {
                    target: 4,
                    visible: false,
                },
                {
                    target: 5,
                    visible: false,
                },
                {
                    target: 6,
                    visible: false,
                }
            ],
        });

        $('a.toggle-vis').on('click', function(e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column($(this).attr('data-column'));

            // Toggle the visibility
            column.visible(!column.visible());
        });
    })
</script>

<div class="container">

    <p class="fs-6 fw-bold">Listado de movilidades de baja</p>

    <div class="table-responsive-xxl">

        <p class="fs-6">Columnas - Seleccionar que dato quiere visualizar y/o quitar</p>
        <div class="d-flex flex-row justify-content-evenly">
            <a role="button" class="toggle-vis" data-column="0">#</a> /
            <a role="button" class="toggle-vis" data-column="1">Nombre</a> /
            <a role="button" class="toggle-vis" data-column="2">Descripción</a> /
            <a role="button" class="toggle-vis" data-column="3">Fecha creado</a> /
            <a role="button" class="toggle-vis" data-column="4">Usuario que lo creo</a> /
            <a role="button" class="toggle-vis" data-column="5">Fecha editado</a> /
            <a role="button" class="toggle-vis" data-column="6">Usuario que lo edito</a> /
            <a role="button" class="toggle-vis" data-column="7">Fecha de baja</a> /
            <a role="button" class="toggle-vis" data-column="8">Motivo de baja</a> /
            <a role="button" class="toggle-vis" data-column="9">Usuario que le dio de baja</a>
        </div>
        <br>

        <table class="table table-hover table-striped" id="tablaDinamica">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Usuario que lo creo</th>
                    <th scope="col">Fecha de edición</th>
                    <th scope="col">Usuario que lo edito</th>
                    <th scope="col">Fecha de baja</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Usuario que realizo la acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listBajas as $movbaja) {
                ?>
                    <tr class="align-middle">
                        <td class="text-center"><?= $movbaja['id'] ?></td>
                        <td><?= $movbaja['nombre'] ?></td>
                        <td><?= $movbaja['descripcion'] ?></td>
                        <td><?= $movbaja['fecha_creado'] ?></td>
                        <td><?= $movbaja['usuario_creado'] ?></td>
                        <td><?= $movbaja['fecha_modificado'] ?></td>
                        <td><?= $movbaja['usuario_modificado'] ?></td>
                        <td><?= $movbaja['fecha_baja'] ?></td>
                        <td><?= $movbaja['motivo_baja'] ?></td>
                        <td><?= $movbaja['usuario_baja'] ?></td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>
    </div>


</div>
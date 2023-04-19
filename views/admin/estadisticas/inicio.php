

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

<div class="container fs-6 ">

    <p class="fs-6 fw-bold text-center">¡Base de datos general!</p>

    <div class="row mb-3">

        <div class=" mb-3">
            <div class="border  rounded px-4 pt-3 pb-3">
                <p class="fs-6">Bienvenido <?= $_SESSION['nombre'] ?></p>
            </div>
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-lg-6 mb-3">

            <div class="border rounded px-4 pt-3 pb-3">

                <!--  USUARIOS  -->

                <p class="fs-6"> Salud y Deporte </p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border-success mb-3">
                            <div class="card-header">Datos de Deporte</div>
                            <a class="text-success" href="index.php?c=EstadisticasController&a=mostrarRtas">
                                <div class="card-body text-center">

                                    <h5 class="card-title fs-2"> <?= $registroSalud ?> </h5>
                                    <p class="card-text "> Personas registadas en total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <div class="col-lg-6 mb-3">

            <div class="border rounded ed px-4 pt-3 pb-3">

                <!--  Distritos  -->

                <p class="fs-6">Distritos de Guaymallén</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border-success mb-3">
                            <div class="card-header">Cantidad</div>
                            <a class="text-success" href="index.php?c=DistritosController&a=index">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-2"><?= $cantDistritos ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">



                </div>

            </div>

        </div>
    </div>



    <!--Segunda fila-->

    <div class="row mb-3">

        <div class="col-lg-6 mb-3">

            <div class="border rounded ed px-4 pt-3 pb-3">



                <p class="fs-6">Personas registradas</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border-success mb-3">
                            <div class="card-header">Cantidad</div>
                            <a class="text-success" href="index.php?c=UsuariosController&a=index">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-2"><?= $cantPersonas ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">

                    <div class="col-lg-4">

                        <div class="card border-success mb-3">
                            <div class="card-header">Hombres</div>
                            <a class="text-success" href="index.php?c=UsuariosController&a=index">
                                <div class="card-body text-center">
                                    <h4 class="card-title fs-2"><?= $cantHombres ?></h4>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="card border-success mb-3">
                            <div class="card-header">Mujeres</div>
                            <a class="text-success" href="index.php?c=UsuariosController&a=index">
                                <div class="card-body text-center">
                                    <h4 class="card-title fs-2"><?= $cantMujeres ?></h4>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="card border-success mb-3">
                            <div class="card-header">No binario</div>
                            <a class="text-success" href="index.php?c=UsuariosController&a=index">
                                <div class="card-body text-center">
                                    <h4 class="card-title fs-2"><?= $cantNb ?></h4>
                                    <p class="card-text">Total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 mb-3">

            <div class="px-4 pt-3 pb-3 border rounded">

                <p class="fs-6">Distritos de Guaymallén</p>

                <div class="row mb-3 justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border-success mb-3">
                            <div class="card-header">Cantidad</div>
                            <a class="text-success" href="index.php?c=DistritosController&a=index">
                                <div class="card-body text-center">
                                    <h5 class="card-title fs-2"><?= $cantDistritos ?></h5>
                                    <p class="card-text">En total</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



</div>
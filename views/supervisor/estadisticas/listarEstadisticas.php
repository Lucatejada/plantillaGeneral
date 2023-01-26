<div class="container">
    <p class="fs-6 fw-bold">
        Estadisticas
        <br>
        <?= $filtro ?>
    </p>

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
                foreach ($listMsjxEstado as $estado) {
                    echo "'" . $estado['estado'] . "', ";
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
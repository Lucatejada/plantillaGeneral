<?php

require_once('../../../../model/MensajeModel.php');
$modelMsj = new MensajesModel();

$estadoMsj = $_POST['estadoMsj'];

$listMensajes = $modelMsj->getMsjxEstadoM('awd');

$html = '<table class="table table-striped table-hover">
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
<tbody>';

foreach ($listMensajes as $mensaje) {
    $html .= '<tr class="align-middle">
    <td class="text-center">' . $mensaje["id"] . '</td>
    <td>' . $mensaje["motivo"] . '</td>
    <td>' . $mensaje["celular"] . '</td>
    <td>' . $mensaje["ubicacion"] . '</td>
    <td>' . $mensaje["fecha_emergencia"] . '</td>
    <td>' . $mensaje["nombre_movilidad"] . '</td>
    <td>' . $mensaje["nombre_distrito"] . '</td>';
}

echo $html;

// echo json_encode($listMensajes, JSON_UNESCAPED_UNICODE);
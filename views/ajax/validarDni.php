<?php

$dni = $_POST['dni'];

$link = mysqli_connect('localhost', 'root', '', 'rcp_ya');
$sql = "select * from usuario u
        where u.dni = '$dni'";
$result = mysqli_query($link, $sql);
$filas = mysqli_num_rows($result);

$html = '';

if ($filas > 0) {
    $html = 'Ya hay un usuario con este DNI. Intente nuevamente';
    $html .= "<script>$('#btnAgregar').prop('disabled', true);</script>";
} else {
    $html = '';
    $html .= "<script>$('#btnAgregar').prop('disabled', false);</script>";
}

echo $html;

<?php
error_reporting(0);
//Unimos usuario a post para que reciba los datos del form 
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['cuil'];
//creamos el inicio de session 
session_start();
//Hacemos el inicio de sesion por nombre
$_POST['nombre']=$nombre;
//Incluimos base de datos 
include_once('conexion.php');  


?>
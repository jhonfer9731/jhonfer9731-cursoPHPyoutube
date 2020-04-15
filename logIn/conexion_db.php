<?php

$usuario = "jhonfer9731";
$contrasena = "7DgRK4M5b5uDian3";
$host = "localhost";
$baseDatos = "usuariosV1";
$conexion = new mysqli($host,$usuario,$contrasena,$baseDatos);
if(mysqli_connect_error())
{
    echo $conexion->error;
    die;
}
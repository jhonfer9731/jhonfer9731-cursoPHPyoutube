<?php

$usuario = "jhonfer9731";
$contrasena = "7DgRK4M5b5uDian3";
$lost = "localhost";
$baseDatos = "usuariosV1";
$tabla = "cuentas";

$conexion = new mysqli($lost,$usuario,$contrasena);

if(mysqli_connect_error()){
    die("Conexion fallida: ".mysqli_connect_error());
}
echo "Connected successfully to data base: {$baseDatos} <br>";

$mensaje = $conexion->query("CREATE DATABASE {$baseDatos}") ? "Base de datos creada" : "no se pudo crear DB, o ya existe";
echo "<br>{$mensaje}<br>";

$mensaje = $conexion->query("USE {$baseDatos}") ? "Usando base de datos" : $conexion->error;
echo "<br>{$mensaje}<br>";


$nuevaTabla = "CREATE TABLE {$tabla}(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    hashUnico VARCHAR(32) NOT NULL,
    active BOOL NOT NULL DEFAULT 0,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)";

if($conexion->query($nuevaTabla) === true)
{
    echo "<br> Tabla {$tabla} creada correctamente <br>";

}else{
    echo "<br>".$conexion->error;
}




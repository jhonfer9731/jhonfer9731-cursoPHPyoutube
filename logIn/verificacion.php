<?php

require 'conexion_db.php';
session_start();


// verificar la peticion get que llega del correo enviado al usuario

if(isset($_GET["email"]) && !empty($_GET["email"]) AND isset($_GET["hash"]) && !empty($_GET["hash"])){

    $correo = $conexion->escape_string($_GET["email"]);
    $hash = $conexion->escape_string($_GET["hash"]);
    

    // busca a la base de datos si hay un usario con ese email y ese hash y solo cuando no se haya activado

    $result = $conexion->query("SELECT * FROM cuentas WHERE email = '{$correo}' AND hashUnico = '{$hash}' AND active= '0'");

    if($result->num_rows == 0){
        
        $_SESSION["mensaje"] = "Su email ya ha sido activado o la URL es invalida";
        header('location: error.php');
    }else{
        $peticion = "UPDATE cuentas SET active = '1' WHERE email='$correo'"; // solo se verifica con el correo puesto que ya el hash fue verificado
        $conexion->query($peticion) or die ($conexion->error);
        $_SESSION["active"] = 1; // indica que la cuenta acaba de ser verificada
        $_SESSION["mensaje"] = "La cuenta fue activada exitosamente";
        header('location: success.php');
    }
}
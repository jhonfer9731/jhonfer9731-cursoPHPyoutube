<?php
session_start();
require 'conexion_db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){



    if($_POST['contrasena_c'] == $_POST['contrasena_c2'])
    {
        $contrasenaNew = $conexion->escape_string(password_hash($_POST['contrasena_c'],PASSWORD_BCRYPT));

        $peticion = "UPDATE cuentas SET contrasena ='{$contrasenaNew}', hashUnico ='{$_SESSION['hash']}' WHERE email='{$_SESSION['correo']}'";

        if($conexion->query($peticion)){
            $_SESSION["mensaje"] = "La contraseña ha sido restablecida de manera exitosa";
            header('location: success.php');
        }
        else{
            $_SESSION["mensaje"] = "Lamentablemente currió un error, intentar nuevamente ";
            header('location: error.php');
        }
    }else{
        $_SESSION["mensaje"] = "Las contraseñas no coinciden por favor intentar nuevamente";
        header('location: error.php');
    }
}
?>
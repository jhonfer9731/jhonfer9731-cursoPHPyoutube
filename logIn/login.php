
<?php
$colorStyle = '"color: white;"';
echo "<br><p style={$colorStyle}>Entro a la pagina de login </p><br>";

require 'conexion_db.php';
session_start();

// previene SQL injection $2y$10$sLWZ1z56QTc58LyqFJx39.e/bBwYCVYtiirlp6EXRB210zf7dz9FG

$usuario = $conexion->escape_string($_POST["correo"]);
// Saber si existe el correo

$peticion = "SELECT * FROM cuentas WHERE email = '{$usuario}' ";

$resultado = $conexion->query($peticion);

if($resultado->num_rows == 0) // verifica si el correo ingresado esta en el DataBase
{
    $_SESSION["mensaje"] = "El correo ingresado no existe, puede crear una cuenta";
    header('location: error.php');
}else{

    $infoUser = $resultado->fetch_array();
    if(password_verify($_POST["contrasena_ln"],$infoUser["contrasena"])){ // verifica el hash con la contraseña ingresada
        
        //se inicia la sesion
        $_SESSION["logged_in"] = true;
        $_SESSION["mensaje"] = "Hola {$_SESSION['nombre']}. Sesion iniciada correctamente";
        $_SESSION["correo"] = $infoUser["email"];
        $_SESSION["nombre"] = $infoUser["nombre"];
        $_SESSION["active"] = $infoUser["active"];
        if($_SESSION["active"] == 0)
        {

            $_SESSION["mensaje"] = "Hola {$_SESSION['nombre']}. Sesion iniciada correctamente --- Falta validar la cuenta";
        }
        $_SESSION["mensaje"] = "Hola {$_SESSION['nombre']}. Sesion iniciada correctamente. Bienvenido ";

        header('location: profile.php');

    }else{
        $_SESSION["mensaje"] = "Contraseña incorrecta, intente nuevamente";
        header('location: index.php');
    }
}

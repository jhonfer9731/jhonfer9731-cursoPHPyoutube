<?php



session_start();
require 'conexion_db.php';


if(isset($_GET["email"]) && !empty($_GET["email"]) AND isset($_GET["hash"]) && !empty($_GET["hash"])){


    $correo = $conexion->escape_string($_GET["email"]);
    $hash = $conexion->escape_string($_GET["hash"]);

    $peticion = " SELECT * FROM cuentas WHERE email='{$correo}' AND hashUnico = '{$hash}'";

    $resultado = $conexion->query($peticion);

    if($resultado->num_rows == 0)
    {
        $_SESSION["mensaje"] = " URL de verificacion invalida, por favor intentar nuevamente";
        header('location: error.php');
    }// si cumple con todo puede mostrar el formulario de ingresar nueva contraseña
    else{
        $_SESSION["correo"] = $correo;
        $_SESSION["hash"] = $conexion->escape_string( md5(rand(1,1000))); // calcula un numero unico o hash para poder hacer la verificacion por correo
    }
}else{
    $_SESSION["mensaje"] = " URL de verificacion invalida, por favor intentar nuevamente";
    header('location: error.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | Lecker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
</head>
<body>
    <div class="logIn_form" >
        <form action="actualizar_contra.php" method="POST" class =" formLogin">
            <h1> Escoje una nueva contraseña </h1>
            <span>Nueva contraseña: </span>
            <input type="password" name ="contrasena_c" class= "input_login" autocomplete="off"></input>
            <span>Confirmar contraseña: </span>
            <input  type="password" name ="contrasena_c2" class= "input_login" autocomplete="off"></input>
            <button type="submit" name="ingresar" class="btn btn-outline-success" value="true" >Aplicar</button>
            <div class="clear"></div>
        </form>       
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>


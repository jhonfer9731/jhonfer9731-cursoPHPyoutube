<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == 'POST')
{
    if(isset($_POST["finish"]) && $_POST["finish"] == true)
    {
        session_unset();
        session_destroy();
        header('location: index.php');

    }
}

if( !isset($_SESSION["logged_in"]) || ($_SESSION["logged_in"] == false))
{
    session_unset();
    session_destroy();
    header('location: index.php');
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
        <div class =" formLogin">
            <h1> Bienvenido </h1>
            <span><?php if(isset($_SESSION["mensaje"])){echo $_SESSION["mensaje"];}?></span>
            <form method="POST" action="profile.php">
            <button name="finish" class="btn btn-outline-success" value="false" type="submit">Finalizar Sesion</button>
            <div class="clear"></div>
            </form>
        </div>       
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
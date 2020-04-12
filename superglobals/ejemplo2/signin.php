<?php

$name = $_POST['user'] ?? null;

if(empty(trim($name))){ // verifica si esta vacio el contenido de name
    header('Location: http://localhost/webCourse/cursoPHPyoutube/superglobals/ejemplo2/index.php');
}

echo "<h2> Hi {$name} !!! </h2>";
var_dump($_POST);


//header('Location: http://localhost/webCourse/cursoPHPyoutube/superglobals/ejemplo2/index.php'); // redireccionar pagina



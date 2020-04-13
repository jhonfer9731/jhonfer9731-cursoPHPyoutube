<?php
if(!isset($_COOKIE['user']))
{
    setcookie('user','Jhon',time()+30,'./');

}
echo '<pre>', var_dump($_COOKIE) ,'</pre>';

$DBname = "jhonprueba";


$conexion = new mysqli('localhost','jhonfer9731','7DgRK4M5b5uDian3',$DBname);// hostname, nombre usuario, nombre de la DB
if (mysqli_connect_error()){  // si hay un error para la ejecucion
    die("Conexion fallida: ".mysqli_connect_error());
}
echo "connected successfully<br>";

//$newSql = "CREATE DATABASE jhonprueba"; // peticion en SQL


// Instrucciones para crear la tabla en la DB
$nuevaTabla = "CREATE TABLE  Myguest( 

    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
)";


// Se manda la peticion de crear la tabla, el metodo retorna true cuando es exitoso
if($conexion->query($nuevaTabla) === true){
    echo "<br>Tabla MyGuest creada<br>";
}else{
    echo "Error creando tabla: ".$conexion->error."<br>";
}



//Instrucciones para agregar elemento en la tabla Myguest en los campos (nombre, apellido e email) con los valores correspondientes
/*$elemento = "INSERT INTO Myguest(nombre,apellido) VALUES ('Pedro', 'Casas')";

if($conexion ->query($elemento) === true)
{
    $inserted_id = $conexion->insert_id;
    echo "<br>Se agrego la informacion correctamente, ultimo id ingresado fue {$inserted_id} <br>";
    
}else{
    echo "<br>Error al {$elemento} <br>".$conexion->error."<br>";
}*/

//Herramienta de multi-query



$sql =  "INSERT INTO Myguest (nombre, apellido, email) VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO Myguest (nombre, apellido, email) VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO Myguest (nombre, apellido, email) VALUES ('Julie', 'Dooley', 'julie@example.com')";

if($conexion->multi_query($sql) === true)
{
    $inserted_id = $conexion->insert_id;
    echo "<br>Nuevos datos agregados exitosamente, ultimo ingresado fue {$inserted_id} <br>";
}else
{
    echo "Error: ". $sql . "<br>". $conexion->error;
}







$conexion->close();

?>


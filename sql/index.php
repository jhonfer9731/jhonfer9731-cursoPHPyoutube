<?php
if(!isset($_COOKIE['user']))
{
    setcookie('user','Jhon',time()+30,'./');

}
echo '<pre>', var_dump($_COOKIE) ,'</pre>';

$DBname = "jhonprueba";


$conexion = new mysqli('localhost','jhonfer9731','7DgRK4M5b5uDian3');// hostname, nombre usuario, nombre de la DB
if (mysqli_connect_error()){  // si hay un error para la ejecucion
    die("Conexion fallida: ".mysqli_connect_error());
}
echo "connected successfully to data base: {$DBname}<br>";

$newSql = "CREATE DATABASE jhonprueba"; // peticion en SQL

if($conexion->query($newSql) === true){
    echo "<br> Base de datos jhonprueba creada<br>";
}else
{
    echo "<br> No se pudo crear base de datos o ya existe <br>";
}

$imprimir = $conexion->query("USE jhonprueba") ? "Usando base de datos jhonprueba<br>" : "No se puede usar Jhonprueba<br>";
echo $imprimir;

prepareStatements($conexion);


//selectData($conexion);

//selecDataFilter($conexion,'Pedro');





/*crearTabla($conexion);
insertarElemento($conexion);
multiquery($conexion);*/
selectDataOrder($conexion,'apellido','asc');

die;

$peticion = "SELECT MAX(ID) AS LastID FROM Myguest";
$limite = (int) $conexion->query($peticion)->fetch_array()["LastID"];
for($i = 9;$i <= $limite; $i++)
{   
    $numero = strval($i);
    //borrarDatos($conexion,$numero);

}






function crearTabla($conexion){
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
}




function insertarElemento($conexion){
//Instrucciones para agregar elemento en la tabla Myguest en los campos (nombre, apellido e email) con los valores correspondientes
    $elemento = "INSERT INTO Myguest(nombre,apellido) VALUES ('Pedro', 'Casas')";

    if($conexion ->query($elemento) === true)
    {
        $inserted_id = $conexion->insert_id;
        echo "<br>Se agrego la informacion correctamente, ultimo id ingresado fue {$inserted_id} <br>";
        
    }else{
        echo "<br>Error al {$elemento} <br>".$conexion->error."<br>";
    }
}
//Herramienta de multi-query

function multiquery($conexion){

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

}

// Prepare statements

function prepareStatements($conexion){

    $statementIns = $conexion->prepare("INSERT INTO Myguest (nombre, apellido,email) VALUES (?,?,?)"); // se crea un template

    $statementIns->bind_param("sss",$nombre,$apellido,$email); // enlazan los parametros con el tipo de dato

    $nombre = "Juan";
    $apellido = "Bastidas";
    $email = strtolower($nombre).'.'.strtolower($apellido).'@gmail.com';

    $statementIns -> execute();

    $nombre = "Aleja";
    $apellido = "Fernandez";
    $email = strtolower($nombre).'.'.strtolower($apellido).'@gmail.com';

    $statementIns -> execute(); // Se ejecuta el statement

    $inserted = $conexion->insert_id;

    echo "<br> Añadidos exitosamente.. ";

    echo "<br>Nuevos datos agregados exitosamente, ultimo ingresado fue {$inserted} <br>";

    $statementIns -> close();// se cierra el statement

}

function selectData($conexion){
    $peticion = "SELECT id,nombre,apellido, email FROM Myguest"; // peticion para solicitar los datos
    $resultado = $conexion->query($peticion);
    if ($resultado->num_rows > 0){
        while( $row = $resultado->fetch_assoc()){ // extrae cada columna como un array
            $espacios = $espaciosNombre = 0;
            $espaciosNombre = 30 - trim(strlen($row["apellido"]." ".$row["nombre"]));
            $espacios = str_repeat('&nbsp',$espaciosNombre);
            echo "id: ".$row['id']." -------   Apellido y nombre:     ".$row["apellido"]." ".$row["nombre"].$espacios."email: ".$row["email"]."<br>";
        }
    }else{
        echo "0 results";
    }
}

function selecDataFilter($conexion,$where){

    $peticion = "SELECT id,nombre,apellido,email FROM Myguest WHERE nombre = '{$where}'"; // peticion para solicitar los datos
    echo $peticion."<br>";
    $resultado = $conexion->query($peticion);
    if(!$resultado)
    {
        echo "0 results"; 
        return;
    }
    if ( ($resultado->num_rows > 0) ){
        while( $row = $resultado->fetch_assoc()){ // extrae cada columna como un array
            $espacios = $espaciosNombre = 0;
            $espaciosNombre = 30 - trim(strlen($row["apellido"]." ".$row["nombre"]));
            $espacios = str_repeat('&nbsp',$espaciosNombre);
            echo "id: ".$row['id']." -------   Apellido y nombre:     ".$row["apellido"]." ".$row["nombre"].$espacios."email: ".$row["email"]."<br>";
        }
    }else{
        echo "0 results";
    }
}

function selectDataOrder($conexion,$orderby,$asc){
    $asc = strtoupper($asc);
$peticion = "SELECT id, apellido, nombre, email FROM Myguest ORDER BY {$orderby} {$asc}";
    $resultado = $conexion->query($peticion);
    if (!$resultado){
        echo "No results";
        return;
    }else{
        if($resultado->num_rows>0){
            while($row = $resultado->fetch_assoc())
            {
                $espacios = $espaciosNombre = 0;
                $espaciosNombre = 30 - trim(strlen($row["apellido"]." ".$row["nombre"]));
                $espacios = str_repeat('&nbsp',$espaciosNombre);
                echo "id: ".$row['id']." -------   Apellido y nombre:     ".$row["apellido"]." ".$row["nombre"].$espacios."email: ".$row["email"]."<br>";
            }
        }else{
            echo "no results";
        }
    }
}


function borrarDatos($conexion,$id){

    $state = $conexion-> prepare("DELETE FROM Myguest WHERE id = ?");

    $state->bind_param('s',$identi);

    $identi = $id;
    $state->execute();

    echo "prueba<br>";
    if(($conexion->error)){

        echo "<br>",$conexion->error,"<br>";

    }else{
        echo "Elemento con id: {$id} borrado exitosamente<br>";
    }

    $state->close();

}

$conexion->close();

?>


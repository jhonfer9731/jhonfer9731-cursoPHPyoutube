<?php

$dayOfWeek = 2;

$daysofWeek = [
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday'
];


var_dump(array_keys($daysofWeek)); // array_keys saca un arreglo con todas las keys del arreglo introducido


if(in_array($dayOfWeek, array_keys($daysofWeek)))  //in_array retorna true cuando el valor se encuentra dentro de un arreglo
{
    echo "<h1>{$daysofWeek[$dayOfWeek]} </h1>";
}else{
   echo "No es un dia valido";
}


echo '<br>';

$name = "jhon Fernando b";

if(!$name){
    return; // si no hay nombre esto termina el script
}

echo "Tu nombre es {$name}.";

if(strlen($name) > 10){
    echo ' Ohh es un nombre muy largo';
}

echo '<br><br>';

$uploaded = -5;

if($uploaded === true) // it compares also the type of objects
{
    echo 'Uploaded';
}


echo '<br><br>';

// Switches

$valor = 2;
switch ($valor) { // Aqui va la variable
    case 1:
        echo "The value is one {$valor}"; 
        break;
    case 2 :
        echo "The value is two {$valor}";
        break;
    default:
        echo 'The value is unknown';
        break;

}

$wheater = 'sunny';
$color = null;
echo '<br><br>';

switch (true){
    case $wheater == 'sunny' : // this is more common way to do it
        $color = 'blue';
        break;
    case $wheater == 'cloudy' :
        $color = 'grey';
        break;
}

echo "<h3> {$color} </h3>";

?>
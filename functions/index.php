<?php


function nombreCompleto($firstName,$lastName = null,$separator='_') // creando funcion con valores por defecto
{
     if(trim($firstName) == ''){
         return;
     }
     if($lastName === null)
     {
         return $firstName;
     }
     return "{$firstName}{$separator}{$lastName}";
    
}

var_dump(nombreCompleto(''));


// Uso de la funcion func_get_args

function add(){
    $total = 0;
    foreach(func_get_args() as $number)// arreglo de los argumentos que ingresan a la funcion add a pesar de que no esten como parametros
    {
        if(!is_numeric($number))
        {
            continue;
        }
        $total += $number;
    }
    return $total;

}
echo "<br>";
echo add(5,5,10,'1alex');

echo "<br><br>";


// ingresar una variable al scope de la funcion


$config = [ // es la variable externa
    'separator' => '%',
];

$fullName = function ($firstName,$lastName) use ($config) // se la pasa a la funcion, donde la funcion es una variable
{
    return "{$firstName}{$config['separator']}{$lastName}";
};


echo $fullName("Jhon","Benavides");



echo "<br><br>";


require_once "hello.php";  //Breaking up files 



?>
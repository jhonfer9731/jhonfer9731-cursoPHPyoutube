<?php

$name = 'alex';

var_dump($name);
 $name = null;

unset($name);

var_dump($name);


//Contatenacion

$wheater = 'sunny';
$degrees = 30.5;
$status = "<br>The current wheater is {$wheater} and  it's {$degrees}° degrees";

echo $status;

?>
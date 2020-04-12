<?php

$names = ['alex', 'Juan'];
$names[] = 'Carlos';
var_dump($names);


$people =[
    "alex" => 26,
    "juan" => 24
];

echo "<br>";

var_dump($people);
echo "<br>";
var_dump($people["alex"]);
echo "<br>";
echo "<br>";

$users = [
    [
        "username" => "alex",
        'email' => 'alex@prueba.com',
        "likes" => ['books', 'cats']
    ],
    [
        "username" => "juan",
        'email' => 'juan@prueba.com',
        "likes" => ['soccer', 'dogs']
    ]
];

echo $users[1]["username"]."<br>";
echo '<pre>',var_dump($users) ,'</pre> <br>';

echo $users[1]["email"];

// Como hacer un for iterando sobre los elementos de un array

foreach ($users as $user)
{
    echo "<br>",$user["username"]," <br>";
}

$users[] =[
    "username" => "carlos",
    'email' => 'carlos@prueba.com',
    "likes" => ['piano', 'dogs']
];

echo "<br>";
echo "<pre>",var_dump($users),"</pre>";


?>
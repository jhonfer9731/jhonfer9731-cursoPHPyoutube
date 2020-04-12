<?php

$totalItems = 180;
$itemsPorPag = 15;
$numeroPag = ceil($totalItems/$itemsPorPag);


if ($numeroPag > 1){
    for ($i = 1; $i <= $numeroPag;$i++){

        echo '<a href="?page='.$i.'">'.$i.'</a> ';
    }
}



//while
echo "<br>";

$numberIwant = 3;


while(($numberRolled = rand(1,6)) !== $numberIwant)
{
    echo "Tu tiraste un {$numberRolled} y necesitas un {$numberIwant}<br>";
}

echo "Tu tiraste un {$numberIwant}";
<?php


$temas = [
    [
        'id' => 1,
        'titulo' => 'La mejor manera de aprender PHP',
        'posts' =>[
            ['body' => 'Practica mucho'],
            ['body' => 'Aprende mucho']
        ]
    ],
    [
        'id' => 2,
        'titulo' => 'Como usar un for loop',
        'posts' =>[
            ['body' => 'Observa Codecourse'],
        ]
    ]
];


foreach($temas as $tema){ // de todos los temas saco cada tema en la variable $tema
    echo '<h1>'. $tema['titulo'].'</h1>';
    foreach($tema['posts'] as $post)
    {
        echo '<p>'. $post['body'].'</p>';
    }
}
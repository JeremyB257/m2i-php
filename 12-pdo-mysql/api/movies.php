<?php
// Comment renvoyer du JSON en php 
//$exemple = ['name' => 'Toto'];
//echo json_encode($exemple); // {"name" : "Toto"}


require __DIR__ . '/../config/db.php';
require __DIR__ . '/../config/functions.php';
//recupere les données de la BDD

$movies = selectAll('SELECT * FROM movie');

//il faut preciser dans la rep http qu'on renvoie du json
header('Content-Type: application/json');

// On peut transformer les données avant de les renvoyer
$newMovies = [];
foreach ($movies as $movie) {
    $newMovie[] = [
        'id' => $movie['id_movie'],
        'title' => $movie['title'],
        'released_at' => format_date($movie['released_at']),
        'description' => $movie['description'],
        'duration' => format_duration($movie['duration']),
        'cover' => 'http://localhost/m2i-php/12-pdo-mysql/uploads/' . $movie['cover'],
    ];
}

echo json_encode($newMovie);

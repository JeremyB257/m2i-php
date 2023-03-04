<?php
// definis les constantes de connexion a la DB
define('DB_HOST', 'localhost');
define('DB_NAME', 'exo');
define('DB_USER', 'root');
define('DB_PASSWORD', 'toor');

// connexion a la db
try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        // le :: = operateur de resolution de porté
    ]);
} catch (Exception $exception) {
    echo '<p>' . $exception->getMessage() . '</p>';
    echo '<a href="https://www.google.com/search?q=' . $exception->getMessage() . '" target="_blank">Go Google</a><br/>';
    echo '<img src="https://media.tenor.com/92fv6uBxxNQAAAAd/john-travolta.gif" width="200" />';
    die(); // on arrete le code car la BDD ne fonction pas
}

//on range la connexion à la BDD dans une fonction
function db()
{
    global $db; //permet l'acces a la variable $db

    return $db;
}

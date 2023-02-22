<?php
require __DIR__ . '\partials\header.php';
?>
<h1>Webflix</h1>

<?php

// On peut faire une requette SQL en PHP (la connexion a la db se fait via le heeader puis via la config)
$query = db()->query('SELECT * FROM movie');

// on execute la requete qui nous renvoie un tableau avec tous les eleemnts
$movies = $query->fetchAll();

var_dump($movies);
?>
<?php
require __DIR__ . '\partials\footer.php';

?>
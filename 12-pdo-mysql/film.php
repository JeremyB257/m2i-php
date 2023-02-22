<?php
$title = 'Webflix - Film';
require __DIR__ . '\partials\header.php';

// recupere l'id dans l'url
$id = $_GET['id'] ?? null;

// je prepare la requete
$query = $db->prepare('SELECT * FROM movie WHERE id_movie = :id');

// pour se proteger des faille sql on remplace les parametre
$query->execute(['id' => $id]);

$movie = $query->fetch();
var_dump($movie)
?>



<?php
require __DIR__ . '\partials\footer.php';

?>
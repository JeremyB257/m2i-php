<?php
$title = 'Webflix - Film';
require __DIR__ . '\partials\header.php';

// recupere l'id dans l'url
$id = $_GET['id'] ?? null;


// je prepare la requete
/* $query = $db->prepare('SELECT * FROM movie WHERE id_movie = :id');

// pour se proteger des faille sql on remplace les parametre
$query->execute(['id' => $id]);
 */
// $query = select('SELECT * FROM movie WHERE id_movie = :id', ['id' => $id]);
$movie = select('SELECT * FROM movie WHERE id_movie = :id', ['id' => $id]);
$actors = selectAll('SELECT * FROM actor AS a INNER JOIN movie_has_actor AS mha ON a.id_actor = mha.id_actor WHERE mha.id_movie = :id', ['id' => $id]);

if (!$_GET['id'] || !$movie) {
    header("Location: 404.php");
}


/*
* Choses à faire :
* - Intégrer la page du film (2 colonnes => Image à gauche et
* le titre, la durée, la date et la description à droite).
* - Pour la durée, il faut une fonction qui transforme une durée donnée
* en minutes en heures / minutes (122 devient 2h02)
* - Ecrire une seconde requête SQL qui permet d'afficher les acteurs
* du film dans une liste (join)
* - Si l'id du film n'existe pas, on peut afficher une 404
*/
?>
<div class="container-lg mt-2">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src=" uploads/<?= $movie['cover'] ?>" class="img-fluid rounded-start" alt="affiche">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $movie['title'] ?></h5>
                    <p class="card-text"><small class="text-muted"><?= format_duration($movie['duration']) ?></small></p>
                    <p class="card-text"><small class="text-muted"><?= format_date($movie['released_at']) ?></small></p>
                    <p class="card-text"><?= $movie['description'] ?></p>
                    <ul>
                        <?php foreach ($actors as $actor) { ?>
                            <li><?= $actor['firstname'] . ' ' . $actor['name'] ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
require __DIR__ . '\partials\footer.php';

?>
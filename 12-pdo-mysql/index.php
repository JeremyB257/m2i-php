<?php
require __DIR__ . '\partials\header.php';
?>


<?php

// On peut faire une requette SQL en PHP (la connexion a la db se fait via le heeader puis via la config)
$query = db()->query('SELECT * FROM movie');

// on execute la requete qui nous renvoie un tableau avec tous les eleemnts
$movies = $query->fetchAll();

?>

<div class="container-lg mt-3 d-flex flex-column align-items-center">
    <a class="btn btn-outline-success" href="film-ajout.php">Ajouter un film</a>
    <a class="btn btn-outline-success mt-2" href="contact.php">Nous contactez</a>
    <a class="btn btn-outline-success mt-2" href="emploi.php">Exo Emploi</a>
    <div class="d-flex flex-wrap justify-content-center">
        <?php foreach ($movies as $movie) { ?>
            <div class="card m-2" style="max-width: 12rem;">
                <img src="uploads/<?= $movie['cover'] ?>" class="card-img-top object-fit-cover" alt="affiche" style="height: 80%;">
                <div class="card-body">
                    <h5 class="card-title mb-0"><?= truncate($movie['title'], 10) ?></h5>
                    <p class="card-text text-secondary"><?= format_date($movie['released_at']) ?></p>
                    <a href="film.php?id=<?= $movie['id_movie'] ?>" class="btn btn-outline-success text-center d-block">Voir</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
require __DIR__ . '\partials\footer.php';

?>
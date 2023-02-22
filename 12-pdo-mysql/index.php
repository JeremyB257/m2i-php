<?php
require __DIR__ . '\partials\header.php';
?>
<h1>Webflix</h1>

<?php

// On peut faire une requette SQL en PHP (la connexion a la db se fait via le heeader puis via la config)
$query = db()->query('SELECT * FROM movie');

// on execute la requete qui nous renvoie un tableau avec tous les eleemnts
$movies = $query->fetchAll();

?>

<div class="container-lg">
    <div class="d-flex flex-wrap justify-content-center">
        <?php foreach ($movies as $movie) { ?>
            <div class="card m-2" style="max-width: 12rem;">
                <img src="uploads/<?= $movie['cover'] ?>" class="card-img-top object-fit-cover" alt="affiche" style="height: 80%;">
                <div class="card-body">
                    <h5 class="card-title"><?= truncate($movie['title'], 9) ?></h5>
                    <p class="card-text"><?= format_date($movie['released_at']) ?></p>
                    <p class="card-text"><?= $movie['description'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
require __DIR__ . '\partials\footer.php';

?>
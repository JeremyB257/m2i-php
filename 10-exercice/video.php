<?php
require __DIR__ . '\partials\header.php';

if (!$_GET['id']) {
    header("Location: 404.php");
}
$videoId = (htmlspecialchars($_GET['id'])) ?? '';
$color  = (htmlspecialchars($_GET['color']))  ?? '';

?>
<main class="container-lg pt-3 mt-5">
    <form action="videos.php" class="mt-2">
        <button class="btn btn-primary">Retour vers les videos</button>
    </form>
    <h1 class="text-center">video</h1>
    <div class="text-center" style="background-color: <?= $color ?>;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $videoId ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>

</main>

<?php
require __DIR__ . '\partials\footer.php';

?>
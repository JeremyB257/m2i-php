<?php
require __DIR__ . '\partials\header.php';
$btns = [
    '1' => 'KFKMEiuCY6M',
    '2' => 'ki6q1xKGdkg',
    '3' => 'jEbWGG30ACQ',
    '4' => 'DnGdoEa1tPg',
]
?>
<main class="container-lg">
    <h1 class="text-center">videos</h1>
    <form action="video.php" class="mb-4 text-center">
        <div>
            <label for="color" class="mb-2">Couleur d'arriere plan :</label>
            <input type="color" name="color" id="color" value="#FFFFFF">
        </div>
        <?php foreach ($btns as $index => $btn) { ?>
            <button class="btn btn-primary" name="id" value="<?= $btn ?>">Video <?= $index ?></button>
        <?php } ?>

    </form>
</main>

<?php
require __DIR__ . '\partials\footer.php';

?>
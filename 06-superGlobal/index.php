<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Les superGlobales</h2>



    <?php
    var_dump($_GET);
    // php 5
    $name = isset($_GET['name']) ? $_GET['name'] : 'John Doe';
    // php 7
    $name = $_GET['name'] ?? 'John Doe';
    $age = $_GET['age'] ?? null;
    ?>

    <h2>Bonjour <?= $name ?></h2>

    <?php if ($age) { ?>
        <p>tu as <?= $age ?> ans</p>
    <?php } ?>

    <a href="index.php?name=Fiorella&age=3">Fiorella</a>
    <a href="index.php?name=Toto">Toto</a>

    <form method="get" action="">
        <input type="text" name="name" placeholder="Nom" value='<?= $name ?>'>
        <input type="text" name="age" placeholder="Age" value='<?= $age ?>'>
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>
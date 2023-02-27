<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichiers</title>
</head>

<body>
    <?php
    // ouvrir un fichier en lecture + ecriture
    $file = fopen('log.txt', 'a+');
    //Ecrire dans un fichier
    // fwrite($file, "Salut\nCa va ?\n");
    fclose($file);

    //Lire le fichier en lecture seul
    $file = fopen('log.txt', 'r');
    $content = fread($file, filesize('log.txt'));
    fclose($file);
    // racourci
    $content = file_get_contents('log.txt');
    // recupere chaque ligne dans un tableau
    $lines = array_filter(explode("\n", $content));

    ?>
    <form action="" method="post">
        <input type="text" name="message" placeholder="message">
        <input type="submit" value="Envoyer">
    </form>
    <h2>le fichier à été modifié le <?= date('d/m/Y à H:i:s', filemtime('log.txt')) ?></h2>
    <ul>
        <?php foreach ($lines as $line) { ?>
            <li><?= $line ?></li>
        <?php } ?>
    </ul>
</body>

</html>
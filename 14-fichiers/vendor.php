<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vendeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/sandstone/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php


    $content = file_get_contents('log.txt');
    $lines = array_filter(explode("\n", $content));
    ?>
    <div class="container-lg my-3">
        <h1>Page vendeur</h1>
        <a href="exo.php" class="btn btn-outline-success mb-3">Page accueil</a>
        <ul>
            <?php foreach ($lines as $line) { ?>
                <li><?= $line ?></li>
            <?php } ?>
        </ul>
    </div>
</body>

</html>
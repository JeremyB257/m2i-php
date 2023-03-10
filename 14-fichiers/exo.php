<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
    $prices = [
        'article 1' => 5,
        'article 2' => 7,
        'article 3' => 8,
    ];
    $email = $_POST['email'] ?? null;
    $products = $_POST['products'] ?? null;

    if (!empty($_POST)) {

        $date = date('Y-m-d H:i:s');

        file_put_contents('log.txt', "[$date] $email : " . implode(' ', $products) . "  \n", FILE_APPEND);
    }

    ?>
    <div class="container-lg my-3">
        <a href="vendor.php" class="btn btn-outline-success mb-3">Page vendeur</a>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
            <?php foreach ($prices as $name => $price) { ?>
                <div class="form-check">
                    <input class="form-check-input" name="products[]" type="checkbox" value="<?= $name ?>" id="<?= $name ?>">
                    <label class="form-check-label" for="<?= $name ?>">
                        <?= "$name($price)" ?>
                    </label>
                </div>
            <?php } ?>

            <input class="btn btn-outline-success mt-2" type="submit" value="Envoyer">
        </form>
    </div>
</body>

</html>
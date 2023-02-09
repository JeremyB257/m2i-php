<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les fonctions</title>
</head>

<body>
    <?php
    function hello($name, $age = null) {
        $output = 'Bonjour ' . $name;
        $age ? $output .= ', tu as ' . $age . ' ans.' : '';

        return  $output;
    }

    function addition(int $n1, int $n2): int {
        return $n1 + $n2;
    }

    ?>
    <h1><?= hello('Fiorella', 3) ?></h1>
    <h2><?= strtoUpper(hello('Toto')) ?></h2>

</body>

</html>
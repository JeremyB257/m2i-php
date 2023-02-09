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


    <?php
    function square(int $n1): int {
        return $n1 ** 2;
    }

    function squareArea(int $L, int $l): int {
        return $L * $l;
    }

    function circleArea(int $r): float {
        return round(($r ** 2) * pi(), 2);
    }

    function price(float $price, float $tax, string $type = 'htToTtc'): float {
        if ($type == 'htToTtc') {
            return round($price * (1 +  $tax / 100), 2);
        } else {
            return round($price / (1 + $tax / 100), 2);
        }
    }

    ?>
    <h3><?= square(5) ?></h3>
    <h3><?= squareArea(5, 2) ?></h3>
    <h3><?= circleArea(5) ?></h3>
    <h3><?= price(100, 20, 'htToTtc') ?></h3>
    <h3><?= price(100, 20, 'ttcToHt') ?></h3>
</body>

</html>
<?php
$age = 28;
$monkeyEatBanana = true;
$price = 2.99;
$city = 'Lille';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le PHP</title>
</head>

<body>
    <h1>Introduction au php</h1>
    <p><?= 'hello PHP!' ?></p>
    <p><?= 'j\'ai ' . $age . ' ans et je vis à ' . $city . '.'  ?></p>
    <p><?= "la variable \$price contient $price. On peut aussi faire {$price}€."  ?></p>
</body>

</html>
<?php
$number1 = 3;
$number2 = 4;
$number3 = 5;


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
    <h2>Operation en PHP</h2>
    <p>3 + 4 = <?= $number1 + $number2 ?></p>
    <p>4 * 5 = <?= $number2 * $number3 ?></p>
    <p>5 / 3 = <?= round($number3 / $number1, 2) ?></p>
    <p>2 <sup>3</sup> = <?= 2 ** $number1 ?></p>

    <?php
    $sentence = 'Hello';
    $sentence .= ' Fiorella'
    ?>
    <p><?= $sentence ?></p>

    <h2>Comparaison</h2>
    <p>est ce que number1 est strictement egale à 3 ? <?= var_dump($number1 === 3); ?></p>

    <h2>Condition</h2>

    <?php
    $date = 6;

    echo ($date === 7) ? 'On a TRE' : 'On a PHP';
    ?>

    <h2>Les erreurs</h2>
    <?php
    //echo $a; // warning
    // echo 10/0 //Fatal error
    ?>
    <a href="./major.php">majeur</a>
    <a href="./operation.php">operation</a>
</body>

</html>
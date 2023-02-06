<?php
$n1 = 15;
$n2 = 5;
$n3 = 8;

$r1 = $n1 + $n2 + $n3;
$r2 = $n1 * ($n2 - $n3);
$r3 = round(($n3 + $n2) / $n1, 2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p><?= $n1 . ' + ' . $n2 . ' + ' . $n3 . ' = ' . $r1 ?></p>
    <p><?= $n1 . ' x (' . $n2 . ' - ' . $n3 . ') = ' . $r2 ?></p>
    <p><?= '(' . $n3 . ' +' . $n2 . ') /' . $n1 . ') = ' . $r3 ?></p>

    <?php if ($r1 < 20 || $r2 < 20 || $r3 < 20) {
        echo 'Une des opé est inferieur a 20';
    } ?>
</body>

</html>
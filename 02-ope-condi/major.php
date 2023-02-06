<?php
$age = 20;
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
    <?php if ($age >= 18) { ?>
        <h2>Vous pouvez entrer</h2>
    <?php } else if ($age >= 16) { ?>
        <h2>Vous etes presque majeur</h2>
    <?php } else if ($age >= 14) { ?>
        <h2>Vous etes jeune</h2>
    <?php } else { ?>
        <h2>Vous etes trop jeune</h2>
    <?php } ?>
</body>

</html>
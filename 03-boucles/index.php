<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Boucles PHP</title>
</head>

<body>
    <h2>La boucle for</h2>
    <ul>
        <?php
        for ($i = 0; $i < 10; $i++) {
            echo '<li>' . $i . '</li>';
        }
        ?>
    </ul>
    <h2>La boucle foreach</h2>
    <?php
    $firstnames = ['Fiorella', 'Marina', 'Matthieu'];

    var_dump($firstnames);
    foreach ($firstnames as $index => $value) {
        echo '<h3>' . $value . '(' . $index . ')</h3>';
    }
    ?>
    <h2>La boucle while</h2>

    <?php
    $i = rand(0, 10);
    while ($i < 10) {
        echo $i++;
    }
    ?>

    <h2>FizzBuzz</h2>
    <ul>

        <?php
        for ($i = 1; $i < 101; $i++) {
            if ($i % 15 === 0) {
                echo '<li>FizzBuzz</li>';
            } else if ($i % 5 === 0) {
                echo "<li>Buzz</li>";
            } else if ($i % 3 === 0) {
                echo "<li>Fizz</li>";
            } else {
                echo "<li>$i</li>";
            }
        }
        ?>
    </ul>

    <h2>carre/triangle</h2>
    <?php
    for ($e = 0; $e <= 10; $e++) {
        echo '<p>';
        for ($i = 0; $i <= $e; $i++) {
            echo '<span>😀</span>';
        }
        echo '</p>';
    }
    ?>
    <div class="flex evenly">
        <?php
        for ($e = 1; $e <= 10; $e++) {
            echo '<div>';
            for ($i = 1; $i <= 10; $i++) {
                echo '<p> ' . $e . ' x ' . $i . ' = ' . ($e * $i) . ' </p>';
            }
            echo '</div>';
        }

        ?>
    </div>
</body>

</html>
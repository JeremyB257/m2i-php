<?php

//extraction 

$email = 'fiorella@cloud.boxydev.com';
$domain = strstr($email, '@'); // @cloud.boxydev.com (enleve le contenu avant @)
$domain = substr($domain, 1); // cloud.boxydev.com (enleve 1 lettre)
$tld = strrchr($domain, '.'); // .com (prend la derniere occurence du .)

echo "Le domaine est '$domain' <br/>";
echo "Le tld de 1er niveau est '$tld' <br/>";

//Verifier qu'une chaine contient quelque chose
$sentence = 'Faire ou ne pas faire.';

echo 'Le mot faire est à la position ' . mb_strpos($sentence, 'faire');

var_dump(strpos($sentence, 'rien'));

// important de verifier le stric egale si le mot est a la position 0
if (stripos($sentence, 'fai') !== false) {
    echo 'OK </br>';
}

//remplacer une chaine dans une chaine

echo str_replace('boxydev', 'gmail', $email) . '</br>';

echo $email[8] . '</br>';

foreach ((array) $email as $letter) {
    echo $letter;
}

// Extraire une chaine d'une chaine

echo '</br>' . substr($email, 0, 8) . '</br>'; // fiorella

echo substr($email, 9, -4) . '</br>'; // cloud.boxydev

echo substr($email, -3) . '</br>'; // com
$countriesString = 'italie,portugal,france';
$countries = explode(',', $countriesString);
var_dump($countries);

echo '<ul>';
echo '<li>' . implode('</li><li>', $countries) . '</li>'; //<li>itali</li><li>portugale</li>...
echo '</ul>';

//quelques fonctions pour les formulaires
$password = 'azerty123';
var_dump($password);
var_dump(trim($password));

// pour se proteger d'une faille XSS
$message = $_GET['message'] ?? '';

//desactiver l'interpretation

$message = htmlspecialchars($message);

// autoriser certaine balise
$message = strip_tags($message, ['strong', 'em']);

echo $message;
?>

<?php
$acro = $_POST['acro'] ?? '';
$acro = htmlspecialchars($acro);

$verb = $_POST['verb'] ?? 'chercher';
$verb =  htmlspecialchars($verb);

function conjugaison($verb) {
    $verb = substr($verb, 0, -2);
    $endings = [
        'Je' => 'e',
        'Tu' => 'es',
        'Il' => 'e',
        'Nous' => 'ons',
        'Vous' => 'ez',
        'Ils' => 'ent'
    ];
    $array = [];

    foreach ($endings as $index => $end) {
        $array[] = $index . ' ' . $verb . $end;
    }
    return $array;
}
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
    <form action="" method="post">
        <label for="acro">Acronyme</label>
        <input type="text" id="acro" name="acro">
        <button>Envoyer</button>
        <?php if (!empty($_POST)) {
            $acros = explode(' ', $acro);
            foreach ($acros as $acrony) {
                echo strtoupper(substr($acrony, 0, 1));
            }
        } ?>
    </form>
    <form action="" method="post">
        <label for="verb">Verbe</label>
        <input type="text" id="verb" name="verb">
        <button>Envoyer</button>
    </form>
    <ul>
        <?php if (!empty($_POST)) {
            foreach (conjugaison($verb) as $text) {
                echo "<li>$text</li>";
            };
        } ?>
    </ul>
</body>

</html>
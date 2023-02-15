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

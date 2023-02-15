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

echo 'Le mot faire est à la position ' . strpos($sentence, 'faire');

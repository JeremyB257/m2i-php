<?php

$email = 'fiorella@boxydev.com';
$domain = strstr($email, '@'); // @boxydev.com (enleve le contenu avant @)
$domain = substr($domain, 1); // boxydev.com (enleve 1 lettre)
$tld = strstr($domain, '.'); // .com

echo "Le domaine est '$domain' <br/>";
echo "Le tld de 1er niveau est '$tld' <br/>";

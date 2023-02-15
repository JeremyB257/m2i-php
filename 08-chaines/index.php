<?php

$email = 'fiorella@boxydev.com';
$domain = strstr($email, '@'); // @boxydev.com
$domain = substr($domain, 1); // boxydev.com
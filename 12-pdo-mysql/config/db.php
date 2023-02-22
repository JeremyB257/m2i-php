<?php
// definis les constantes de connexion a la DB
define('DB_HOST', 'localhost');
define('DB_NAME', 'webflix');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// connexion a la db
$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

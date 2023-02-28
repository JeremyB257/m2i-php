<?php

session_start();



// On va chercher la personne connectée
$currentUser = $_SESSION['user'] ?? null;

// Si l'utilisateur n'est pas connecté, on le redirige vers index.php
if (!$currentUser) {
    header('Location: index.php');
}
// Déconnexion
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    setcookie('remember'); // Supprime le cookie
    header('Location: index.php');
}
?>
<h1>Bonjour <?= $currentUser; ?></h1>
<a href="connecte.php?logout=1">Déconnexion</a>
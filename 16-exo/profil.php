<?php

session_start();
require __DIR__ . '/partials/header.php';

if (isset($_COOKIE['remember'])) {
    $user = select('SELECT * FROM user WHERE token = :token', ['token' => $_COOKIE['remember']]);

    if ($user) {
        $_SESSION['user'] = $user['login'];
    } else {
        header('Location: index.php');
    }
}

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
<div class="container-fluid profile-page h100 d-flex justify-content-center align-items-center">
    <div class="card shadow">
        <div class="upper">
            <img src="https://i.imgur.com/Qtrsrk5.jpg" class="img-fluid">
        </div>
        <div class="user text-center">
            <div class="profile">
                <img src="https://i.imgur.com/JgYD2nQ.jpg" class="rounded-circle" width="80">
            </div>
        </div>
        <div class="mt-5 text-center">
            <h4 class="mb-0"><?= ucfirst($currentUser); ?></h4>
            <span class="text-muted d-block mb-2">Los Angles</span>
            <a href="profil.php?logout=1" class="btn btn-primary btn-sm follow">Déconnexion</a>
            <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                <div class="stats">
                    <h6 class="mb-0">Followers</h6>
                    <span>8,797</span>
                </div>
                <div class="stats">
                    <h6 class="mb-0">Projects</h6>
                    <span>142</span>
                </div>
                <div class="stats">
                    <h6 class="mb-0">Ranks</h6>
                    <span>129</span>
                </div>
            </div>
        </div>
    </div>
</div>
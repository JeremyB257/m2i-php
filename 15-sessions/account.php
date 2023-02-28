<?php

session_start();
if (isset($_COOKIE['remember'])) {
    // si il  ya un cookie, on  va verifier s'il est present dansle fichier
    touch('tokens.txt');
    $tokens = array_filter(explode("\n", file_get_contents('tokens.txt')));

    $_SESSION['nickname'] = $_COOKIE['remember'];
}
// On va chercher la personne connecter
$currentNickname = $_SESSION['nickname'] ?? null;

// Déconnexion
if (isset($_GET['logout'])) {
    unset($_SESSION['nickname']);
    setcookie('remember');
    header('Location: index.php');
}

if (!$currentNickname) {
    header('Location: index.php');
}


require __DIR__ . '/partials/header.php'; ?>

<h1>Bonjour <?= $currentNickname ?></h1>
<a href="account.php?logout=1">Déconnexion</a>

<?php require __DIR__ . '/partials/footer.php'; ?>
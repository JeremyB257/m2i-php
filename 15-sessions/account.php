<?php

session_start();

// Si la session a expiré, on peut se servir du cookie pour reconnecter la personne.
if (isset($_COOKIE['remember'])) {
    // S'il y a un cookie, on va vérifier s'il est présent dans le fichier token
    touch('tokens.txt');
    $tokens = array_filter(explode("\n", file_get_contents('tokens.txt')));

    // Le & permet de modifier DIRECTEMENT le tableau (par référence)
    foreach ($tokens as &$token) { // toto:$2y$10$EE3XKVoYE3EDmd9V0aYRM.LxfhVu.5b0towI1EKHdn9afJu1DYw2y
        $token = explode(':', $token, 2); // ['toto', '$2y$10$EE3XKVoYE3EDmd9V0aYRM.LxfhVu.5b0towI1EKHdn9afJu1DYw2y']

        // Si c'est le cas, on prend le pseudo qui correspond
        if ($token[1] === $_COOKIE['remember']) {
            $_SESSION['nickname'] = $token[0];
        }
    }

    // $tokens = [
    //     ['toto', '$2y$10$EE3XKVoYE3EDmd9V0aYRM.LxfhVu.5b0towI1EKHdn9afJu1DYw2y'],
    //     ['fiofio', '$2y$10$.CpgUA/3DzRuLTGROSN9t.TTVm.Rpl37E3jckYb/ujJIc2oOHPfdK'],
    // ];
}

// On va chercher la personne connectée
$currentNickname = $_SESSION['nickname'] ?? null;

// Déconnexion
if (isset($_GET['logout'])) {
    unset($_SESSION['nickname']);
    setcookie('remember'); // Supprime le cookie
    header('Location: index.php');
}

// Si l'utilisateur n'est pas connecté, on le redirige vers index.php
if (!$currentNickname) {
    header('Location: index.php');
}

require __DIR__ . '/partials/header.php'; ?>

<h1>Bonjour <?= $currentNickname; ?></h1>
<a href="account.php?logout=1">Déconnexion</a>

<?php require __DIR__ . '/partials/footer.php'; ?>
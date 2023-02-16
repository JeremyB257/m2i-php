<?php
require __DIR__ . '/../config/functions.php';
$title = $title ?? 'Gameshop'
?>

<!DOCTYPE html>
<html lang="fr" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column h-100">
    <header class="text-center">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-lg">
                <a class="navbar-brand" href="#">Gameshop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= pageName() === "index" ? 'active' : '' ?>" aria-current="page" href="index.php">Accueil</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= pageName() ===  "contact" ? 'active' : '' ?>" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= pageName() ===  "videos" ? 'active' : '' ?>" href="videos.php">Videos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
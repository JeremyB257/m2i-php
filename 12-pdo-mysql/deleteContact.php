<?php
require __DIR__ . '\partials\header.php';




$id = sanitize($_GET['id'] ?? null);

if (!is_int($id)) {
    $query = db()->prepare('DELETE FROM contacts WHERE id = :id');
    $query->execute(['id' => intval($id)]);
}

header("Location: contact.php");





require __DIR__ . '\partials\footer.php';

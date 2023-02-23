<?php
$title = 'Webflix - Contact';
require __DIR__ . '\partials\header.php';

$name = sanitize($_POST['name'] ?? null);
$message = sanitize($_POST['message'] ?? null);

$errors = [];

// verifier et traiter le formulaire
if (!empty($_POST)) {
    if (strlen($name) === 0) {
        $errors['name'] = 'Le nom est obligatoire.';
    }
    if (mb_strlen($message) < 15) {
        $errors['name'] = 'Le message doit comporter 15 caracteres.';
    }


    if (empty($errors)) {
        // On fait la requete SQL pour inserer le film
        $query = db()->prepare('INSERT INTO contacts (name, message) VALUES (:name, :message)');
        $query->execute([
            'name' => $name,
            'message' => $message,
        ]);
    }
}

?>
<div class="container-lg mt-3">
    <h1>Contactez nous</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <input type="text" name="message" class="form-control" id="message">
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
<?php
require __DIR__ . '\partials\footer.php';
?>
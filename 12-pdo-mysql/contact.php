<?php
$title = 'Webflix - Contact';
require __DIR__ . '\partials\header.php';

$name = sanitize($_POST['name'] ?? null);
$message = sanitize($_POST['message'] ?? null);

$errors = [];
$messBdd = selectAll('SELECT * FROM contacts');
// verifier et traiter le formulaire
if (!empty($_POST)) {
    if (strlen($name) === 0) {
        $errors['name'] = 'Le nom est obligatoire.';
    }
    if (mb_strlen($message) < 15) {
        $errors['message'] = 'Le message doit comporter 15 caracteres.';
    }
    if (count($messBdd) >= 5) {
        $errors['bdd'] = 'La limite de 5 messages est atteinte';
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
    <?php
    if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $error) { ?>
                <p><?= $error ?></p>
            <?php } ?>
        </div>
    <?php } else if (empty($errors) && !empty($_POST)) { ?>
        <div class="alert alert-success" role="alert">
            <p>Formulaire envoyer !</p>
        </div>
    <?php } ?>
    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" id="name" value="<?= $name ?>">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <input type="text" name="message" class="form-control" id="message" value="<?= $message ?>">
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <?php foreach ($messBdd as $mess) { ?>

        <div class="card m-2">
            <div class="card-body">
                <h5 class="card-title"><?= $mess['name'] ?></h5>
                <p class="card-text"><?= $mess['message'] ?></p>
                <a href="deleteContact.php?id=<?= $mess['id'] ?>" class="card-link">Supprimer</a>
            </div>
        </div>
    <?php } ?>
</div>
<?php
require __DIR__ . '\partials\footer.php';
?>
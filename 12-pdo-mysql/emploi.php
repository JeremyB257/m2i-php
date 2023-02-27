<?php
$title = 'Webflix - Emploi';
require __DIR__ . '\partials\header.php';

$name = sanitize($_POST['name'] ?? null);
$cvFile = $_FILES['cvFile'] ?? null;

$errors = [];

// verifier et traiter le formulaire
if (!empty($_POST)) {
    //gerer les erreurs
    if (strlen($name) === 0) {
        $errors['name'] = 'Le nom est obligatoire.';
    }
    //Verifier le type du fichier uploadé
    $mime = !empty($cvFile['tmp_name']) ? mime_content_type($cvFile['tmp_name']) : '';

    if ($mime !== 'application/pdf') {
        $errors['cvFiles'] = 'Le fichier n\'est pas un pdf';
    }
    if ($cvFile['size'] > 5 * 1024 * 1024) {
        $errors['cvFiles'] = 'Le fichier est trop volumineux';
    }

    if (empty($errors)) {

        $filePath = $cvFile['tmp_name']; // emplacement temporaire
        $filename = $cvFile['name']; // Nom du fichier
        $extension = strrchr($filename, '.'); // .pdf
        $filename = md5($name . uniqid()) . $extension; // nomhasher.jpg

        if (!file_exists(__DIR__ . '/cv/')) {
            mkdir(__DIR__ . '/cv/', 0777, true);
        }
        move_uploaded_file($filePath, __DIR__ . '/cv/' . $filename);

        // @todo send request
    }
}
?>
<div class="container-lg mt-3">
    <?php
    if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $error) { ?>
                <p><?= $error ?></p>
            <?php } ?>
        </div>
    <?php } else if (empty($errors) && !empty($_POST)) { ?>
        <div class="alert alert-success" role="alert">
            <p>Le CV est envoyer !</p>
        </div>
    <?php } ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="jean dupont">
        </div>
        <div class="mb-3">
            <label for="cvFile" class="form-label">CV :</label>
            <input class="form-control" type="file" name="cvFile" id="cvFile">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
<?php
require __DIR__ . '\partials\footer.php';
?>
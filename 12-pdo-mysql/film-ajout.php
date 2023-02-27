<?php
$title = 'Webflix - Ajout Film';
require __DIR__ . '\partials\header.php';

$categories = selectAll('SELECT * from category');

//recupere les valeurs du formulaire
$title = sanitize($_POST['title'] ?? null);
$released_at = sanitize($_POST['released_at'] ?? null);
$description = sanitize($_POST['description'] ?? null);
$duration = sanitize($_POST['duration'] ?? null);
$category = sanitize($_POST['category'] ?? null);
$cover = $_FILES['cover'] ?? null;

$errors = [];

// verifier et traiter le formulaire
if (!empty($_POST)) {
    // verifier des erreurs
    if (strlen($title) === 0) {
        $errors['title'] = 'Le titre est obligatoire.';
    }

    $date = explode('-', $released_at);
    $year = (int) ($date[0] ?? 0);
    $month = (int) ($date[1] ?? 0);
    $day = (int) ($date[2] ?? 0);
    if (!checkdate($month, $day, $year)) {
        $errors['released_at'] = 'La date est incorrect.';
    }

    if (mb_strlen($description) <= 5) {
        $errors['description'] = 'La description doit faire 5 caracteres minimum.';
    }

    if ($duration < 1 || $duration > 999) {
        $errors['duration'] = 'La durée doit etre entre 1 et 999 minutes.';
    }

    //Verifie l'existence d'une categorie avec une requete
    $exists = select('SELECT COUNT(id_category) FROM category WHERE id_category = :category', ['category' => $category]);
    if (!$exists['COUNT(id_category)']) {
        $errors['category'] = 'La categorie n\'existe pas';
    }

    //traitement du formulaire s'il n'y a pas d'erreur
    if (empty($errors)) {
        //upload de l'image
        $file = $cover['tmp_name']; // emplacement temporaire
        $filename = $cover['name']; // Nom du fichier
        $extension = substr(strrchr($filename, '.'), 1); // jpg
        $filename = strtolower(str_replace(' ', '-', $title)) . '-' . uniqid() . '-' . '.' . $extension; // die-hard.jpg

        move_uploaded_file($file, __DIR__ . '/uploads/' . $filename);


        // On fait la requete SQL pour inserer le film
        $query = db()->prepare('INSERT INTO movie (title, released_at, description, duration, cover, id_category) VALUES (:title, :released_at, :description, :duration, :cover, :category)');
        $query->execute([
            'title' => $title,
            'released_at' => $released_at,
            'description' => $description,
            'duration' => $duration,
            'cover' => $filename,
            'category' => $category,
        ]);
    }
}
?>



<div class="container-lg mt-3">
    <h1>Ajouter un film</h1>
    <?php
    if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($errors as $error) { ?>
                <p><?= $error ?></p>
            <?php } ?>
        </div>
    <?php } else if (empty($errors) && !empty($_POST)) { ?>
        <div class="alert alert-success" role="alert">
            <p>Le film est ajouté !</p>
        </div>
    <?php } ?>
    <form class="row g-3" action="" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Matrix 1" value="<?= $title ?>">
        </div>
        <div class="col-md-6">
            <label for="released_at" class="form-label">Date de sortie</label>
            <input type="date" name="released_at" class="form-control" id="released_at" value="<?= $released_at ?>">
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="description" value="<?= $description ?>">
        </div>
        <div class="col-12">
            <label for="duration" class="form-label">Durée</label>
            <input type="text" name="duration" class="form-control" id="duration" placeholder="150" value="<?= $duration ?>">
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Image</label>
            <input class="form-control" name="cover" type="file" id="cover">
        </div>

        <div class="col-md-4">
            <label for="category" class="form-label">Catégorie</label>
            <select name="category" id="category" class="form-select">
                <option hidden>Choisir une categorie...</option>
                <?php foreach ($categories as $cat) { ?>
                    <option <?= $cat['id_category'] == $category ? 'selected' : '' ?> value="<?= $cat['id_category'] ?>"> <?= $cat['name'] ?></option>
                <?php } ?>

            </select>
        </div>


        <div class="col-md-8  text-center align-self-end">
            <button type="submit" class="btn btn-primary">Ajouter un film</button>
        </div>
    </form>
</div>

<?php
require __DIR__ . '\partials\footer.php';

?>
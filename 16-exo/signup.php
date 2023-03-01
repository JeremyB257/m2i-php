<?php

session_start();
require __DIR__ . '/partials/header.php';

$login = sanitize($_POST['login'] ?? null);
$password = sanitize($_POST['password'] ?? null);
$password2 = sanitize($_POST['password2'] ?? null);

$errors = [];

if (!empty($_POST)) {
    $bddUser = select('SELECT * FROM user WHERE login = :login', ['login' => $login]);


    if ($password !== $password2) {
        $errors['password'] = 'Les mot de passe ne sont pas identique';
    }
    if (strlen($password) < 6) {
        $errors['password'] = 'Le mot de passe doit comporter 6 caracteres minimum';
    }
    if ($bddUser) {
        $errors['login'] = 'Login déjà utilisé';
    }

    if (empty($errors)) {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = db()->prepare('INSERT INTO user (login, password, token) VALUES (:login, :password, :token)');
        $query->execute([
            'login' => $login,
            'password' => $hash,
            'token' => bin2hex(random_bytes(16))
        ]);
    }
}
?>
<div class="container-lg ">
    <div class="row h100 justify-content-center align-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="shadow-lg p-4 p-md-5">
                <h3 class="mb-4">Inscription</h3>
                <?php foreach ($errors as $error) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php  } ?>
                <?php if (empty($errors) && !empty($_POST)) { ?>
                    <div class="alert alert-success" role="alert">
                        Inscription reussi !
                    </div>
                <?php } ?>
                <form action="#" class="signin-form" method="post">
                    <div class="form-group mt-3">
                        <label class="form-label" for="login">Login</label>
                        <input type="text" class="form-control" name="login" id="login" required value=<?= $login ?>>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input id="password" type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password2">Confirmation du mot de passe</label>
                        <input id="password2" type="password" name="password2" class="form-control" required>
                    </div>
                    <div class="form-group my-2">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Inscription</button>
                    </div>
                </form>
                <p class="text-center mt-2">Déjà inscris ?
                    <a href="index.php">Connexion</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
require __DIR__ . '/partials/footer.php';
?>
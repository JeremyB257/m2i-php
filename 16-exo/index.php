<?php

session_start();
require __DIR__ . '/partials/header.php';

$login = sanitize($_POST['login'] ?? null);
$password = sanitize($_POST['password'] ?? null);
$remember = sanitize($_POST['remember'] ?? false);

$errors = [];


if (!empty($_POST)) {
    // verifier si ca match
    $bddUser = select('SELECT * FROM user WHERE login = :login', ['login' => $login]);




    if ($bddUser && password_verify($password, $bddUser['password'])) {
        $_SESSION['user'] = $login;
        if ($remember) {
            setcookie('remember', $bddUser['token'], time() + 60 * 60 * 24 * 365);
        }
        header('Location: connecte.php');
    } else {
        $errors['login'] = 'Erreur de login';
    }
}
?>
<div class="container-lg ">
    <div class="row h100 justify-content-center align-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="shadow-lg p-4 p-md-5">
                <h3 class="mb-4">Connexion</h3>
                <?php foreach ($errors as $error) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php  } ?>

                <form action="#" class="signin-form" method="post">
                    <div class="form-group mt-3">
                        <label class="form-label" for="login">Login</label>
                        <input type="text" class="form-control" name="login" id="login" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input id="password" type="password" name="password" class="form-control" required>

                    </div>

                    <div class="form-group d-md-flex">
                        <div class="w-50 text-left">
                            <label class="checkbox-wrap checkbox-primary mb-0">Se souvenir de moi
                                <input type="checkbox" name="remember">
                            </label>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Connexion</button>
                    </div>
                </form>
                <p class="text-center mt-2">Pas encore inscris ?
                    <a href="signup.php">Inscription</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php
require __DIR__ . '/partials/footer.php';
?>
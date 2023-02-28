<?php

//Les sessions permettent de garder des variables en mémoire.
//On pourra utiliser les variables sur plusieurs pages.

// Les sessions doivent être initialisées
session_start();
require __DIR__ . '\partials\header.php';

?>
<?php
if (!empty($_POST)) {
    $nickname = $_POST['nickname'] ?? null;
    $remember = $_POST['remember'] ?? false;

    $_SESSION['nickname'] = $nickname;

    //En raccourci
    //$_SESSION = ['nickname' => $nickname];

    if ($remember) {
        //On peut créer un cookie en php
        // ATTENTION, un cookie est modifiable donc il faut pas stocker des données qu'on peut deviner

        //generer un hash avec le pseudo
        $hash = password_hash($nickname, PASSWORD_DEFAULT);
        //stocker le pseudo et le hash dans un fichier
        file_put_contents('tokens.txt', $nickname . ':' . $hash . "\n", FILE_APPEND);
        //stocker le hash dans le cookie

        setcookie('remember', $nickname, time() + 60 * 60 * 24 * 365);
    }

    header('Location: index.php');
}

var_dump($_SESSION);

$currentNickname = $_SESSION['nickname'] ?? null;

?>

<?php if ($currentNickname) { ?>
    <h2>Hello <?= $currentNickname ?></h2>
    <a href="account.php">Mon compte</a>
<?php } ?>

<form action="" method="post">
    <input type="text" name="nickname">
    <div>
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Se souvenir</label>
    </div>
    <button type="submit">Envoyer</button>
</form>

<?php
require __DIR__ . '\partials\footer.php';
?>
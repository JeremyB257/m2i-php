<?php
require __DIR__ . '\partials\header.php';
http_response_code(404)
?>
<main class="container-lg d-flex align-items-center flex-column pt-3 mt-5">
    <h1>404</h1>
    <p>La page est introuvable</p>

    <form action="index.php">
        <button class="btn btn-outline-success">Retour vers les films</button>
    </form>
</main>

<?php
require __DIR__ . '\partials\footer.php';

?>
<?php
$title = 'Contact';
require __DIR__ . '\partials\header.php';

?>
<main class="container-lg pt-3 mt-5">

    <h1 class="text-center mt-2">Nous contacter</h1>
    <form class="row g-3" method="post">
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email">
        </div>
        <div class="col-md-6">
        </div>
        <div class="col-12">
            <label for="floatingTextarea2">Message</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary mb-3">Envoyer</button>
        </div>
    </form>

</main>

<?php
require __DIR__ . '\partials\footer.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Nous contacter</h1>
        <form class="row g-3" method="post">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="col-md-6">
                <label for="subject" class="form-label">Sujet</label>
                <select id="subject" name='subject' class="form-select">
                    <option selected value="job">Proposition d'emploi</option>
                    <option value="stage">Proposition de stage</option>
                    <option value="projet">Demande de projet</option>
                </select>
            </div>

            <div class="col-12">
                <label for="message" class="form-label">Message</label>
                <input type="text" class="form-control" id="message" placeholder="message">
            </div>

            <div class="col-12">
                <label for="civility" class="form-label">Civilité</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Mme
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Mr
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
</body>

</html>
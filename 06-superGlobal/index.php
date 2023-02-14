<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

</head>

<body>
    <h2>Les superGlobales</h2>



    <?php
    var_dump($_GET);
    // php 5
    //   $name = isset($_GET['name']) ? $_GET['name'] : 'John Doe';
    // php 7
    $name = htmlspecialchars($_GET['name']) ?? 'John Doe';
    $age = htmlspecialchars($_GET['age']) ?? null;
    $uppercase = (bool) ($_GET['uppercase'] ?? false);
    $originalName = $name;
    $selectedHouse = $_GET['house'] ?? null;

    if ($uppercase) {
        $name = strtoupper($name);
    }
    var_dump($uppercase)


    ?>

    <h2>Bonjour <?= ucfirst($name) ?></h2>

    <?php if ($age) { ?>
        <p>tu as <?= $age ?> ans</p>
    <?php } ?>

    <a href="index.php?name=Fiorella&age=3">Fiorella</a>
    <a href="index.php?name=Toto">Toto</a>

    <form method="get" action="">
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id='name' placeholder="Nom" value='<?= $originalName ?>'>
        </div>

        <div>
            <label for="age">Age</label>
            <select name="age" id="age">
                <?php for ($i = 13; $i < 100; $i++) {
                    echo "<option value='$i'>$i ans</option>";
                } ?>
            </select>
            <!-- <input type="text" name="age" id="age" placeholder="Age" value='<?= $age ?>'> -->
        </div>

        <input type="checkbox" name="uppercase" id="uppercase" <?= $uppercase ? 'checked' : '' ?>>
        <label for="uppercase">Majuscule</label>
        <div>


            <div>
                <?php $houses = ['Griffondor', 'Serdaigle', 'Pufsouffle', 'Serpentard']; ?>
                <label>Maison sorcier</label>
                <?php foreach ($houses as $house) { ?>
                    <input type="radio" name="house" id="<?= $house; ?>" value="<?= $house; ?>" <?= $house === $selectedHouse ? 'checked' : '' ?>>
                    <label for="<?= $house; ?>"><?= $house; ?></label>
                <?php } ?>
            </div>
            <input type="submit" value="Envoyer">
        </div>
    </form>






    <?php
    $repeat = $_GET['repeat'] ?? 10;
    $text = [
        'Je dois répéter cette phrase ' .  $repeat  . ' fois',
        'Je suis une nouvelle phrase à recopier ' . $repeat . ' fois'
    ];
    $rand = rand(0, 1)
    ?>

    <h1>Bart</h1>
    <form action="" method="get">
        <input type="number" name="repeat" placeholder="Nombre">
        <button>Envoyer</button>
    </form>
    <div class="board">
        <img src="./bart.png" alt="barts">
        <?php for ($i = 0; $i < $repeat; $i++) { ?>
            <p><?= $text[$rand] ?></p>
        <?php } ?>
    </div>
</body>

</html>
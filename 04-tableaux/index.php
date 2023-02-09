<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les tableaux</title>
</head>

<body>
    <h2>Les tableaux numériques</h2>
    <?php
    //Les index sont numeriques (0,1,2)
    $drinks = ['Monster', 'Coca', 'Orangina'];

    // Afficher Orangina
    echo $drinks[2];
    echo '<br/>';
    //Ajouter une boisson dans un tableau

    // array_push($drinks, 'Ice Tea');
    $drinks[] = 'Ice Tea';
    var_dump($drinks);
    echo '<br/>';
    //comment remplacer une boisson ?

    $drinks[1] = 'Vittel';
    var_dump($drinks);

    //Suppprimer une boisson ?

    unset($drinks[2]);
    ?>

    <ul>
        <?php foreach ($drinks as $drink) { ?>
            <li><?= $drink; ?></li>
        <?php   } ?>
    </ul>

    <h2>Les tableaux associatifs</h2>

    <?php
    // un tableau assiociatif possede des index que l'on definit nous meme
    // l'index est unique
    $fruits = [
        'A' => 'Fraise',
        'jaune' => 'Banane',
        'Cerise',
        'D' => 'Orange',
        'Pomme'
    ];
    var_dump($fruits);
    echo '<br/>';

    echo $fruits['jaune'];
    echo '<br/>';

    $fruits['vert'] = 'kiwi';
    var_dump($fruits);
    echo '<br/>';
    ?>


    <ul>
        <?php foreach ($fruits as $index => $fruit) { ?>
            <li><?= $index . ' : ' . $fruit ?></li>
        <?php } ?>
    </ul>


    <h2>Les tableaux multidimensionnels</h2>
    <?php
    $users = [
        [
            'name' => 'Mota',
            'firstname' => 'Fiorella',
            'Phone' => '0601020301',
            'adresses' => ['Hulluch', 'Lens'],
        ],
        [
            'name' => 'Mota',
            'firstname' => 'Matthieu',
            'Phone' => '0601020301',
            'adresses' => ['Hulluch'],
        ],
    ];

    //comment afficher Fiorella Mota vit à Hulluch et à Lens
    ?>

    <p>
        <?= $users[0]['firstname'] . ' ' . $users[0]['name'] . ' vit à ' . $users[0]['adresses'][0] . ' et à ' . $users[0]['adresses'][1] . '.' ?>
    </p>

    <!--coment afficher tous les utilisateurs-->

    <?php foreach ($users as $user) { ?>
        <p>
            <?= $user['firstname'] . ' ' . $user['name'] . ' vit ' ?>

            <?php foreach ($user['adresses'] as $index => $adress) {
                echo ' à ' .  $adress;
                echo $index < count($user['adresses']) - 1  ? ' et' : '';
            } ?>
        </p>
    <?php } ?>
    <h2>Nous avons <?= count($users); ?> utilisateurs.</h2>
</body>

</html>
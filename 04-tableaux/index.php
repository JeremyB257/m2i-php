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

    <?php
    $capitales = [
        'France' => 'Paris',
        'Espagne' => 'Madrid',
        'Italie' => 'Rome',
    ];
    foreach ($capitales as $index => $capital) { ?>
        <p>La capital de <?= $index ?> est <?= $capital ?></p>
    <?php } ?>



    <?php
    $population = [
        'France' => 67595000,
        'Suede' => 9998000,
        'Suisse' => 8417000,
        'Kosovo' => 1820631,
        'Malte' => 434403,
        'Mexique' => 122273500,
        'Allemagne' => 82800000,
    ];
    $sum = 0;
    foreach ($population as $pays => $pop) {
        $sum += $pop;
    ?>
        <ul>
            <?= $pop > 20000000 ? '<li>' . $pays . '</li>' : '' ?>
        </ul>
    <?php } ?>
    <h3>Population total europeen : <?= $sum ?> </h3>


    <?php
    $eleves = [
        0 => [
            'nom' => 'Matthieu',
            'notes' => [10, 8, 16, 20, 17, 16, 15, 2]
        ],
        1 => [
            'nom' => 'Thomas',
            'notes' => [4, 18, 12, 15, 13, 7]
        ],
        2 => [
            'nom' => 'Jean',
            'notes' => [17, 14, 6, 2, 16, 18, 9]
        ],
        3 => [
            'nom' => 'Enzo',
            'notes' => [1, 14, 6, 2, 1, 8, 9]
        ]
    ];

    foreach ($eleves as $eleve) {
        echo '<p>' . $eleve['nom'] . ' à eu ';
        foreach ($eleve['notes'] as $index => $note) {


            echo $index < count($eleve['notes']) - 1 ? $note . ' ' : 'et ' . $note;
        }
        echo '</p>';
    } ?>

    <h3>La moyenne de jean est de : <?= round(array_sum($eleves[2]['notes']) / count($eleves[2]['notes']), 2)  ?></h3>
</body>

</html>
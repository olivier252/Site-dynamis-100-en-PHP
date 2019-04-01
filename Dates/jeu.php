<?php

$parfums = [
    'fraise' => 4,
    'chocolat' => 5,
    'vanille' => 3
];

$cornets = [
    'pot' => 2,
    'cornet' => 1
];

$supplements = [
    'pepites chocolat' => 1,
    'chantilly' => 0.5
];
$title = 'composez votre glace';
$ingredients = [];
$total = 0;
require 'elements/header.php';

if(isset($_GET['parfum'])) {
    foreach($_GET['parfum'] as $parfum) {
        if(isset($parfums[$parfum])) {
            $total += $parfums[$parfum];
            $ingredients[] = $parfum;
        }
    }
}

if(isset($_GET['cornet'])) {
         $cornet = $_GET['cornet'];
        $total += $cornets[$cornet];
        $ingredients[] = $cornet;
    }

if(isset($_GET['supplement'])) {
    foreach($_GET['supplement'] as $supplement) {
        $total += $supplements[$supplement];
        $ingredients[] = $supplement;
    }
}
?>

<h1>Composez votre glace</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ta glace</h5>
                  <ul>
                      <?php foreach($ingredients as $ingredient): ?>
                        <li><?= $ingredient ?></li>
                      <?php endforeach; ?>
                  </ul>
                  <p>Prix total : <strong><?= $total ?></strong></p>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <form action = "" method = "GET">
            <h2>Parfums</h2>
            <?php foreach($parfums as $parfum => $prix): ?>
                <div class="checkbox">
                <label>
                    <?= checkbox('parfum', $parfum, $_GET); ?>
                    <?= $parfum ?> - <?= $prix ?> €
                </label>
                </div>
            <?php endforeach ?>
            <h2>Cornets</h2>
            <?php foreach($cornets as $cornet => $prix): ?>
                <div class="checkbox">
                    <label>
                    <?= radio('cornet', $cornet, $_GET); ?>
                    <?= $cornet ?> - <?= $prix ?> €
                </label>
                </div>
            <?php endforeach ?>
            <h2>Suppléments</h2>
            <?php foreach($supplements as $supplement => $prix): ?>
                <div class="checkbox">
                    <label>
                    <?= checkbox('supplement', $supplement, $_GET); ?>
                    <?= $supplement ?> - <?= $prix ?> €
                </label>
                </div>
            <?php endforeach ?>

            <button type="submit" class="btn btn-primary">Compose ta glace</button>
        </form>
    </div>
</div>


<?php require 'elements/footer.php'; ?>
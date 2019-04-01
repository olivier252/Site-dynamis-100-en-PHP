<?php
$title = 'Nous contacter';
require 'elements/header.php';
require_once 'data/config.php';
require_once 'function.php';
date_default_timezone_set('Europe/Paris');
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N')-1);

$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
?>

<div class="row">
    <div class="col-md-7">
      <h2>Nous contacter</h2>
    </div>

    <div class="col-md-5">

    <h2>Horaires d'ouverture</h2>

        <?php if($ouvert): ?>
            <div class="alert alert-success">
              Le magasin sera ouvert
            </div>
          <?php else: ?>
            <div class="alert alert-danger">
              Le magasin sera fermé
            </div>
        <?php endif; ?>

        <form action ="" method="GET">
            <div class="form-group">

                <?= select('jour', $jour, JOURS); ?>
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="heure" value="<?= $heure ?>" >
            </div>

                <button type = "submit" class="btn btn-primary">Envoyer</button>

        </form>

      <ul>
          <?php foreach(JOURS as $key => $jour): ?>
              <li>
                  <strong><?= $jour ?></strong> : <?= creneaux_html(CRENEAUX[$key]); ?>
              </li>
          <?php endforeach; ?>
      </ul>
    </div>
</div>


<?php require 'elements/footer.php';?>
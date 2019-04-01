<?php 


require_once 'functions/auth.php';
connex_User();

require_once 'elements/header.php';
require_once 'functions/compteur.php';

$annee = (int)date('Y');
$annee_select = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_select = empty($_GET['mois']) ? null : $_GET['mois'];

if($annee_select && $mois_select) {
    $total = nombre_VueMois($annee_select, $mois_select);
    $detail = nombre_VueDetail($annee_select, $mois_select);
} else {
    $total = nombre_Vue();
}

$mois = ['01' => 'Janvier',
         '02' => 'Fevrier',
         '03' => 'Mars',
         '04' => 'Avril',
         '05' => 'Mai',
         '06' => 'Juin',
         '07' => 'Juillet',
         '08' => 'Aout',
         '09' => 'Septembre',
         '10' => 'Octobre',
         '11' => 'Novembre',
         '12' => 'Decembre'
        ];
?>

<div class="row">
    <div class="col-md-4">
      <div class="list-group">
          <?php for($i = 0; $i < 5; $i++): ?>
            <a class="list-group-item <?= $annee - $i === $annee_select ? 'active' : '' ?>" href="dashboard.php?annee=<?= $annee - $i ?>">
                <?= $annee - $i ?>
            </a>
            <?php if(($annee - $i) === $annee_select): ?>
                <div class="list-group">
                  <?php foreach($mois as $key => $nom): ?>
                      <a class="list-group-item <?= $key === $mois_select ? 'active' : '' ?>" href="dashboard.php?annee=<?= $annee_select ?>&mois=<?= $key ?>">
                        <?= $nom ?><br>
                      </a>
                  <?php endforeach; ?>
                </div>
            <?php endif; ?>
          <?php endfor; ?>
      </div>
    </div>

    <div class="col-md-8">
        <div class="card-mb-4">
            <div class="card-body">
                <strong style="font-size:3em;"><?= $total; ?></strong><br>
                Visite<?= $total > 1 ? 's' : ''; ?> total
            </div>
        </div>
        <?php if(isset($detail)): ?>
            <h2>Détail des visites au mois</h2>
                <table class="table table-straped">
                    <thead>
                        <tr>
                            <th>Jour</th>

                            <th>Nombre de visites</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($detail as $ligne): ?>
                        <tr>
                            <td><?= $ligne['jour'] ?></td>
                            <td><?= $ligne['total'] ?> visite<?= $ligne['total'] <= 1 ? '' : 's' ?></td>
                        </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
        <?php endif; ?>
    </div>
</div>

<?php require 'elements/footer.php'; ?>
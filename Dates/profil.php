<?php
require 'elements/header.php';
$nom = '';
if(isset($_GET['action']) && ($_GET['action'])==='deconnecter') {
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time()-10);
}
if (isset($_COOKIE['utilisateur'])) {
     $nom = $_COOKIE['utilisateur'];
    //var_dump($_COOKIE['utilisateur']);
}

if(isset($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $nom =$_POST['nom'];

}
?>

<?php if($nom): ?>
<h1>Bonjour <?= htmlentities($nom); ?></h1>
<a href="profil.php?action=deconnecter">Se déconnecter</a>
<?php else: ?>
    <form action = "profil.php" method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="nom" placeholder="Entrez votre nom">
        </div>

        <button type="submit" class="btn btn-primary">Envoi</button>
    </form>
<?php endif; ?>


<?= require 'elements/footer.php'; ?>
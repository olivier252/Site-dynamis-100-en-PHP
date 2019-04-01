<?php require 'elements/header.php';
$success = "";
$error = "";
$email ="";
if(isset($_POST['email'])) {
    $email = $_POST['email'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__.DIRECTORY_SEPARATOR.'emails'.DIRECTORY_SEPARATOR.date('Y-m-d');
        file_put_contents($file, $email. 'PHP_EOL', FILE_APPEND);
        $success = "Votre email a bien été envoyé";
        $email ="";
    } else {
        $error = "Email invalide";
    }
}
?>
<h1>S'inscrire à la newsletter</h1>

<p>Désolé je ne sais pas encore créer de newsletter, mais ça arrive !</p>

<?php if($error): ?>
    <div class="alert alert-danger">
      <?= $error ?>
    </div>
    <?php elseif($success): ?>
    <div class="alert alert-success">
      <?= $success ?>
    </div>
<?php endif; ?>

<form action ="newsletter.php" method="POST" class="form-inline">
    <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Entrez votre email" value = <?= htmlentities($email) ?> required>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>


<?php require 'elements/footer.php'; ?>

<?php
$erreur = "";
$password = '$2y$10$7ex.3SIb46hqDX22NOvgYeSJkGl139O4XgESf4TRtZbUGkM0LTpdK'; 
if(!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
	

	if(($_POST['pseudo'] === 'John') && password_verify($_POST['motdepasse'], $password)) {
		session_start();
		$_SESSION['connex'] = 'oliv';
		header('location:dashboard.php');
	} else {
		$erreur = 'Identifiants incorrects';
	}
}

require_once 'functions/auth.php';
if(set_Connex()) {
	header('location:dashboard.php');
	exit();
}

require_once 'elements/header.php';
?>

<?php if($erreur): ?>
	<div class="alert alert-danger">
		<?= $erreur ?>
	</div>
<?php endif; ?>

<form action="" method="POST">
	<div class="form-group">
		<input type="text" class="form-control" name="pseudo" placeholder="Nom d'utilisateur">
	</div>
	<div class="form-group">
		<input type="password" class="form-control" name="motdepasse" placeholder="Votre mot de passe">
	</div>
	<button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require_once 'elements/footer.php'; ?>
<?php require 'elements/header.php';
$age ='';
if(isset($_POST['birthday'])) {
    setcookie('user', $_POST['birthday']);
    $_COOKIE['user'] = $_POST['birthday'];
}

if(isset($_COOKIE['user'])) {
    $birthday = (int)$_COOKIE['user'];
    $age = date('Y') - $birthday;
}
?>

<?php if($age && $age > 18): ?>

    <h1>Hello tu es un salace !</h1>



<?php elseif($age && $age<18): ?>
    <h1>Vous n'avez pas l'âge requis pour le contenu</h1>

<?php else: ?>
<form action ="" method="POST">
    <div class="form-group">
        <label for="birthday">Entrez votre âge</label>
        <select name="birthday" id="birthday" class="form-control">
            <?php for($i=2010; $i > 1919; $i--): ?>
                <option value ="<?= $i ?>"><?= $i ?></option>
            <?php endfor ?>
        </select>
        <button type="submit">Envoyer</button>
    </div>
</form>
<?php endif; ?>
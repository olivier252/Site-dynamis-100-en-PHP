
<?php require_once 'function.php'; ?>
</main><!-- /.container -->
<footer>
<hr>
<div class="row">
    <div class="col-md-4">
        <?php
          require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'functions'.DIRECTORY_SEPARATOR.'compteur.php';
          ajouter_Vue();

          $vue = nombre_Vue();
          $nbr_Vue="";

          if($vue<=1) {
            $nbr_Vue = 'vue';
          } else {
            $nbr_Vue= 'vues';
        }
        ?>
        <p>Il y a eu <?= nombre_Vue() ?> <?= $nbr_Vue ?> sur le site</p>
    </div>
    <div class="col-md-4">
        <form action = "newsletter.php" method="POST" class="form-inline">
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Entrez votre email" required>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <div class="col-md-4">
<h5>Navigation</h5>
        <ul class="list-unstyled small-text">
            <?= nav_menu(''); ?>
        </ul>


    </div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
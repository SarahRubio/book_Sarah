<?php
require "../../config.php";
verif_connexion();
include "../../fonctions.php";
?>

<!doctype html>
<html lang="fr">

  <?php
    include "../../templates/include/head.php";
  ?>

<body class="bgBeige">

  <div class="paddinglr10 tright padtop2">
    <a href="deconnexion.php" class="fontDarkgrey">Déconnexion</a>
  </div>

  <div class="bgWhite marg10">
    <main class="padtopbot10">
      <h1 class="tcenter font3 padbot10 fontDarkgrey">Modification de la page d'accueil</h1>

<?php
#show_error();
#show_success();
?>

    <form enctype="multipart/form-data" action="formulaire_accueil_reponse.php" method="post">

<!-- Pour le texte d'accueil -->
      <div class="flex column aicenter">
        <div class="flex column padbot3">
          <label for="titre" class="padbot3">Titre de la page d'accueil : </label>
          <input class="tcenter" type="text" name="titre" value='<?php echo returnValeur("titre")?>' placeholder="Titre de la page" />
        </div>

        <div class="flex column padbot3">
          <label for="titre" class="tcenter padbot3">Texte de la page d'accueil : </label>
          <textarea name="texteAccueil" rows="10" cols="60"><?php echo returnValeur("texte")?></textarea>
        </div>

        <div class="flex column padbot3">
          <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
          <label for="imageAccueil" class="padbot3 tcenter">Image de la page d'accueil : </label>
          <div class="">
            <?php
                if(is_file("../../templates/images/accueil.jpg")) {
                  echo "<img src='../../templates/images/accueil.jpg' height='380' >";
                }
            ?>
          </div>
          <input class="padbot3" name="imageAccueil" type="file"  accept="image/jpg" />
        </div>

        <div class="flex tcenter">
          <button type="button" name="button" class="padFull1 bgBeige font09"><a href="<?php echo URL_BASE ?>admin/administration.php" class="fontDarkgrey tcenter textdecoNone">Annuler</a></button>
          <input type="submit" value="Envoyer" class="padFull1 bgBeige font09 pointer fontDarkgrey" />
        </div>
      </div>
    </form>

  </main>
</div>
</body>
</html>

<?php
require "../../config.php";
verif_connexion();
include "../../fonctions.php";

$contact = $bdd ->query("SELECT * FROM Contact WHERE id_contact = 1") -> fetch();

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
      <h1 class="tcenter font3 padbot10 fontDarkgrey">Modification de la page Contact</h1>

<?php
#show_error();
#show_success();
?>

    <form enctype="multipart/form-data" action="formulaire_contact_reponse.php" method="post">

<!-- Pour le texte d'accueil -->
      <div class="flex column aicenter">
        <div class="flex aicenter padbot3">
          <label for="tel" class="tcenter">Téléphone : </label>
          <input class="tcenter" type="text" name="tel" value='<?php echo $contact["tel"]?>'/>
        </div>

        <div class="flex aicenter padbot3">
          <label for="mail" class="tcenter">Email : </label>
          <input class="tcenter" type="email" name="mail" value='<?php echo $contact["email"]?>'/>
        </div>

        <div class="flex aicenter padbot3">
          <label for="linkedin" class="tcenter">LinkedIn : </label>
          <input class="tcenter" type="text" name="linkedin" value='<?php echo $contact["linkedin"]?>'/>
        </div>

        <div class="flex aicenter padbot3">
          <label for="github" class="tcenter">GitHub : </label>
          <input class="tcenter" type="text" name="github" value='<?php echo $contact["github"]?>'/>
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

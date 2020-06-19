<?php
include "../../config.php";
verif_connexion();
?>

<!doctype html>
<html lang="fr">

  <?php
    include "../../templates/include/head.php";
  ?>

<body class="bgBeige">
  <div class="paddinglr10 tright padtop2">
    <a href="../deconnexion.php" class="fontDarkgrey">Déconnexion</a>
  </div>
  <div class="bgWhite marg10">
    <main class="padtopbot10">
      <h1 class="tcenter font3 fontDarkgrey margbot10">Gestion des Administrateurs</h1>


<?php
#show_error();
#show_success();
?>

    <div class="flex jcenter padbot3">
        <a href="<?php echo URL_BASE ?>admin/administration.php" class="marglr2 fontDarkgrey">Retour à l'accueil</a>
        <a href="<?php echo URL_BASE?>admin/user_admin/formulaire_user.php" class="marglr2 fontDarkgrey">Ajouter un administrateur</a>
    </div>

    <div class="flex column aicenter">
        <?php
            $results = $bdd -> query("SELECT * FROM administrateur") -> fetchAll();

            if(count($results) == 0) {
                echo "Aucun administrateur";

            } else {
                echo "<ul>";
                foreach($results as $result) {
                    $lienSupprimer = "<a href=" . URL_BASE . "admin/user_admin/user_supprimer.php?userASupprimer=$result[id_admin] class='fontDarkgrey'>Supprimer</a>";
                    echo "<li class='padbot3'>✒︎ $result[identifiant]  ($lienSupprimer)</li>";
                }
                echo "</ul>";
            }
        ?>
    </div>

  </main>
</div>
</body>
</html>

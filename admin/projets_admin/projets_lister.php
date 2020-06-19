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
      <h1 class="tcenter font3 fontDarkgrey margbot10">Modification des Projets</h1>


<?php
#show_error();
#show_success();
?>

    <div class="flex jcenter padbot3">
        <a href="<?php echo URL_BASE ?>admin/administration.php" class="marglr2 fontDarkgrey">Retour à l'accueil</a>
        <a href="<?php echo URL_BASE?>admin/projets_admin/formulaire_projets.php" class="marglr2 fontDarkgrey">Ajouter un projet</a>
    </div>

    <div class="flex column aicenter">
        <?php
            $results = $bdd -> query("SELECT * FROM projets order by ordre") -> fetchAll();

            if(count($results) == 0) {
                echo "Aucun projet";

            } else {
                echo "<ul>";
                foreach($results as $result) {
                    $lienModifier = "<a href=" . URL_BASE . "admin/projets_admin/formulaire_projets.php?projetAAfficher=$result[id_projet] class='fontDarkgrey'>Modifier</a>";
                    $lienSupprimer = "<a href=" . URL_BASE . "admin/projets_admin/projets_supprimer.php?projetASupprimer=$result[id_projet] class='fontDarkgrey'>Supprimer</a>";
                    echo "<li class='padbot3'>✒︎ $result[nom]  ( $lienModifier | $lienSupprimer)</li>";
                }
                echo "</ul>";
            }
        ?>
    </div>

  </main>
</div>
</body>
</html>

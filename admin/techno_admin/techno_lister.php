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
    <a href="deconnexion.php" class="fontDarkgrey">Déconnexion</a>
  </div>
  <div class="bgWhite marg10">
    <main class="padtopbot10">
      <h1 class="tcenter font3 fontDarkgrey margbot10">Modification des Technologies</h1>


<?php
#show_error();
#show_success();
?>

    <div class="flex jcenter padbot3">
        <a href="<?php echo URL_BASE ?>admin/administration.php" class="marglr2 fontDarkgrey">Retour à l'accueil</a>
        <a href="<?php echo URL_BASE?>admin/techno_admin/formulaire_techno.php" class="marglr2 fontDarkgrey">Ajouter une technologie</a>
    </div>

    <div class="flex column aicenter">
        <?php
            $results = $bdd -> query("SELECT * FROM technologie") -> fetchAll();

            if(count($results) == 0) {
                echo "Aucune technologie";

            } else {
                echo "<ul>";
                foreach($results as $result) {
                    $lienModifier = "<a href=" . URL_BASE . "admin/techno_admin/formulaire_techno.php?technoAAfficher=$result[id_techno] class='fontDarkgrey'>Modifier</a>";
                    $lienSupprimer = "<a href=" . URL_BASE . "admin/techno_admin/techno_supprimer.php?technoASupprimer=$result[id_techno] class='fontDarkgrey'>Supprimer</a>";
                    echo "<li class='padbot3'>✒︎ $result[tech_nom]  ( $lienModifier | $lienSupprimer)</li>";
                }
                echo "</ul>";
            }
        ?>
    </div>

  </main>
</div>
</body>
</html>

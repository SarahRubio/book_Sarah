<?php

  include "../../config.php";

  verif_connexion();

  if(!empty($_GET["projetAAfficher"])) {
      $projetAModifier = $bdd -> query("SELECT * from projets where id_projet = " . $_GET["projetAAfficher"]) -> fetch();
  } else {
      $projetAModifier = [];
  }

  if(!empty($_GET["projetAAfficher"])) {
      $techAModifier = $bdd -> query("SELECT * FROM projets, technologie, projet_techno WHERE projets.id_projet = " . $_GET["projetAAfficher"] ." AND projets.id_projet = projet_techno.projet_id AND projet_techno.techno_id = technologie.id_techno") -> FetchAll();
  } else {
      $techAModifier = [];
  }


  include "../../templates/include/head.php";

?>

  <body class="bgBeige">
    <div class="paddinglr10 tright padtop2">
      <a href="deconnexion.php" class="fontDarkgrey">Déconnexion</a>
    </div>
    <div class="bgWhite marg10">
      <main class="padtopbot10">
        <h1 class="tcenter font3 fontDarkgrey padbot3">Gestion des projets</h1>

        <?php
        #show_error();
        #show_success();
        ?>

    <div class="flex column aicenter jaround">
      <div class="form">

          <form enctype="multipart/form-data" action="projets_formulaire_reponse.php" method="post">

              <input type="hidden" name="id_projet" value="<?php
                    if(!empty($projetAModifier["id_projet"])) {
                        echo $projetAModifier["id_projet"];
                    } else {
                        echo 0;
                    }
                  ?>">

              <div class="padbot3">
                  Nom : <input name="nom" placeholder="Nom" type="text" value="<?php
                        if(!empty($projetAModifier["nom"])) {
                            echo $projetAModifier["nom"];
                        } else {
                            echo "";
                        }
                    ?>">
              </div>

              <div class="flex column padbot3">
                  Pitch : <textarea name="pitch" placeholder="Pitch" type="text" cols="40" rows="20"><?php
                      if(!empty($projetAModifier["pitch"])) {
                          echo $projetAModifier["pitch"];
                      } else {
                          echo "";
                      }
                  ?></textarea>
              </div>

              <div class="padbot3">
                  Année : <input name="annee" placeholder="Année" type="text" value="<?php
                      if(!empty($projetAModifier["annee"])) {
                          echo $projetAModifier["annee"];
                      } else {
                          echo "";
                      }
                  ?>">
              </div>

              <div class="padbot3">
                  Client : <input name="client" placeholder="Client" type="text"  value="<?php
                      if(!empty($projetAModifier["client"])) {
                          echo $projetAModifier["client"];
                      } else {
                          echo "";
                      }
                  ?>">
              </div>

              <div class="padbot3">
                  Lien : <input name="lien" placeholder="Lien" type="text"  value="<?php
                      if(!empty($projetAModifier["lien"])) {
                          echo $projetAModifier["lien"];
                      } else {
                          echo "";
                      }
                  ?>">
              </div>

              <div class="padbot3">
                  Ordre : <input name="ordre" placeholder="Ordre" type="number"  value="<?php
                      if(!empty($projetAModifier["ordre"])) {
                          echo $projetAModifier["ordre"];
                      } else {
                          echo "";
                      }
                  ?>">
              </div>

              <div class="padbot3">
                  Online (1 pour oui / 0 pour non) : <input name="online" placeholder="Online" type="number"  value="<?php
                      if(!empty($projetAModifier["online"])) {
                          echo $projetAModifier["online"];
                      } else {
                          echo "";
                      }
                  ?>">
              </div>

              <div class="padbot3 flex column padbot3">
                  <p class="padbot3" >Technologies :</p>
                  <div class="">
                    <?php
                      $technologies = $bdd -> query("SELECT * FROM technologie") -> fetchAll();
                      foreach ($technologies as $key => $techno) {
                        echo "<label for='techno[]' class='padl1'>" . $techno["tech_nom"] . "</label>";
                        echo "<input name='techno[]' type='checkbox' value='" . $techno["id_techno"] . "'>";
                      }
                    ?>
                  </div>
              </div>

              <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />

              <div class="flex column aicenter padbot3" >

                <?php
                  if(!empty($_GET["projetAAfficher"])) {
                      if(is_file("/Users/sarah/Sites/book_Sarah/templates/images/$projetAModifier[nom]" . "1.jpg")) {
                          echo "<img src='" . URL_BASE . "templates/images/$projetAModifier[nom]" . "1.jpg' height='280' class='padbot3'>";
                      }
                      if(is_file("/Users/sarah/Sites/book_Sarah/templates/images/$projetAModifier[nom]" . "2.jpg")) {
                          echo "<img src='" . URL_BASE . "templates/images/$projetAModifier[nom]" . "2.jpg' height='280'>";
                      }
                  }
                ?>
              </div>

              <div class="">
                Image du projet : <input name="imageprojet" type="file"  accept="image/jpeg"  class="padbot3"/>
              </div>

              <input type="submit" value="Envoyer" />

              <a href="administration.php" class="button">Annuler</a>

          </form>

      </div>
    </div>


  </main>
</div>
</body>
</html>

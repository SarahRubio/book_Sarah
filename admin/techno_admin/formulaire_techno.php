<?php

  include "../../config.php";

  verif_connexion();

  if(!empty($_GET["technoAAfficher"])) {
      $technoAModifier = $bdd -> query("SELECT * from technologie where id_techno = " . $_GET["technoAAfficher"]) -> fetch();
  } else {
      $technoAModifier = [];
  }

  if(!empty($_GET["technoAAfficher"])) {
      $techAModifier = $bdd -> query("SELECT * FROM projets, technologie, projet_techno WHERE technologie.id_techno = " . $_GET["technoAAfficher"] ." AND technologie.id_techno = projet_techno.techno_id AND projet_techno.projet_id = projets.id_projet") -> FetchAll();
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
          <h1 class="tcenter font3 fontDarkgrey padbot3">Gestion des technologies</h1>

          <?php
          #show_error();
          #show_success();
          ?>

            <div class="flex column aicenter jaround">
              <div class="form">

                  <form enctype="multipart/form-data" action="formulaire_techno_reponse.php" method="post">

                      <input type="hidden" name="id_techno" value="<?php
                            if(!empty($technoAModifier["id_techno"])) {
                                echo $technoAModifier["id_techno"];
                            } else {
                                echo 0;
                            }
                          ?>">

                      <div class="padbot3">
                          Nom : <input name="nom" placeholder="Nom" type="text" value="<?php
                                if(!empty($technoAModifier["tech_nom"])) {
                                    echo $technoAModifier["tech_nom"];
                                } else {
                                    echo "";
                                }
                            ?>">
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

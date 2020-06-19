<?php

  include "../../config.php";

  verif_connexion();

  include "../../templates/include/head.php";

?>

  <body class="bgBeige">
    <div class="paddinglr10 tright padtop2">
      <a href="../deconnexion.php" class="fontDarkgrey">Déconnexion</a>
    </div>
      <div class="bgWhite marg10">
        <main class="padtopbot10">
          <h1 class="tcenter font3 fontDarkgrey padbot3">Ajouter un administrateur</h1>

          <div class="padbot3">
            <?php
                if(!empty($_SESSION["notif"])) {
                    foreach ($_SESSION["notif"] as $key => $notif) {
                        echo "<p class='tcenter bold'>$notif</p>";
                    }
                }
            ?>
          </div>


            <div class="flex column aicenter jaround">

              <div class="form">

                  <form enctype="multipart/form-data" action="formulaire_user_reponse.php" method="post">

                      <div class="padbot3">
                          Identifiant : <input name="identifiant" type="text">
                      </div>

                      <div class="padbot3">
                          Mot de passe : <input name="motdepasse" type="password" >
                      </div>

                      <div class="padbot3">
                          Confirmez le mot de passe : <input name="motdepasse_confirm" type="password" >
                      </div>

                      <input type="submit" value="Ajouter" class="padFull1 bgBeige font09 pointer fontDarkgrey" />

                      <a href="../administration.php" class="button padFull1 bgBeige font09 pointer fontDarkgrey">Annuler</a>

                  </form>

              </div>
            </div>
        </main>
      </div>
    </body>
</html>

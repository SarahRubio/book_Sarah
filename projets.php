<?php
  include "config.php";
  include $_dossier_template . "include/head.php";
?>

  <body class="bgBeige">

    <div class="bgWhite marg10">

      <?php include $_dossier_template . "include/header.php"; ?>

      <div class="container">
        <?php include $_dossier_template . "include/navigation.php"; ?>
      </div>

      <main class="padtopbot10 paddinglr10">
        <h2 class="font2 padbot3 tcenter maj margbot5">Mes projets</h2>


          <div class="filtre flex column aicenter padtopbot6 margbot5">
            <form class="" action="projets.php" method="post">
              <div class="formfield-select">
                <label for="filtre" class="maj">Filtrer les projets par technologies :</label>
                <div class="formfield-select--container">
                  <select class="bgBeige" name="filtre">
                    <option value="HTML5">HTML5</option>
                    <option value="CSS3">CSS3</option>
                    <option value="CSS3 Animation">CSS3 Animation</option>
                    <option value="Javascript">Javascript</option>
                    <option value="PHP">PHP</option>
                    <option value="MySQL">MySQL</option>
                    <option value="Python">Python</option>
                    <option value="Django">Django</option>
                  </select>
                </div>
              </div>
              <div class="flex column aicenter">
                <input type="submit" name="filtrer" value="Filtrer" class="padFull1 pointer bgBeige font09 maj">
              </div>
            </form>
          </div>

          <div class="resultat_filtre flex column aicenter maj fontDarkGrey">
            <?php
                if(empty($_POST["filtre"])) {
                  $resultprojets = $bdd -> query("SELECT * FROM projets WHERE online = 1 ORDER BY ordre") -> fetchAll();
                }
                else {
                  $resultprojets = $bdd ->query("SELECT * FROM projets, technologie, projet_techno WHERE technologie.tech_nom = '$_POST[filtre]' AND projets.id_projet = projet_techno.projet_id AND projet_techno.techno_id = technologie.id_techno AND online = 1") -> FetchAll();
                  if(empty($resultprojets)) {
                    echo "<p>aucun projet en ligne ne correspond à votre recherche</p>";
                  }
                  else {
                    echo "<p>Les projets réalisés avec $_POST[filtre] : </p>";
                  }
                }
             ?>
          </div>

          <div class="container-grid padtop10">

              <?php
                foreach ($resultprojets as $key => $projet) {
                  echo
                      "<div class='gallery-container'>
                        <a href=\"projet.php?projetChoisi=$projet[id_projet]\" class='textdecoNone fontBlack maj'>
                          <div class='image'>
                              <img src=\"templates/images/$projet[nom]1.jpg\" alt='une photo' width='360' height='225'>
                          </div>
                          <p class='tleft padtop2 padbot1 fontGrey maj'>$projet[nom]</p>
                          <p class='tleft padbot1 fontGrey maj font09'>";

                  $resultTech_projet = $bdd ->query("SELECT * FROM projets, technologie, projet_techno WHERE projets.nom = '$projet[nom]' AND projets.id_projet = projet_techno.projet_id AND projet_techno.techno_id = technologie.id_techno") -> FetchAll();

                  foreach ($resultTech_projet as $key => $tech) {
                      echo "$tech[tech_nom]" . " / ";
                  }

                  echo "</p>
                      </a>
                    </div>";
                }
              ?>
          </div>

      </main>

      <?php include $_dossier_template . "include/footer.php"; ?>

    </div>


  </body>
</html>

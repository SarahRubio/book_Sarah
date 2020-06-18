<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo "$mon_nom" . " " . $projet["nom"] . " ". $projet["client"]; ?></title>
    <link rel="stylesheet" href="<?php echo URL_BASE . $_dossier_template ?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&display=swap" rel="stylesheet">
  </head>

  <body class="bgBeige">

  <div class="bgWhite marg10">

    <?php include "include/header.php" ?>

    <div class="container">
      <?php include $_dossier_template . "include/navigation.php"; ?>
    </div>

    <main class="paddinglr10 padtopbot10">

      <div class="flex jbetw">

        <div class="flex column jcenter padbot3">
            <h2 class="font23 fontDarkgrey margbot5 maj league"><?php echo $projet["nom"]; ?></h2>
            <div class="tjustify lineheight15 padbot1">
              <p class="fontDarkgrey lineheight15"><span class="">Date de création : </span><?php echo $projet["annee"]; ?></p>
            </div>
            <div class="tjustify lineheight15 padbot1">
              <p class="fontDarkgrey lineheight15"><span class="">Client : </span><?php echo $projet["client"]; ?></p>
            </div>
            <div class="tjustify lineheight15 margbot5">
              <p class="fontDarkgrey lineheight15"><span >Réalisé avec : </span>
                <?php
                    foreach ($projet_techno as $key => $techno) {
                      echo $techno["tech_nom"] . " ";
                    }
                ?>
              </p>
            </div>
            <p class="tjustify lineheight15 padbot3 fontDarkgrey font11 borderTop padtop5"><?php echo $projet["pitch"]; ?></p>

            <div class="lineheight15 padbot1">
              <p><?php if($projet["lien"] != "") { echo "<a href='$projet[lien]' class='fontDarkgrey'>Site web</a>";} ?></p>
            </div>

        </div>

        <div class="flex column projetImage">
          <img src="templates/images/<?php echo $projet["nom"]; ?>1.jpg" alt="une photo" width="360" height="225">
          <img src="templates/images/<?php echo $projet["nom"]; ?>2.jpg" alt="une photo" width="360" height="225">
        </div>
      </div>

      <div class="flex jbetw margtop10">
          <?php
            if (!empty($projet_precedent)) {
              echo "<p class='tleft'><a href=\"projet.php?projetChoisi=$projet_precedent[id_projet]\" class='textdecoNone fontBlack maj'> ← $projet_precedent[nom]</a></p>";
            }

            if (!empty($projet_suivant)) {
              echo "<p class='tright'><a href=\"projet.php?projetChoisi=$projet_suivant[id_projet]\" class='textdecoNone fontBlack maj'>$projet_suivant[nom] → </a></p>";
            }
          ?>
      </div>


      </div>
    </main>

    <?php #include "include/footer.php" ?>

  </div>

  </body>
</html>

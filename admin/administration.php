<?php
  require "../config.php";
  verif_connexion();

?>

<!doctype html>
<html lang="fr">

  <?php
    include "../templates/include/head.php";
  ?>

<body class="bgBeige">
  <div class="paddinglr10 tright padtop2">
    <a href="deconnexion.php" class="fontDarkgrey">Déconnexion</a>
  </div>
  <div class="bgWhite marg10">
    <main class="padtopbot10">
      <h1 class="tcenter font3 fontDarkgrey padbot3">Espace administration</h1>

      <?php
          if(!empty($_SESSION["notif"])) {
              foreach ($_SESSION["notif"] as $key => $notif) {
                  echo "<p class='tcenter bold'>$notif</p>";
              }
          }

          if(!empty($_SESSION["notifError"])) {
              foreach ($_SESSION["notifError"] as $notif) {
                  echo "<p class='tcenter bold'>$notif</p>";
              }
          }
          unset($_SESSION["notif"], $_SESSION["notifError"]);
      ?>

      <div class="flex column aicenter jaround padtop10">
          <a href="<?php echo URL_BASE ?>admin/user_admin/user_lister.php" class="padbot3 fontDarkgrey pointer">Gérer les administrateurs</a>
          <a href="<?php echo URL_BASE ?>admin/accueil_admin/formulaire_accueil.php" class="padbot3 fontDarkgrey pointer">Modifier ma page d'accueil</a>
          <a href="<?php echo URL_BASE ?>admin/projets_admin/projets_lister.php" class="padbot3 fontDarkgrey pointer">Ajouter, modifier ou supprimer un projet</a>
          <a href="<?php echo URL_BASE ?>admin/techno_admin/techno_lister.php" class="padbot3 fontDarkgrey pointer">Ajouter, modifier ou supprimer une technologie</a>
          <a href="<?php echo URL_BASE ?>admin/contact_admin/formulaire_contact.php" class="padbot3 fontDarkgrey pointer">Modifier ma page Contact</a>
      </div>

    </main>
  </div>
</body>
</html>

<?php

include "../../config.php";

verif_connexion();

if(!empty($_POST)) {

      if($_POST["motdepasse"] == $_POST["motdepasse_confirm"]) {
        $hash = crypt($_POST["motdepasse"], '$2a$07$usesomesillystringforsalt$');
        $query = $bdd -> prepare ("INSERT INTO administrateur (identifiant, mot_de_passe) VALUES (:identifiant, :motdepasse)");
        $query -> execute([
            ":identifiant" => $_POST["identifiant"],
            ":motdepasse" => $hash,
        ]);

        $_SESSION["notif"][] = "Nous avons ajouté un nouvel administrateur";

      } else {
        $_SESSION["notif"][] = "Les champs mot de passe sont différents";
        header("location:" . URL_BASE . "admin/user_admin/formulaire_user.php");
        exit;
      }


}

header("location:" . URL_BASE . "admin/administration.php");
exit;

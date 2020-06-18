<?php

    include "../config.php";

    if(
      empty($_POST["identifiant"]) ||
      empty($_POST["password"])) {
          $_SESSION["erreur"][] = "Veuillez vous connecter";
          header("location: connexion.php");
          exit;
    } else {
      $administrateur = $bdd -> query("SELECT * FROM administrateur where identifiant='$_POST[identifiant]' AND mot_de_passe='$_POST[password]' ") -> fetchAll(PDO::FETCH_ASSOC);

      if(!empty($administrateur)) {
          $_SESSION["droit_connexion"] = $administrateur[0];
          header("location: administration.php");
          exit;
      } else {
          $_SESSION["erreur"][] = "Ces identifiants sont incorrects.";
          header("location: connexion.php");
          exit;
      }
}

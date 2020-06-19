<?php

    include "../config.php";

    if(
      empty($_POST["identifiant"]) ||
      empty($_POST["password"])) {
          $_SESSION["erreur"][] = "Veuillez vous connecter";
          header("location: connexion.php");
          exit;

    } else {

        $administrateur = $bdd -> query("SELECT * FROM administrateur where identifiant='$_POST[identifiant]'") -> fetch();
        $mdpBdd = $administrateur["mot_de_passe"];
        $input_hashed = crypt($_POST["password"], '$2a$07$usesomesillystringforsalt$');

        if($mdpBdd === $input_hashed) {
            $_SESSION["droit_connexion"] = $administrateur[0];
            header("location: administration.php");
            exit;
        } else {
            $_SESSION["erreur"][] = "Ces identifiants sont incorrects.";
            header("location: connexion.php");
            exit;
        }
    }

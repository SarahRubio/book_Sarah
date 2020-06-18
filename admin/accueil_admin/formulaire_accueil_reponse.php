<?php

include "../../config.php";
include "../../fonctions.php";

verif_connexion();


if(!empty($_POST)) {
  enregistreValeur("titre", $_POST["titre"]);
  enregistreValeur("texte", $_POST["texteAccueil"]);
}

if(!empty($_FILES["imageAccueil"]) && $_FILES["imageAccueil"]["error"] == 0 ) {

    $nom_dossier_destination = "../../templates/images";

    // Je fabrique le chemin de destination de mon nouveau fichier
    $chemin_dossier_destination = __DIR__ .  "/" . $nom_dossier_destination;
    $chemin_fichier_destination = $chemin_dossier_destination . "/" . "accueil.jpg";

    move_uploaded_file($_FILES["imageAccueil"]["tmp_name"], $chemin_fichier_destination);
  }

$_SESSION["notif"][] = "Les modifications apportées à la page d'accueil ont bien été enregistrées.";

header("location: ../administration.php");
exit;

//

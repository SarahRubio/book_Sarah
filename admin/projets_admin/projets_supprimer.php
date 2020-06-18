<?php

include "../../config.php";

verif_connexion();

if(!isset($_GET["projetASupprimer"])) {
    $_SESSION["notif"] = "Merci de choisir le projet à supprimer.";
} else {
    $bdd -> query("DELETE FROM projets WHERE id_projet = " . $_GET["projetASupprimer"]);
    $bdd -> query("DELETE FROM projets_techno WHERE projet_id = " . $_GET["projetASupprimer"]);
    $_SESSION["notif"] = "Le projet a été supprimé.";

}

header("location:" . URL_BASE . "admin/projets_admin/projets_lister.php");

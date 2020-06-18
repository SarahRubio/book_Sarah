<?php

include "../../config.php";

verif_connexion();

if(!isset($_GET["technoASupprimer"])) {
    $_SESSION["notif"][] = "Merci de choisir la technologie à supprimer";
} else {
    $bdd -> query("DELETE FROM technologie WHERE id_techno = " . $_GET["technoASupprimer"]);
    $bdd -> query("DELETE FROM projets_techno WHERE techno_id = " . $_GET["technoASupprimer"]);
    $_SESSION["notif"][] = "La technologie a été supprimée";
}

header("location:" . URL_BASE . "admin/administration.php");

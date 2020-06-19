<?php

include "../../config.php";

verif_connexion();

if(!isset($_GET["userASupprimer"])) {
    $_SESSION["notif"][] = "Merci de choisir l'administrateur à supprimer";
} else {
    $bdd -> query("DELETE FROM administrateur WHERE id_admin = " . $_GET["userASupprimer"]);
    $_SESSION["notif"][] = "L'administrateur a été supprimé";
}

header("location:" . URL_BASE . "admin/administration.php");

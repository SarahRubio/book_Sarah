<?php

include "../../config.php";

verif_connexion();

if(!empty($_POST)) {

    if($_POST["id_techno"] == 0) {

        $query = $bdd -> prepare ("INSERT INTO technologie (tech_nom) VALUES (:nom)");
        $query -> execute([
            ":nom" => $_POST["nom"],
        ]);

        $_SESSION["notif"][] = "Nous avons ajouté une nouvelle technologie";


    } else {

        $query = $bdd -> prepare ("UPDATE technologie SET
                                            tech_nom = :nom
                                            WHERE id_techno = :idTechno");

        $query -> execute([
              ":nom" => $_POST["nom"],
              ":idTechno" => $_POST["id_techno"],
            ]);

        $_SESSION["notif"][] = "Nous avons modifié la technologie";
    }
}

header("location:" . URL_BASE . "admin/administration.php");
exit;

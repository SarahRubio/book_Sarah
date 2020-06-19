<?php

include "../../config.php";

verif_connexion();

if(!empty($_POST)) {

    if($_POST["id_projet"] == 0) {

        $query = $bdd -> prepare ("INSERT INTO projets (nom, pitch, annee, client, lien, online, ordre) VALUES (:nom, :pitch , :annee , :client , :lien , :online, :ordre)");
        $query -> execute([
            ":nom" => $_POST["nom"],
            ":pitch" =>  $_POST["pitch"],
            ":annee" =>  $_POST["annee"],
            ":client" => $_POST["client"],
            ":lien" =>  $_POST["lien"],
            ":online" =>  $_POST["online"],
            ":ordre" =>  $_POST["ordre"],
        ]);

        $projetID = $bdd -> lastInsertId();

        foreach ($_POST["techno"] as $key => $technoID) {
          $query = $bdd -> prepare ("INSERT INTO projet_techno (projet_id, techno_id) VALUES (:projet_id, :techno_id)");
          $query -> execute([
              "projet_id" => $projetID,
              "techno_id" => $technoID,
          ]);
        }


        $_SESSION["notif"][] = "Nous avons ajouté un nouveau projet";


    } else {

        $query = $bdd -> prepare ("UPDATE projets SET
                                            nom = :nom,
                                            pitch = :pitch,
                                            annee = :annee,
                                            client = :client,
                                            lien = :lien,
                                            online = :online,
                                            ordre = :ordre
                                            WHERE id_projet = :idProjet");

        $query -> execute([
              ":nom" => $_POST["nom"],
              ":pitch" =>  $_POST["pitch"],
              ":annee" =>  $_POST["annee"],
              ":client" => $_POST["client"],
              ":lien" =>  $_POST["lien"],
              ":online" =>  $_POST["online"],
              ":ordre" =>  $_POST["ordre"],
              ":idProjet" => $_POST["id_projet"],
            ]);

        $projetID = $_POST["id_projet"];

        $query = $bdd -> query("DELETE FROM projet_techno WHERE projet_id = " . $projetID);

        foreach ($_POST["techno"] as $key => $technoID) {
          $query = $bdd -> prepare ("INSERT INTO projet_techno (projet_id, techno_id) VALUES (:projet_id, :techno_id)");
          $query -> execute([
              "projet_id" => $projetID,
              "techno_id" => $technoID,
          ]);
        }

        $_SESSION["notif"][] = "Nous avons modifié le projet";
    }
}

if(!empty($_FILES["imageprojet"]["name"][0]) && $_FILES["imageprojet"]["error"][0] == 0 ) {

    $nom_dossier_destination = "../../templates/images";

    // Je fabrique le chemin de destination de mon nouveau fichier
    $chemin_dossier_destination = __DIR__ .  "/" . $nom_dossier_destination;
    $chemin_fichier_destination = $chemin_dossier_destination . "/" . $_POST["nom"] . "1.jpg";

    move_uploaded_file($_FILES["imageprojet"]["tmp_name"][0], $chemin_fichier_destination);
}

if(!empty($_FILES["imageprojet"]["name"][1]) && $_FILES["imageprojet"]["error"][1] == 0 ) {

    $nom_dossier_destination = "../../templates/images";

    // Je fabrique le chemin de destination de mon nouveau fichier
    $chemin_dossier_destination = __DIR__ .  "/" . $nom_dossier_destination;
    $chemin_fichier_destination = $chemin_dossier_destination . "/" . $_POST["nom"] . "2.jpg";

    move_uploaded_file($_FILES["imageprojet"]["tmp_name"][1], $chemin_fichier_destination);
}

header("location:" . URL_BASE . "admin/administration.php");
exit;

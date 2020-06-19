<?php

include "../../config.php";

verif_connexion();

if(!empty($_POST)) {

        $query = $bdd -> prepare ("UPDATE contact SET
                                            tel = :tel,
                                            email = :email,
                                            linkedin = :linkedin,
                                            github = :github
                                            ");

        $query -> execute([
              ":tel" => $_POST["tel"],
              ":email" => $_POST["email"],
              ":linkedin" => $_POST["linkedin"],
              ":github" => $_POST["github"]
            ]);

        $_SESSION["notif"][] = "Nous avons modifié la page contact";
    }

header("location:" . URL_BASE . "admin/administration.php");
exit;

<?php

    function returnValeur($iduu) {

        global $bdd;

        // 1 - on verifie si la donnée existe déjà dans la table.
        $query = $bdd -> prepare("SELECT * from accueil where iduu = :iduu");
        $query -> execute([":iduu" => $iduu]);
        $val = $query ->  fetch(PDO::FETCH_ASSOC);

        if(isset($val["valeur"])) {
            return $val["valeur"];
        }

    }


    function enregistreValeur($iduu, $valeur) {

        global $bdd;

        // 1 - on verifie si la donnée existe déjà dans la table.
        $nbVal = $bdd -> prepare("SELECT count(*) as nbEnregistrement from accueil where iduu = :iduu");
        $nbVal -> execute([":iduu" => $iduu]);
        $resultNbVal =  $nbVal -> fetch(PDO::FETCH_ASSOC);

        if($resultNbVal["nbEnregistrement"] == 0) {
            // nous n'avons pas d'enregistrement, nous devons l'insérer dans la base.
            $query = $bdd -> prepare("INSERT into accueil(iduu, valeur) VALUES ( :iduu, :valeur )");
            $query -> execute([":iduu" => $iduu, ":valeur" => $valeur]);

        } else {
            // l'enregistrement existe, nous devons le mettre à jour.
            $query = $bdd -> prepare("UPDATE accueil SET valeur=:valeur WHERE iduu = :iduu");
            $query -> execute([":iduu" => $iduu, ":valeur" => $valeur]);
        }

    }


?>

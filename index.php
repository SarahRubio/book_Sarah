<?php

include "config.php";
include "fonctions.php";

$resultAccueil = $bdd -> query("SELECT * FROM accueil") -> Fetch();

include $_dossier_template  . "accueil.php";

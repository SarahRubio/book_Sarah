<?php

include "config.php";

$projetChoisi = $_GET['projetChoisi'];
$projet = $bdd -> query("SELECT * FROM projets WHERE id_projet = $projetChoisi AND online = 1") -> Fetch();
$projet_techno = $bdd ->query("SELECT * FROM projets, technologie, projet_techno WHERE projets.id_projet = $projetChoisi AND projets.id_projet = projet_techno.projet_id AND projet_techno.techno_id = technologie.id_techno") -> FetchAll();

$projet_suivant = $bdd -> query("SELECT * FROM projets WHERE id_projet = $projetChoisi + 1 AND online = 1") -> Fetch();
$projet_precedent = $bdd -> query("SELECT * FROM projets WHERE id_projet = $projetChoisi - 1 AND online = 1") -> Fetch();

if (!empty($projet)) {
  include $_dossier_template  . "projet_detail.php";
}
else {
  header("Location: index.php");
  exit();
}

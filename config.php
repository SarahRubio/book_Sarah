<?php
session_start();

$mon_nom = "Sarah RUBIO";

$nom_du_portfolio = "Mon petit portfolio";

$_dossier_template = "templates/";

define("URL_BASE", "http://localhost:8888/book_Sarah/");

# Connexion à la base de données Mysql
$serveur = 'localhost';
$utilisateur = 'root';
$motdepasse = 'root';
$nomBaseDeDonnees = "monbook_Sarah";
$bdd = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motdepasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

# Fonction pour vérifier la connexion de l'administrateur avant l'accès à la page administration.php
function verif_connexion() {
  if(empty($_SESSION["droit_connexion"])) {
    header("location:" . URL_BASE . "admin/connexion.php");
  }
}

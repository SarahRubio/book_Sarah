<?php

include "../config.php";

  unset($_SESSION["droit_connexion"]);
  header("location:connexion.php");
  exit;

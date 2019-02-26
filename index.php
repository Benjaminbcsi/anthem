<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	  <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/perso.css" rel="stylesheet">
    <title>Anthem Builder</title>
</head>
  <img src="./image/commando/true/missile_explo.png" alt="">
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark col-lg-6 parallelogram">
    <!-- Brand -->
    <a class="navbar-brand" style="transform:skewX(-20deg);" href="#">Anthem Builder</a>
    <!-- Links -->
      <ul style="transform:skewX(-20deg);" class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Liste Build</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Créer Build</a>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Compte
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Modifier</a>
            <a class="dropdown-item" href="#">Mes Builds</a>
            <a class="dropdown-item" href="#">Déconnexion</a>
          </div>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
    </div>
  </body>
</html>

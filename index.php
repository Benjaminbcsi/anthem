<?php
session_start();
require_once __DIR__ . "./model/_model.php";
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
<body style="background-image:url('./image/background.png')">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark col-lg-6 parallelogram">
  <!-- Brand -->
  <?Php if (isset($_SESSION['id']) && $_SESSION['id'] != "") { ?>
    <a class="navbar-brand" style="transform:skewX(-20deg);"  href="index.php">Bienvenue : <?php echo ucfirst($_SESSION['pseudo']) ?></a>
  <?php } else { ?>
    <a class="navbar-brand" style="transform:skewX(-20deg);" href="index.php">ANTHEM Builder</a>
  <?php } ?>

  <!-- Links -->
    <ul style="transform:skewX(-20deg);" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Liste Build</a>
      </li>
      <?Php if (isset($_SESSION['id']) && $_SESSION['id'] != "") { ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Créer Build</a>
      </li>
      <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Compte
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="profil.php">Modifier Profil</a>
            <a class="dropdown-item" href="#">Mes Builds</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Déconnexion</a>
        </li>
      <?Php } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="subscribe.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Connexion</a>
        </li>
      <?Php } ?>
    </ul>

  </nav>
  <div class="container-fluid" >
    <div class="row" style="padding:2%;">
      <div class="col-lg-12">
      </div>
    </div>
    <img src="./image/arme/2.png" alt="">
    <div class="row" style="text-align:center;">
      <div class="col-lg-3">
        <a href="buildercolosse.php"><h3 style="color:white;">COLOSSE</h3></a>
      </div>
      <div class="col-lg-3">
        <a href="buildercommando.php"><h3 style="color:white;">COMMANDO</h3></a>
      </div>
      <div class="col-lg-3">
        <a href="builderintercepteur.php"><h3 style="color:white;">INTERCEPTEUR</h3></a>
      </div>
      <div class="col-lg-3">
        <a href="buildertempete.php"><h3 style="color:white;">TEMPETE</h3></a>
      </div>
      <div class="col-lg-3">
            <a href="buildercolosse.php"><img src="./image/colosse/colosse.png" class="col-lg-12" alt=""></a>
      </div>
      <div class="col-lg-3">
          <a href="buildercommando.php"><img src="./image/commando/commando.png" class="col-lg-12" alt=""></a>
      </div>
      <div class="col-lg-3">
          <a href="builderintercepteur.php"><img src="./image/intercepteur/intercepteur.png" class="col-lg-12" alt=""></a>
      </div>
      <div class="col-lg-3">
          <a href="buildertempete.php"><img src="./image/tempete/tempete.png" class="col-lg-12" alt=""></a>
      </div>
    </div>
  </div>
</body>
</html>

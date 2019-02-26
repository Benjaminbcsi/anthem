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
  <?php if ($_GET['javelin'] == "colosse") { ?>
    <body style="background-image:url('./image/colosse/colosse.jpg');background-size: cover;">
  <?php } elseif ($_GET['javelin'] == "commando") { ?>
    <body style="background-image:url('./image/commando/commando.jpg');background-size: cover;">
  <?php } elseif ($_GET['javelin'] == "intercepteur") { ?>
    <body style="background-image:url('./image/intercepteur/intercepteur.jpg');background-size: cover;">
  <?php } elseif ($_GET['javelin'] == "tempete") { ?>
    <body style="background-image:url('./image/tempete/tempete.jpg');background-size: cover;">
  <?php } else {
    header("Location: index.php");
  } ?>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark col-lg-6 parallelogram">
  <!-- Brand -->
  <?Php if (isset($_SESSION['id']) && $_SESSION['id'] != "") { ?>
    <a class="navbar-brand" style="transform:skewX(-20deg);"  href="index.php">Bienvenue : <?php echo ucfirst($_SESSION['pseudo']) ?></a>
  <?php } else { ?>
    <a class="navbar-brand" style="transform:skewX(-20deg);" href="index.php">Anthem Builder</a>
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
    <div class="row" style="padding:4%;">
      <div class="col-lg-12">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-3" ></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" >
      <div class="col-lg-5" ></div>
      <div class="col-lg-1" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-3" ></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" style="padding:4%;">
      <div class="col-lg-5" ></div>
      <div class="col-lg-1" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-3" ></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" style="padding:1%;">
      <div class="col-lg-5" ></div>
      <div class="col-lg-1" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-3" ></div>
      <div class="col-lg-2" ></div>
    </div>
  </div>
</body>
</html>
<style>
.circle {
  background: #ff9933;
  opacity: 0.8;
  height: 30px;
  width: 30px;
  border-radius: 100%;
  border:1px solid black;
}
.circleinner {
  margin-left: 4px;
  margin-top: 4px;
  height: 20px;
  width: 20px;
  border-radius: 100%;
  border:1px solid black;
}
.circlecenter {
  background:white;
  margin-left: 4px;
  margin-top: 4px;
  height: 10px;
  width: 10px;
  border-radius: 100%;
  border:1px solid black;
}
</style>

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
  <body style="background-image:url('./image/colosse/colosse.jpg');background-size: cover;">

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
    <div class="row" style="padding:2%;">
      <div class="col-lg-12">
      </div>
    </div>
    <div class="row" style="padding:2%;">
      <div class="col-lg-5" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1 " id="explosionsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="explosion" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-2" ></div>
      <div class="col-lg-1" ></div>
    </div>
    <div class="row" style="padding:3%;" >
      <div class="col-lg-3" ></div>
      <div class="col-lg-2 armes parallelogrambuilder" style="margin-left:-3%" id="composant" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-1" id="composantsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1" id="soutientsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="soutient" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-1" ></div>
    </div>
    <div class="row" style="padding:2%;">
      <div style="margin-left:4%" class="col-lg-2"></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="concentration" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-2" id="concentrationsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" style="padding:1%;">
      <div class="col-lg-3" ></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="armes"><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-1" id="armesee"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-2" ></div>
      <div class="col-lg-2" ></div>
    </div>
  </div>
</body>
</html>
<style>
.armes{
 visibility: hidden;
}
.armesover{
 visibility: visible;
}
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

.parallelogrambuilder {
-webkit-box-sizing: content-box;
-moz-box-sizing: content-box;
box-sizing: content-box;
border: none;
margin-left: -30px;
font: normal 100%/normal Arial, Helvetica, sans-serif;
color: rgba(0,0,0,1);
-o-text-overflow: clip;
text-overflow: clip;
background: grey;
opacity: 0.8;
color:orange;
-webkit-transform:    skewX(20deg);
transform:    skewX(20deg);
}
</style>
<script>

$("#armesee").mouseover(function(){
  $('#armes').removeClass('armes')
  $('#armes').addClass('armesover')
});
$("#armesee").mouseout(function(){
  $('#armes').removeClass('armesover')
  $('#armes').addClass('armes')
});


$("#soutientsee").mouseover(function(){
  $('#soutient').removeClass('armes')
  $('#soutient').addClass('armesover')
});
$("#soutientsee").mouseout(function(){
  $('#soutient').removeClass('armesover')
  $('#soutient').addClass('armes')
});

$("#concentrationsee").mouseover(function(){
  $('#concentration').removeClass('armes')
  $('#concentration').addClass('armesover')
});
$("#concentrationsee").mouseout(function(){
  $('#concentration').removeClass('armesover')
  $('#concentration').addClass('armes')
});

$("#composantsee").mouseover(function(){
  $('#composant').removeClass('armes')
  $('#composant').addClass('armesover')
});
$("#composantsee").mouseout(function(){
  $('#composant').removeClass('armesover')
  $('#composant').addClass('armes')
});

$("#explosionsee").mouseover(function(){
  $('#explosion').removeClass('armes')
  $('#explosion').addClass('armesover')
});
$("#explosionsee").mouseout(function(){
  $('#explosion').removeClass('armesover')
  $('#explosion').addClass('armes')
});
</script>

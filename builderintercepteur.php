<?php
session_start();
require_once __DIR__ . "./model/_model.php";
$result=new ArmesManager($connexion);
$resultats=$result->db_getWeapon(0);
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
    <script src="js/builder_hero.js"></script>
    <link href="css/perso.css" rel="stylesheet">
    <link href="css/builder_hero.css" rel="stylesheet">
    <title>Anthem Builder</title>
</head>
  <body style="background-image:url('./image/4/intercepteur.jpg');background-size: cover;">

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
    <div class="row" style="padding:3%;">
      <div class="col-lg-12">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-5" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1 " id="explosionsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="explosion" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-2" ></div>
      <div class="col-lg-1" ></div>
    </div>
    <div class="row" >
      <div class="col-lg-12" ></div>
    </div>
    <div class="row" style="padding:3%;">
      <div class="col-lg-3" ></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="concentration" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-1" id="concentrationsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1" id="composantsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-3 armes parallelogrambuilder" id="composant" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" style="padding:1%;">
      <div class="col-lg-3" ></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="armes"><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-1" id="armesee"><button id="modalActivate" type="button btn-outline-light" class="btn" data-toggle="modal" data-target="#exampleModal"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></button></div>
      <div class="col-lg-1" id="soutientsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="soutient" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-2" ></div>
    </div>
  </div>
</body>
</html>
<!-- Modal -->
<div class="modal fade left parallelogrammodal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalPreviewLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-full-height modal-left" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="margin-left:150px!important;opacity: 1;transform:skewX(-20deg);" id="exampleModalPreviewLabel">Choix des armes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-left:100px;transform:skewX(-20deg);">
        <div class="row" style="transform:skewX(20deg);margin-left:25px;">
          <?php while ($row_armes=$resultats->fetch_array(MYSQLI_ASSOC)) {
              $armes = new Armes($row_armes); ?>
          <div class="col-lg-4 boxcontainer"><div class="box" id='test_see' onmouseover="this.style.border = '1px solid orange'" onmouseout="this.style.border = '1px solid black'"><div style="transform:skewX(-20deg);width:100%;height:100%;background-image:url('./image/arme/<?php echo $armes->getId() ?>.png');background-size: contain;background-repeat: no-repeat;"></div></div></div>
        <?php } ?>
        </div>
      </div>
      <div class="modal-body" style="margin-left:100px;transform:skewX(-20deg);">
        <div class="row">
          <div class="col-lg-4" >a</div>
          <div class="col-lg-4" >b</div>
          <div class="col-lg-4" >c</div>
          <div class="col-lg-4" >a</div>
          <div class="col-lg-4" >b</div>
          <div class="col-lg-4" >c</div>
          <div class="col-lg-4" >a</div>
          <div class="col-lg-4" >b</div>
          <div class="col-lg-4" >c</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" style="transform:skewX(-20deg);" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="button" style="transform:skewX(-20deg);" class="btn btn-primary">Sauvegarder</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

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

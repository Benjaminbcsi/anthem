<?php
session_start();
require_once __DIR__ . "./model/_model.php";

$result=new ArmesManager($connexion);
$resultAssaut=new AssautManager($connexion);
$resultSoutient=new SoutientManager($connexion);
$resultComposant=new ComposantManager($connexion);
$resultats=$result->db_getWeapon(2);
$resultatsAssaut=$resultAssaut->db_getAssaut(2,2);
$resultatsConcentration=$resultAssaut->db_getAssaut(2,1);
$resultatsSoutient=$resultSoutient->db_getSoutient(2);
$resultatsComposant=$resultComposant->db_getComposant(2);


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
    <script src="js/toaster.js"></script>
    <link href="css/perso.css" rel="stylesheet">
    <link href="css/builder_hero.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Anthem Builder</title>
</head>
  <body style="background-image:url('./image/2/colossetest.jpg');background-size: cover;max-width:100%;max-height:100%">

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
        <li class="nav-item">
          <a class="nav-link" onclick="savebuild()">Sauvegarder build</a>
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
      <div class="col-lg-12"></input>
      </div>
    </div>
    </div>
    <div class="row" style="padding:2%;">
      <div class="col-lg-5" ></div>
      <div class="col-lg-2" ></div>
      <div class="col-lg-1" style="margin-left:-100px;" id="explosionsee" ><button id="modalActivateAssaut2" type="button btn-outline-light" class="btn" data-toggle="modal" data-target="#modalassaut2"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></button></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="explosion" >
        <p style="transform:skewX(-20deg);" id="assaut2see">Lanceur d'artillerie: <p>
        </div>
      <div class="col-lg-3" ></div>
    </div>
    <div class="row" >
      <div class="col-lg-5" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-2" style="margin-left:50px;" id="composantsee" ><button id="modalActivateComposant" type="button btn-outline-light" class="btn" data-toggle="modal" data-target="#modalcomposant"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></button></div>
      <div class="col-lg-2 armes parallelogrambuilder" style="margin-left:-3%;height:370px;" id="composant" >
        <p id="composant1_data" style="transform:skewX(-20deg);">Composant1:<br/><br/><p>
        <p id="composant2_data" style="transform:skewX(-20deg);">Composant2:<br/><br/><p>
        <p id="composant3_data" style="transform:skewX(-20deg);">Composant3:<br/><br/><p>
        <p id="composant4_data" style="transform:skewX(-20deg);">Composant4:<br/><br/><p>
        <p id="composant5_data" style="transform:skewX(-20deg);">Composant5:<br/><br/><p>
        <p id="composant6_data" style="transform:skewX(-20deg);">Composant6:<br/><br/><p>
      </div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" ></div>
    </div>
    <div class="row" style="margin-top:-300px;" >
      <div class="col-lg-2"></div>
      <div class="col-lg-2 armes parallelogrambuilder" style="height:50px;" id="assaut1" ><p style="transform:skewX(-20deg);">Lanceur d'assaut lourd:<p></div>
      <div class="col-lg-1" id="assautsee" ><button id="modalActivateAssaut1" type="button btn-outline-light" class="btn" data-toggle="modal" data-target="#modalassaut1"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></button></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" id="soutientsee" ><button id="modalActivateSoutient" type="button btn-outline-light" class="btn" data-toggle="modal" data-target="#modalsoutient"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></button></div>
      <div class="col-lg-2 armes parallelogrambuilder" style="height:50px;" id="soutient" ><p style="transform:skewX(-20deg);">Équipement de soutien:<p></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" style="padding:1%;">
      <div class="col-lg-2" ></div>
      <div class="col-lg-2 armes parallelogrambuilder" style="height:100px;" id="armes"><p style="transform:skewX(-20deg);" id="tableWeaponOver1">Arme1:<p><p style="transform:skewX(-20deg);" id="tableWeaponOver2" >Arme2:</p></div>
      <div class="col-lg-1" id="armesee"><button id="modalActivate" type="button btn-outline-light" class="btn" data-toggle="modal" data-target="#modalarme"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></button></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-2" ></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" style="padding:2%;">
      <div class="col-lg-12"></input>
      </div>
    </div>
    <div class="row" style="padding:2%;">
      <div class="col-lg-12"></input>
      </div>
    </div>
    <div class="row" style="padding:2%;">
      <div class="col-lg-4"></input>
      </div>
      <div class="col-lg-4">
        <input type="text" class="form-control" id="nameBuild" name="nameBuild" placeholder="Nom du build"></input>
      </div>
      <div class="col-lg-4"></input>
      </div>
    </div>
  </div>
</body>
</html>



<!-- Modal armes -->
<div class="modal fade left parallelogrammodal" id="modalarme" tabindex="-1" role="dialog" aria-labelledby="ArmesModalSee" aria-hidden="true">
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
          <div class="col-lg-4 boxcontainer"  onmouseover="seestatsarme(<?php echo $armes->getId() ?>)" onclick="saveweapon('armes<?php echo $armes->getId() ?>',<?php echo $armes->getId() ?>,'<?php echo $armes->getNom() ?>')">
            <div id='armes<?php echo $armes->getId() ?>'  class="box" onmouseover="this.style.border = '1px solid orange'" onmouseout="this.style.border = '1px solid black'">
              <div style="transform:skewX(-20deg);width:100%;height:100%;background-image:url('./image/arme/<?php echo $armes->getId() ?>.png');background-size: contain;background-repeat: no-repeat;"></div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>

    </div>
    <div class="modal-contentweapon" style="height:35%;">
        <div class="container-fluid" >
        <div class="row" >
          <div class="col-lg-12" style="background-color:#DE4E30;width:100%;color:white;height:50px;">
            <p id="nameWeapon" class="col-lg-6" style="font-size:25px;display:inline-block;transform:skewX(-20deg)!important;"></p>
            <p class="col-lg-4 float-right" id="pouvoirWeapon" style="display:inline-block;text-align: right;transform:skewX(-20deg)!important;"></p>
            <p id="styleWeapon" class="col-lg-12" style="transform:skewX(-20deg);margin-left: 2%;font-size:15px;margin-top:-20px;"></p>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <!-- Degat -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;">Dégats:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="degatWeapon"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-success" role="progressbar" id="progressWeaponDamage" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- CPM -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-1%;">CPM:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="cpmWeapon"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-danger"  role="progressbar" id="progressCpmDamage" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Munitions -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-2%;">Munitions:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="munitionsWeapon"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-info"  role="progressbar" id="progressMunitionsDamage" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Porte ou explo -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" id="exploPorte" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-3%;">Porté / Explosion</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="exploPorteWeapon"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-warning"  role="progressbar" id="progressExploPorteDamage" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <div class="col-lg-12" id="descriptionWeapon" style="transform:skewX(-20deg)!important;text-align:center;" ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal choix armes -->
<div class="modal fade" id="armeschoixmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Armes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Emplacement</th>
              <th scope="col">Arme : </th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td id="armename1"></td>
              <td><button type="button" onclick="deleteweapon(1)" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td id="armename2"></td>
              <td><button type="button" onclick="deleteweapon(2)" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="deletetableweapon()" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="closeallweapon()" class="btn btn-primary">Sauvegarder armes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Assaut -->
<div class="modal fade left parallelogrammodal" id="modalassaut1" tabindex="-1" role="dialog" aria-labelledby="AssautModalSee" aria-hidden="true">
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
          <?php while ($row_assaut=$resultatsAssaut->fetch_array(MYSQLI_ASSOC)) {
              $assaut = new Assaut($row_assaut); ?>
          <div class="col-lg-4 boxcontainer"  onmouseover="seestatsassaut1(<?php echo $assaut->getId() ?>)" onclick="saveassaut1('assaut<?php echo $assaut->getId() ?>',<?php echo $assaut->getId() ?>,'<?php echo $assaut->getNom() ?>')">
            <div   class="boxAssaut" >
              <div style="transform:skewX(-20deg);width:100%;height:100%;">
                <img id='assaut<?php echo $assaut->getId() ?>' style="border:1px solid black;" src="./image/2/assaut/<?php echo $assaut->getId_type() ?>/<?php echo $assaut->getId() ?>.jpg" alt="" width="130px" height="70px">
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
    <div class="modal-contentweapon" style="height:35%;">
        <div class="container-fluid" >
        <div class="row" >
          <div class="col-lg-12" style="background-color:#DE4E30;width:100%;color:white;height:50px;">
            <p id="nameAssaut1" class="col-lg-6" style="font-size:25px;display:inline-block;transform:skewX(-20deg)!important;"></p>
            <p class="col-lg-4 float-right" id="pouvoirAssaut1" style="display:inline-block;text-align: right;transform:skewX(-20deg)!important;"></p>
            <p id="styleAssaut1" class="col-lg-12" style="transform:skewX(-20deg);margin-left: 2%;font-size:15px;margin-top:-20px;"></p>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <!-- Degat -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;">Dégats:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="degatAssaut1"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-success" role="progressbar" id="progressAssaut1Damage" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- CPM -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-1%;">Recharges:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="rechargeAssaut1"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-danger"  role="progressbar" id="progressAssaut1Recharge" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Munitions -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-2%;">Rayon:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="rayonAssaut1"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-info"  role="progressbar" id="progressAssaut1Rayon" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Porte ou explo -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" id="statutTypeAssaut1" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-3%;">Statut</div>
            <div class="col-lg-2" id="statutAssaut1" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" ></div>
            <div id="barStatutProgressHide" class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-warning"  role="progressbar" id="progressAssaut1Statut" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <div class="col-lg-12" id="descriptionAssaut1" style="transform:skewX(-20deg)!important;text-align:center;" ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="assaut1choixmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Equipement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Equipement</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td id="assaut1name1"></td>
              <td><button type="button" onclick="deleteassaut1()" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="closeallassaut1()" class="btn btn-primary">Sauvegarder Equipement</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Assaut 2 -->
<div class="modal fade left parallelogrammodal" id="modalassaut2" tabindex="-1" role="dialog" aria-labelledby="Assaut2ModalSee" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-full-height modal-left" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="margin-left:150px!important;opacity: 1;transform:skewX(-20deg);" id="exampleModalPreviewLabel">Choix Assaut</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-left:100px;transform:skewX(-20deg);">
        <div class="row" style="transform:skewX(20deg);margin-left:25px;">
          <?php while ($row_concentration=$resultatsConcentration->fetch_array(MYSQLI_ASSOC)) {
              $assaut2 = new Assaut($row_concentration); ?>
          <div class="col-lg-4 boxcontainer"  onmouseover="seestatsassaut2(<?php echo $assaut2->getId() ?>)" onclick="saveassaut2('assaut2<?php echo $assaut2->getId() ?>',<?php echo $assaut2->getId() ?>,'<?php echo $assaut2->getNom() ?>')">
            <div class="boxAssaut" >
              <div style="transform:skewX(-20deg);width:100%;height:100%;">
                <img id='assaut2<?php echo $assaut2->getId() ?>'  style="border:1px solid black;" src="./image/2/assaut/<?php echo $assaut2->getId_type() ?>/<?php echo $assaut2->getId() ?>.jpg" alt="" width="130px" height="70px">
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
    <div class="modal-contentweapon" style="height:35%;">
        <div class="container-fluid" >
        <div class="row" >
          <div class="col-lg-12" style="background-color:#DE4E30;width:100%;color:white;height:50px;">
            <p id="nameAssaut2" class="col-lg-6" style="font-size:25px;display:inline-block;transform:skewX(-20deg)!important;"></p>
            <p class="col-lg-4 float-right" id="pouvoirAssaut2" style="display:inline-block;text-align: right;transform:skewX(-20deg)!important;"></p>
            <p id="styleAssaut2" class="col-lg-12" style="transform:skewX(-20deg);margin-left: 2%;font-size:15px;margin-top:-20px;"></p>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <!-- Degat -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;">Dégats:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="degatAssaut2"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-success" role="progressbar" id="progressAssaut2Damage" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- CPM -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-1%;">Recharges:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="rechargeAssaut2"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-danger"  role="progressbar" id="progressAssaut2Recharge" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Munitions -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-2%;">Rayon:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="rayonAssaut2"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-info"  role="progressbar" id="progressAssaut2Rayon" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Porte ou explo -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" id="statutTypeAssaut2" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-3%;">Statut</div>
            <div class="col-lg-2" id="statutAssaut2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" ></div>
            <div id="barStatutProgressHide" class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-warning"  role="progressbar" id="progressAssaut2Statut" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <div class="col-lg-12" id="descriptionAssaut2" style="transform:skewX(-20deg)!important;text-align:center;" ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="assaut2choixmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Equipement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Equipement</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td id="assaut2name1"></td>
              <td><button type="button" onclick="deleteassaut2()" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="closeallassaut2()" class="btn btn-primary">Sauvegarder Equipement</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Soutient -->

<div class="modal fade left parallelogrammodal" id="modalsoutient" tabindex="-1" role="dialog" aria-labelledby="SoutientModalSee" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-full-height modal-left" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="margin-left:150px!important;opacity: 1;transform:skewX(-20deg);" id="exampleModalSoutient">Choix Soutient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-left:100px;transform:skewX(-20deg);">
        <div class="row" style="transform:skewX(20deg);margin-left:25px;">
          <?php while ($row_soutient=$resultatsSoutient->fetch_array(MYSQLI_ASSOC)) {
              $soutient = new Soutient($row_soutient); ?>
          <div class="col-lg-4 boxcontainer"  onmouseover="seestatssoutient(<?php echo $soutient->getId() ?>)" onclick="savesoutient('soutient<?php echo $soutient->getId() ?>',<?php echo $soutient->getId() ?>,'<?php echo $soutient->getNom() ?>')">
            <div   class="boxAssaut" >
              <div style="transform:skewX(-20deg)!important;width:100%;height:100%;">
                <img id='soutient<?php echo $soutient->getId() ?>' style="border:1px solid black;" src="./image/2/soutient/<?php echo $soutient->getId() ?>.png" alt="" width="130px" height="90px">
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
      </div>
      <div class="modal-contentsoutient" style="height:35%;">
        <div class="container-fluid" >
        <div class="row" >
          <div class="col-lg-12" style="background-color:#DE4E30;width:100%;color:white;height:50px;">
            <p id="nameSoutient" class="col-lg-6" style="font-size:25px;display:inline-block;transform:skewX(-20deg)!important;"></p>
            <p class="col-lg-4 float-right" id="pouvoirSoutient" style="display:inline-block;text-align: right;transform:skewX(-20deg)!important;"></p>
            <p id="styleSoutient" class="col-lg-12" style="transform:skewX(-20deg);margin-left: 2%;font-size:15px;margin-top:-20px;"></p>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <!-- Recharge -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-1%;">Recharges:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="rechargeSoutient"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-danger"  role="progressbar" id="progressSoutientRecharge" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Durée -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-2%;">Rayon:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="dureeSoutient"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-info"  role="progressbar" id="progressSoutientDuree" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <div class="col-lg-12" id="descriptionSoutient" style="transform:skewX(-20deg)!important;text-align:center;" ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="soutientchoixmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Equipement soutient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Equipement</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td id="soutientname"></td>
              <td><button type="button" onclick="deletesoutient()" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="closeallsoutient()" class="btn btn-primary">Sauvegarder Equipement de soutient</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal composant -->
<div class="modal fade left parallelogrammodal" id="modalcomposant" tabindex="-1" role="dialog" aria-labelledby="ArmesModalSee" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-full-height modal-left" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="margin-left:150px!important;opacity: 1;transform:skewX(-20deg);" id="exampleModalPreviewLabel">Choix des Composant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-left:100px;transform:skewX(-20deg);">
        <div class="row" style="transform:skewX(20deg);margin-left:25px;">
          <?php while ($row_composant=$resultatsComposant->fetch_array(MYSQLI_ASSOC)) {
              $composant = new Composant($row_composant); ?>
          <div class="col-lg-4 boxcontainer"  onmouseover="seestatscomposant(<?php echo $composant->getId() ?>)" onclick="savecomposant('composants<?php echo $composant->getId() ?>',<?php echo $composant->getId() ?>,'<?php echo $composant->getNom() ?>')">
            <div   class="boxAssaut" >
              <div style="transform:skewX(-20deg);width:100%;height:100%;">
                <img onmouseover="this.style.border = '2px solid orange'" id="composants<?php echo $composant->getId() ?>" style="border:1px solid black;" src="./image/2/composant/<?php echo $composant->getId() ?>.jpg" alt="" width="150px" height="90px">
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>

    </div>
    <div class="modal-contentweapon" style="height:35%;">
        <div class="container-fluid" >
        <div class="row" >
          <div class="col-lg-12" style="background-color:#DE4E30;width:100%;color:white;height:50px;">
            <p id="nameComposant" class="col-lg-6" style="font-size:25px;display:inline-block;transform:skewX(-20deg)!important;"></p>
            <p class="col-lg-4 float-right" id="pouvoirComposant" style="display:inline-block;text-align: right;transform:skewX(-20deg)!important;"></p>
            <p id="styleComposant" class="col-lg-12" style="transform:skewX(-20deg);margin-left: 2%;font-size:15px;margin-top:-20px;"></p>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <!-- Degat -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;">Dégats:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="armureComposant"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-success" role="progressbar" id="progressComposantArmure" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- CPM -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-1%;">CPM:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="bouclierComposant"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-danger"  role="progressbar" id="progressComposantBouclier" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;">
            <div class="col-lg-12" id="descriptionComposant" style="transform:skewX(-20deg)!important;text-align:center;" ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal choix composant -->
<div class="modal fade" id="composantchoixmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Armes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Emplacement</th>
              <th scope="col">Arme : </th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td id="composant1"></td>
              <td><button type="button" onclick="deletecomposant(1)" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td id="composant2"></td>
              <td><button type="button" onclick="deletecomposant(2)" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td id="composant3"></td>
              <td><button type="button" onclick="deletecomposant(3)" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td id="composant4"></td>
              <td><button type="button" onclick="deletecomposant(4)" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td id="composant5"></td>
              <td><button type="button" onclick="deletecomposant(5)" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
            <tr>
              <th scope="row">6</th>
              <td id="composant6"></td>
              <td><button type="button" onclick="deletecomposant(6)" class="close">
                <span aria-hidden="true">&times;</span>
              </button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" onclick="closeallcomposant()" class="btn btn-primary">Sauvegarder Composant</button>
      </div>
    </div>
  </div>
</div>

<script>
var array_weapon= ['vide','vide'];
function saveweapon(id_element,id,name){
  $('#'+id_element).attr('style','border:3px solid orange')
  $('#'+id_element).attr('onmouseout','')
  if (array_weapon[0] == "vide") {
    array_weapon[0] = id;
    $('#armename1').html(name)
    $('#tableWeaponOver1').html('Arme 1 : <p style="color:white;">'+name+'</p>' )
    $.toaster({ priority : 'success', title : 'Armes 1', message : name+" ajouter a l'emplacement 1"});
  } else if(array_weapon[1] == "vide") {
    array_weapon[1] = id;
    $('#armename2').html(name)
    $('#tableWeaponOver2').html('<p style="margin-top:-5%;">Arme 2 :</p><p style="color:white;margin-top:-5%;">'+name+'</p>' )
    $.toaster({ priority : 'success', title : 'Armes 2', message : name+" ajouter a l'emplacement 2"});
  }
  if (array_weapon[0] != "vide" && array_weapon[1] != "vide") {
    $('#armeschoixmodal').modal('show')
  }


}

function deleteweapon(emplacement){
  if (emplacement == 1) {
    array_weapon[0] ="vide"
    $('#armename1').html("")
    $('#tableWeaponOver1').html('')
  } else {
    array_weapon[1] ="vide"
    $('#armename2').html("")
    $('#tableWeaponOver2').html('')
  }
  if (array_weapon[0] == "vide" && array_weapon[1] == "vide") {
      $('#armeschoixmodal').modal('hide')
  }
}

function closeallweapon(){
  $('#armeschoixmodal').modal('hide')
  $('#modalarme').modal('hide')
  $.toaster({ priority : 'info', title : 'Armes 2', message : "Les armes on était sauvegarder"});
}

function savebuild(){
  if (array_weapon[0] == "vide" || array_weapon[1] == "vide") {
      $.toaster({ priority : 'error', title : 'Armes 2', message : "Une arme est manquante."});
      return false;
  }
  if (assaut1 == "vide") {
      $.toaster({ priority : 'error', title : 'Assaut', message : "l'Equipement est manquant."});
      return false;
  }
  if (assaut2 == "vide") {
      $.toaster({ priority : 'error', title : 'Assaut', message : "l'Equipement 2 est manquant."});
      return false;
  }
  if (soutient == "vide") {
      $.toaster({ priority : 'error', title : 'Assaut', message : "l'Equipement de soutien est manquant."});
      return false;
  }
  if (composant[0] == "vide" || composant[1] == "vide" || composant[2] == "vide" || composant[3] == "vide" || composant[4] == "vide" || composant[5] == "vide") {
    $.toaster({ priority : 'error', title : 'Armes 2', message : "Un composant est manquant."});
    return false;
  }
  var nameBuild = $('#nameBuild').val();
  if(nameBuild == "" || nameBuild==null){
    $.toaster({ priority : 'error', title : 'Nom build', message : "Nom du build manquant."});
    return false;
  }
  $.ajax({
    type: "POST",
    url: './ajax.php',
    dataType: 'json',
    data:{
      source: "colosse_build",
      id_javelin:2,
      nameBuild: nameBuild,
      weapons: array_weapon,
      assaut1: assaut1,
      soutient: soutient,
      assaut2: assaut2,
      composant: composant,
      },
      success: function (response) {
        $.toaster({ priority : 'info', title : 'Builder', message : "build Enregistrer"});
      },
      error: function(jqXHR, textStatus, errorThrown) {
        $.toaster({ priority : 'error', title : 'Erreur', message : "Impossible d'enregistrer les build."});
      }
  });
}


function seestatsarme(id_arme){
  $.ajax({
    type: "POST",
    url: './ajax.php',
    dataType: 'json',
    data:{
      source: "see_arme",
      id_arme:id_arme,
      },
      success: function (response) {
        $.each(response, function(index, value) {
          $('#nameWeapon').html(response['nom'])
          $('#styleWeapon').html(response['id_type'])
          $('#pouvoirWeapon').html('Pouvoir : <h4>47</h4>')
          $('#degatWeapon').html(response['degat'])
          $('#cpmWeapon').html(response['cpm'])
          $('#munitionsWeapon').html(response['munitions'])
          updateProgressDamage((response['degat']/400)*100);
          updateProgressCpm((response['cpm']/400)*100);
          updateProgressMunitions((response['munitions']/400)*100);
          if (response['degat_explosion'] != null) {
            $('#exploPorte').html("Dégats explosion")
            updateProgressExploOrPorte((response['degat_explosion']/400)*100);
            $('#exploPorteWeapon').html(response['degat_explosion'])
          } else {
            $('#exploPorte').html("Porté")
            updateProgressExploOrPorte((response['porte']/400)*100);
            $('#exploPorteWeapon').html(response['porte'])
          }
          $('#descriptionWeapon').html(response['description']+"<br/><p style='color:orange;'>"+response['effet']+"</p>")

        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
      }
  });
}


function seestatsassaut1(id_arme){
  $.ajax({
    type: "POST",
    url: './ajax.php',
    dataType: 'json',
    data:{
      source: "see_assaut",
      id_arme:id_arme,
      },
      success: function (response) {
        $.each(response, function(index, value) {
          if (response['id_combo'] == "Amorceur") {
            $('#nameAssaut1').html('<i class="far fa-dot-circle"></i>&nbsp;'+response['nom'])
          } else if(response['id_combo'] == "Detonateur"){
            $('#nameAssaut1').html('<i class="far fa-star"></i>&nbsp;'+response['nom'])
          } else {
            $('#nameAssaut1').html(response['nom'])
          }
          $('#styleAssaut1').html(response['id_type'])
          $('#pouvoirAssaut1').html('Pouvoir : <h4>47</h4>')
          if (response['id_statut'] == "" || response['id_statut'] == null) {
            $('#degatAssaut1').html(response['degat'])
          } else if (response['id_statut '] == "Feu") {
            $('#degatAssaut1').html('<i style="color:orange;" class="fas fa-fire"></i>&nbsp;'+response['degat'])
          } else {
            $('#degatAssaut1').html('<img width="25px;" src="./image/'+response['id_statut']+'.png" alt="">&nbsp;'+response['degat'])
          }
          $('#rechargeAssaut1').html(response['recharge'])
          $('#rayonAssaut1').html(response['rayon'])
          updateProgressDamageAssaut1((response['degat']/50)*100);
          updateProgressRechargeAssaut1((response['recharge']/50)*100);
          updateProgressRayonAssaut1((response['rayon']/50)*100);
          if (response['degat_statut'] != null && response['degat_statut'] != 0) {
            updateProgressStatutAssaut1((response['degat_statut']/50)*100);
            if (response['id_statut'] == "Foudre") {
              $('#statutTypeAssaut1').html("Statut électricité")
            } else if (response['id_statut'] == "Gel") {
              $('#statutTypeAssaut1').html("Statut Gelée")
            } else if (response['id_statut'] == "Acide") {
              $('#statutTypeAssaut1').html("Statut Acide")
            } else if (response['id_statut'] == "Feu") {
              $('#statutTypeAssaut1').html("Statut Emflammer")
            }
            $('#statutAssaut1').html(response['degat_statut'])
          } else {
            $('#statutTypeAssaut1').html("Statut")
            updateProgressStatutAssaut1((0/400)*100)
            $('#statutAssaut1').html(0)
          }
          $('#descriptionAssaut1').html(response['description']+"<br/><p style='color:orange;'>"+response['effet']+"</p>")

        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
      }
  });
}
// update bar armes
function updateProgressDamage(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressWeaponDamage').css('width', percentage+'%');
}

function updateProgressCpm(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressCpmDamage').css('width', percentage+'%');
}

function updateProgressMunitions(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressMunitionsDamage').css('width', percentage+'%');
}

function updateProgressExploOrPorte(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressExploPorteDamage').css('width', percentage+'%');
}

// update bar assaut1
function updateProgressDamageAssaut1(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressAssaut1Damage').css('width', percentage+'%');
}

function updateProgressRechargeAssaut1(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressAssaut1Recharge').css('width', percentage+'%');
}

function updateProgressRayonAssaut1(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressAssaut1Rayon').css('width', percentage+'%');
}

function updateProgressStatutAssaut1(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressAssaut1Statut').css('width', percentage+'%');
}

var assaut1 = "vide";
function saveassaut1(id_element,id,name){
  if (assaut1 == "vide") {
    $('#'+id_element).attr('style','border:3px solid orange')
    assaut1 = id;
    $('#assaut1name1').html(name)
    $('#assaut1').html("<p style='transform:skewX(-20deg);'>Lanceur d'assaut lourd : </p><p style='color:white;transform:skewX(-20deg);margin-top:-5%;'>"+name+"</p>" )
    $.toaster({ priority : 'success', title : 'Assaut', message : name+" ajouter"});
  }
  if (assaut1 != "vide") {
    $('#assaut1choixmodal').modal('show')
  }


}

function deleteassaut1(){
  assaut1 ="vide"
  $('#assaut1name1').html("")
  $('#assaut1').html('')
  if (assaut == "vide") {
      $('#armeschoixmodal').modal('hide')
  }
}

function deletetableassaut1(){
  var assaut1= "vide";
}

function closeallassaut1(){
  $('#assaut1choixmodal').modal('hide')
  $('#modalassaut1').modal('hide')

  $.toaster({ priority : 'info', title : 'Assaut', message : "L'équipement a était sauvegarder"});
}

function seestatsassaut2(id_arme){
  $.ajax({
    type: "POST",
    url: './ajax.php',
    dataType: 'json',
    data:{
      source: "see_assaut",
      id_arme:id_arme,
      },
      success: function (response) {
        $.each(response, function(index, value) {
          if (response['id_combo'] == "Amorceur") {
            $('#nameAssaut2').html('<i class="far fa-dot-circle"></i>&nbsp;'+response['nom'])
          } else if(response['id_combo'] == "Detonateur"){
            $('#nameAssaut2').html('<i class="far fa-star"></i>&nbsp;'+response['nom'])
          } else {
            $('#nameAssaut2').html(response['nom'])
          }
          $('#styleAssaut2').html(response['id_type'])
          $('#pouvoirAssaut2').html('Pouvoir : <h4>47</h4>')
          if (response['id_statut'] == "" || response['id_statut'] == null) {
            $('#degatAssaut2').html(response['degat'])
          } else if (response['id_statut '] == "Feu") {
            $('#degatAssaut2').html('<i style="color:orange;" class="fas fa-fire"></i>&nbsp;'+response['degat'])
          } else {
            $('#degatAssaut2').html('<img width="25px;" src="./image/'+response['id_statut']+'.png" alt="">&nbsp;'+response['degat'])
          }
          $('#rechargeAssaut2').html(response['recharge'])
          $('#rayonAssaut2').html(response['rayon'])
          updateProgressDamageAssaut2((response['degat']/50)*100);
          updateProgressRechargeAssaut2((response['recharge']/50)*100);
          updateProgressRayonAssaut2((response['rayon']/50)*100);
          if (response['degat_statut'] != null && response['degat_statut'] != 0) {
            updateProgressStatutAssaut2((response['degat_statut']/50)*100);
            if (response['id_statut'] == "Foudre") {
              $('#statutTypeAssaut2').html("Statut électricité")
            } else if (response['id_statut'] == "Gel") {
              $('#statutTypeAssaut2').html("Statut Gelée")
            } else if (response['id_statut'] == "Acide") {
              $('#statutTypeAssaut2').html("Statut Acide")
            } else if (response['id_statut'] == "Feu") {
              $('#statutTypeAssaut2').html("Statut Emflammer")
            }
            $('#statutAssaut2').html(response['degat_statut'])
          } else {
            $('#statutTypeAssaut2').html("Statut")
            updateProgressStatutAssaut2((0/400)*100)
            $('#statutAssaut2').html(0)
          }
          $('#descriptionAssaut2').html(response['description']+"<br/><p style='color:orange;'>"+response['effet']+"</p>")

        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
      }
  });
}
// update bar assaut2
function updateProgressDamageAssaut2(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressAssaut2Damage').css('width', percentage+'%');
}

function updateProgressRechargeAssaut2(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressAssaut2Recharge').css('width', percentage+'%');
}

function updateProgressRayonAssaut2(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressAssaut2Rayon').css('width', percentage+'%');
}

function updateProgressStatutAssaut2(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressAssaut2Statut').css('width', percentage+'%');
}

var assaut2 = "vide";
function saveassaut2(id_element,id,name){
  if (assaut2 == "vide") {
    $('#'+id_element).attr('style','border:3px solid orange')
    assaut2 = id;
    $('#assaut2name1').html(name)
    $('#assaut2see').html("<p >Lanceur d'artillerie : </p><p style='color:white;margin-top:-5%;'>"+name+"</p>" )
    $.toaster({ priority : 'success', title : 'Assaut', message : name+" ajouter"});
  }
  if (assaut2 != "vide") {
    $('#assaut2choixmodal').modal('show')
  }


}

function deleteassaut2(){
  assaut2 ="vide"
  $('#assaut2name1').html("")
  $('#assaut2').html('')
  if (assaut2 == "vide") {
      $('#assaut2choixmodal').modal('hide')
  }
}

function deletetableassaut2(){
  var assaut2= "vide";
}

function closeallassaut2(){
  $('#assaut2choixmodal').modal('hide')
  $('#modalassaut2').modal('hide')
  $.toaster({ priority : 'info', title : 'Assaut', message : "L'équipement a était sauvegarder"});
}
 // SoutientManager

 function seestatssoutient(id_soutient){
   $.ajax({
     type: "POST",
     url: './ajax.php',
     dataType: 'json',
     data:{
       source: "see_soutient",
       id_soutient:id_soutient,
       },
       success: function (response) {
         $.each(response, function(index, value) {
           $('#nameSoutient').html(response['nom'])
           $('#styleSoutient').html('Équipement de soutien lourd')
           $('#pouvoirSoutient').html('Pouvoir : <h4>47</h4>')
           $('#rechargeSoutient').html(response['recharge'])
           $('#dureeSoutient').html(response['duree'])
           $('#descriptionSoutient').html(response['description'])
           updateProgressRechargeSoutient(response['recharge']);
           updateProgressDureeSoutient(response['duree']);
         });
       },
       error: function(jqXHR, textStatus, errorThrown) {
       }
   });
 }

 function updateProgressRechargeSoutient(percentage){
   if (percentage > 100) {
       percentage = 100;
   }
     $('#progressSoutientRecharge').css('width', percentage+'%');
 }

 function updateProgressDureeSoutient(percentage){
   if (percentage > 100) {
       percentage = 100;
   }
     $('#progressSoutientDuree').css('width', percentage+'%');
 }

//Save soutien

var soutient = "vide";
function savesoutient(id_element,id,name){
  if (soutient == "vide") {
    $('#'+id_element).attr('style','border:3px solid orange')
    soutient = id;
    $('#soutientname').html(name)
    $('#soutient').html('<p style="transform:skewX(-20deg);">Équipement de soutien : </p><p style="color:white;transform:skewX(-20deg);margin-top:-5%;">'+name+'</p>' )
    $.toaster({ priority : 'success', title : 'Soutient', message : name+" ajouter"});
  }
  if (soutient != "vide") {
    $('#soutientchoixmodal').modal('show')
  }


}

function deletesoutient(){
  soutient ="vide"
  $('#soutientname').html("")
  $('#soutient').html('')
  if (soutient == "vide") {
      $('#soutientchoixmodal').modal('hide')
  }
}

function deletetablesoutient(){
  var soutient= "vide";
}

function closeallsoutient(){
  $('#soutientchoixmodal').modal('hide')
  $('#modalsoutient').modal('hide')

  $.toaster({ priority : 'info', title : 'Assaut', message : "L'équipement de soutien a était sauvegarder"});
}

//Composant
function seestatscomposant(id_composant){
  $.ajax({
    type: "POST",
    url: './ajax.php',
    dataType: 'json',
    data:{
      source: "see_composant",
      id_composant:id_composant,
      },
      success: function (response) {
        $.each(response, function(index, value) {
          $('#nameComposant').html(response['nom'])
          $('#styleComposant').html('Composant')
          $('#pouvoirComposant').html('Pouvoir : <h4>47</h4>')
          $('#armureComposant').html(response['armure'])
          $('#bouclierComposant').html(response['bouclier'])
          $('#descriptionComposant').html(response['description']+"<br/><p style='color:orange;'>"+response['effet']+"</p>")
          updateProgressArmureComposant(response['armure']);
          updateProgressBouclierComposant(response['bouclier']);
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
      }
  });
}

function updateProgressArmureComposant(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressComposantArmure').css('width', percentage+'%');
}

function updateProgressBouclierComposant(percentage){
  if (percentage > 100) {
      percentage = 100;
  }
    $('#progressComposantBouclier').css('width', percentage+'%');
}

var composant = ["vide","vide","vide","vide","vide","vide"];
function savecomposant(id_element,id,name){
  $('#'+id_element).attr('style','border:3px solid orange')
  if (composant[0] == "vide") {
    composant[0] = id;
    $('#composant1').html(name)
    $('#composant1_data').html("Composant1:  <p style='color:white;'>"+name+"</p>")
    $.toaster({ priority : 'success', title : 'Composant 1', message : name+" ajouter a l'emplacement 1"});
  } else if(composant[1] == "vide") {
    composant[1] = id;
    $('#composant2').html(name)
    $('#composant2_data').html("Composant2:  <p style='color:white;'>"+name+"</p>")
    $.toaster({ priority : 'success', title : 'Composant 2', message : name+" ajouter a l'emplacement 2"});
  } else if(composant[2] == "vide") {
    composant[2] = id;
    $('#composant3').html(name)
    $('#composant3_data').html("Composant3:  <p style='color:white;'>"+name+"</p>")
    $.toaster({ priority : 'success', title : 'Composant 3', message : name+" ajouter a l'emplacement 3"});
  } else if(composant[3] == "vide") {
    composant[3] = id;
    $('#composant4').html(name)
    $('#composant4_data').html("Composant4: <p style='color:white;'>"+name+"</p>")
    $.toaster({ priority : 'success', title : 'Composant 4', message : name+" ajouter a l'emplacement 4"});
  } else if(composant[4] == "vide") {
    composant[4] = id;
    $('#composant5').html(name)
    $('#composant5_data').html("Composant5:  <p style='color:white;'>"+name+"</p>")
    $.toaster({ priority : 'success', title : 'Composant 5', message : name+" ajouter a l'emplacement 5"});
  } else if(composant[5] == "vide") {
    composant[5] = id;
    $('#composant6').html(name)
    $('#composant6_data').html("Composant6:  <p style='color:white;'>"+name+"</p>")
    $.toaster({ priority : 'success', title : 'Composant 6', message : name+" ajouter a l'emplacement 6"});
  }
  if (composant[0] != "vide" && composant[1] != "vide" && composant[2] != "vide" && composant[3] != "vide" && composant[4] != "vide" && composant[5] != "vide") {
    $('#composantchoixmodal').modal('show')
  }


}

function deletecomposant(emplacement){
  if (emplacement == 1) {
    $('#composants'+composant[0]).attr('style','border:0px solid orange')
    composant[0] ="vide"
    $('#composant1').html("")
    $('#composant1_data').html("Composant1 :")
  } else if (emplacement == 2) {
    $('#composants'+composant[1]).attr('style','border:0px solid orange')
    composant[1] ="vide"
    $('#composant2').html("")
    $('#composant2_data').html("Composant2 :")
  } else if (emplacement == 3) {
    $('#composants'+composant[2]).attr('style','border:0px solid orange')
    composant[2] ="vide"
    $('#composant3').html("")
    $('#composant3_data').html("Composant3 :")
  } else if (emplacement == 4) {
    $('#composants'+composant[3]).attr('style','border:0px solid orange')
    composant[3] ="vide"
    $('#composant4').html("")
    $('#composant4_data').html("Composant4 :")
  } else if (emplacement == 5) {
    $('#composants'+composant[4]).attr('style','border:0px solid orange')
    composant[4] ="vide"
    $('#composant5').html("")
    $('#composant5_data').html("Composant5 :")
  } else if (emplacement == 6) {
    $('#composants'+composant[5]).attr('style','border:0px solid orange')
    composant[5] ="vide"
    $('#composant6').html("Composant6 :")
    $('#composant6_data').html('')
  }
  if (composant[0] == "vide" && composant[1] == "vide" && composant[2] == "vide" && composant[3] == "vide" && composant[4] == "vide" && composant[5] == "vide") {
      $('#composantchoixmodal').modal('hide')
  }
}

function deletetablecomposant(){
  var array_weapon= ['vide','vide'];
}

function closeallcomposant(){
  $('#composantchoixmodal').modal('hide')
  $('#modalcomposant').modal('hide')
  $.toaster({ priority : 'info', title : 'Composant', message : "Les composants on était sauvegarder"});
}

//See onmouseover

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

$("#assautsee").mouseover(function(){
  $('#assaut1').removeClass('armes')
  $('#assaut1').addClass('armesover')
});
$("#assautsee").mouseout(function(){
  $('#assaut1').removeClass('armesover')
  $('#assaut1').addClass('armes')
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
<!-- Modal -->

<?php
session_start();
require_once __DIR__ . "./model/_model.php";
if (isset($_GET['id_build'])) {
  $result_build=new BuildsManager($connexion);
  $result=new ArmesManager($connexion);
  $resultAssaut=new AssautManager($connexion);
  $resultSoutient=new SoutientManager($connexion);
  $resultComposant=new ComposantManager($connexion);
  $resultBuildComposant=new BuildcomposantManager($connexion);
  $resultBuildArme=new BuildarmesManager($connexion);

  $resultats_build=$result_build->db_getBuildbyid($_GET['id_build']);
  while ($row_build=$resultats_build->fetch_array(MYSQLI_ASSOC)) {
      $build = new Builds($row_build);
  }

  $resultatsAssaut=$resultAssaut->db_getAssautbyid($build->getId_assaut());
  $row_assaut=$resultatsAssaut->fetch_array(MYSQLI_ASSOC);
  $assaut = new Assaut($row_assaut);

  $resultatsConcentration=$resultAssaut->db_getAssautbyid($build->getId_concentration());
  $row_concentration=$resultatsConcentration->fetch_array(MYSQLI_ASSOC);
  $concentration = new Assaut($row_concentration);

  $resultatsSoutient=$resultSoutient->db_getSoutientbyid($build->getId_soutient());
  $row_soutient=$resultatsSoutient->fetch_array(MYSQLI_ASSOC);
  $soutient = new Soutient($row_soutient);

  $resultatsBuildComposant=$resultBuildComposant->db_getComposantBuild($_GET['id_build']);
  $resultatsBuildArme=$resultBuildArme->db_getArmeBuild($_GET['id_build']);
} else {
header("location:./index.php");
}

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
      <div class="col-lg-2  parallelogrambuilder" id="explosion" >
        <p style="transform:skewX(-20deg);" id="assaut2see">Lanceur d'artillerie:&nbsp;<br/><a href="#" style="color:white;"><?php echo $concentration->getNom()?></a></p>
        </div>
      <div class="col-lg-3" ></div>
    </div>
    <div class="row" >
      <div class="col-lg-5" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-2" style="margin-left:50px;" id="composantsee" ><button id="modalActivateComposant" type="button btn-outline-light" class="btn" data-toggle="modal" data-target="#modalcomposant"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></button></div>
      <div class="col-lg-2 parallelogrambuilder" style="margin-left:75%;height:370px;" id="composant" >
        <?php $c = 1;
        while ($row_build_composant=$resultatsBuildComposant->fetch_array(MYSQLI_ASSOC)) {
            $build_composant = new Buildcomposant($row_build_composant);
            $resultatsComposant=$resultComposant->db_getComposantbyid($build_composant->getId_composant());
            $row_composant=$resultatsComposant->fetch_array(MYSQLI_ASSOC);
            $composant = new Composant($row_composant);?>
        <p  style="transform:skewX(-20deg);">Composant<?php echo $c ?>:<br/><a href="#" id="Composant<?php echo $c ?>" style="color:white;"><?php echo $composant->getNom() ?></a><p>
        <?php $c++; } ?>
      </div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" ></div>
    </div>
    <div class="row" style="margin-top:-300px;" >
      <div class="col-lg-2"></div>
      <div class="col-lg-2 parallelogrambuilder" style="height:50px;" id="assaut1" ><p style="transform:skewX(-20deg);">Lanceur d'assaut lourd:&nbsp;<br/><a href="#" style="color:white;transform:skewX(-20deg);margin-top:-15px"><?php echo $assaut->getNom() ?></a><p></div>
      <div class="col-lg-1" id="assautsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" id="soutientsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-2 parallelogrambuilder" style="height:50px;margin-left:-70px;" id="soutient" ><p style="transform:skewX(-20deg);">Équipement de soutien:&nbsp;<br/><a href="#" style="color:white;"><?php echo $soutient->getNom() ?></a><p></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" style="padding:1%;">
      <div class="col-lg-2" ></div>
      <div class="col-lg-2 parallelogrambuilder" style="height:100px;" id="armes">
        <?php $a=1;
        while ($row_build_arme=$resultatsBuildArme->fetch_array(MYSQLI_ASSOC)) {
            $build_arme = new Buildarmes($row_build_arme);
            $resultatsArme=$result->db_getWeaponbyid($build_arme->getId_arme());
            $row_arme=$resultatsArme->fetch_array(MYSQLI_ASSOC);
            $arme = new Armes($row_arme);?>
        <p style="transform:skewX(-20deg);<?php if ($a==2) {?>margin-top:-4%;<?php }?>" >Arme<?php echo $a ?>:<br/>
          <a href="#" id="Arme<?php echo $a ?>" onmouseover="seearme('armes',<?php echo $arme->getId() ?>)" style="color:white;"><?php echo $arme->getNom() ?></a>
        </p>
      <?php $a++;} ?>
      </div>
      <div class="col-lg-1" id="armesee"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
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
        <input type="text" class="form-control" id="nameBuild" name="nameBuild" disabled="disabled" value="<?php echo $build->getNom() ?>" placeholder="Nom du build"></input>
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
        <h5 class="modal-title" style="margin-left:150px!important;opacity: 1;transform:skewX(-20deg);" id="exampleModalPreviewLabel">Armes 1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="margin-left:100px;transform:skewX(-20deg);">
        <div class="row" id="image_obj" style="transform:skewX(20deg);margin-left:25px;">
        </div>
      </div>
    </div>
    <div class="modal-contentweapon" >
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
          <div class="row col-lg-12" style="background-color:black;opacity:0.7;color:white;padding-top:1%;height:100px;">
            <div class="col-lg-12" id="descriptionWeapon" style="transform:skewX(-20deg)!important;text-align:center;" ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function seearme(type,id){
  console.log(type)
  $('#modalarme').modal('show')
  $('#modalarme').css("background",'none')
  $.ajax({
    type: "POST",
    url: './ajax.php',
    dataType: 'json',
    data:{
      source: "get_info_all",
      id:id,
      type: type,
      },
      success: function (response) {
        $.each(response, function(index, value) {
          if (type == "armes") {
            $('#image_obj').html('<img src="./image/arme/'+id+'.png" style="margin-left:-75px;" width="120%" height="120%" alt="">')
          }


        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        $.toaster({ priority : 'error', title : 'Erreur', message : "Impossible d'enregistrer les build."});
      }
  });
}

</script>
<!-- Modal -->

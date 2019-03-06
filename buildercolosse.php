<?php
session_start();
require_once __DIR__ . "./model/_model.php";
$result=new ArmesManager($connexion);
$resultAssaut=new AssautManager($connexion);
$resultats=$result->db_getWeapon(2);
$resultatsAssaut=$resultAssaut->db_getAssaut(2,2);
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
  <body style="background-image:url('./image/2/colossetest.jpg');background-size: cover;">

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
      <div class="col-lg-12">
      </div>
    </div>
    <div class="row" style="padding:2%;">
      <div class="col-lg-5" ></div>
      <div class="col-lg-2" ></div>
      <div class="col-lg-1 " style="margin-left:-4%" id="explosionsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="explosion" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" ></div>
    </div>
    <div class="row" style="padding:3%;" >
      <div class="col-lg-5" ></div>
      <div class="col-lg-2 armes parallelogrambuilder" style="margin-left:-3%" id="composant" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-1" id="composantsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" >
      <div class="col-lg-2"></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="concentration" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-1" id="assautsee" ><button id="modalActivateAssaut1" type="button btn-outline-light" class="btn" data-toggle="modal" data-target="#modalassaut1"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></button></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" id="soutientsee" ><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></div>
      <div class="col-lg-1 armes parallelogrambuilder" id="soutient" ><p style="transform:skewX(-20deg);">COUCOU<p></div>
      <div class="col-lg-2" ></div>
    </div>
    <div class="row" style="padding:1%;">
      <div class="col-lg-2" ></div>
      <div class="col-lg-2 armes parallelogrambuilder" id="armes"><p style="transform:skewX(-20deg);" id="tableWeaponOver1"><p><p style="transform:skewX(-20deg);" id="tableWeaponOver2" ></p></div>
      <div class="col-lg-1" id="armesee"><button id="modalActivate" type="button btn-outline-light" class="btn" data-toggle="modal" data-target="#modalarme"><div class="circle"><div class="circleinner"><div class="circlecenter"></div></div></div></button></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-1" ></div>
      <div class="col-lg-2" ></div>
      <div class="col-lg-2" ></div>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
              $assaut = new Armes($row_assaut); ?>
          <div class="col-lg-4 boxcontainer"  onmouseover="seestatsassaut1(<?php echo $assaut->getId() ?>)" onclick="saveassaut1('assaut<?php echo $assaut->getId() ?>',<?php echo $assaut->getId() ?>,'<?php echo $assaut->getNom() ?>')">
            <div id='assaut<?php echo $assaut->getId() ?>'  class="boxAssaut" >
              <div style="transform:skewX(-20deg);width:100%;height:100%;">
                <img onmouseover="this.style.border = '2px solid orange'" onmouseout="this.style.border = '1px solid black'" style="border:1px solid black;" src="./image/2/assaut/<?php echo $assaut->getId_type() ?>/<?php echo $assaut->getId() ?>.jpg" alt="" width="130px" height="70px">
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
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-1%;">CPM:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="rechargeAssaut1"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-danger"  role="progressbar" id="progressAssaut1Recharge" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Munitions -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-2%;">Munitions:</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="rayonAssaut1"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
              <div class="progress-bar bg-info"  role="progressbar" id="progressAssaut1Rayon" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- Porte ou explo -->
            <div class="col-lg-2" ></div>
            <div class="col-lg-4" id="exploPorte" style="display:inline-block;transform:skewX(-20deg)!important;margin-left:-3%;">Porté / Explosion</div>
            <div class="col-lg-2" style="display:inline-block;transform:skewX(-20deg)!important;text-align:right;" id="statuAssaut1"></div>
            <div class="progress col-lg-4" style="transform:skewX(-20deg)!important;">
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

<script>
var array_weapon= ['vide','vide'];
function saveweapon(id_element,id,name){
  $('#'+id_element).attr('style','border:3px solid orange')
  $('#'+id_element).attr('onmouseout','')
  if (array_weapon[0] == "vide") {
    array_weapon[0] = id;
    $('#armename1').html(name)
    $('#tableWeaponOver1').html('Armes 1 : <p style="color:white;">'+name+'</p>' )
    $.toaster({ priority : 'success', title : 'Armes 1', message : name+" ajouter a l'emplacement 1"});
  } else if(array_weapon[1] == "vide") {
    array_weapon[1] = id;
    $('#armename2').html(name)
    $('#tableWeaponOver2').html('Armes 2 :<p style="color:white;">'+name+'</p>' )
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

function deletetableweapon(){
  var array_weapon= ['vide','vide'];
}

function closeallweapon(){
  $('#armeschoixmodal').modal('hide')
  $('#exampleModal').modal('hide')
  $.toaster({ priority : 'info', title : 'Armes 2', message : "Les armes on était sauvegarder"});
}

function savebuild(){
  if (array_weapon[0] == "vide" || array_weapon[1] == "vide") {
      $.toaster({ priority : 'error', title : 'Armes 2', message : "Une arme est manquante."});
      return false;
  }
  $.ajax({
    type: "POST",
    url: './ajax.php',
    dataType: 'json',
    data:{
      source: "colosse_build",
      id_javelin:2,
      weapons: array_weapon,
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
          console.log(index+" "+value)
          $('#nameAssaut1').html(response['nom'])
          $('#styleAssaut').html(response['id_type'])
          $('#pouvoirAssaut1').html('Pouvoir : <h4>47</h4>')
          if (response['id_statut '] == "Feu") {
            $('#degatAssaut1').html('<i style="color:orange;" class="fas fa-fire"></i>&nbsp;'+response['degat'])
          } else {
            $('#degatAssaut1').html('<img width="32px" src="./image/Foudre.png" alt="">&nbsp;'+response['degat'])
          }

          $('#rechargeAssaut1').html(response['recharge'])
          $('#rayonAssaut1').html(response['rayon'])
          $('#statutAssaut1').html(response['munitions'])
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
  $('#concentration').removeClass('armes')
  $('#concentration').addClass('armesover')
});
$("#assautsee").mouseout(function(){
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
<!-- Modal -->

<?php
session_start();
require_once __DIR__ . "./model/_model.php";
$result=new GameuserManager($connexion);
$resultats=$result->db_getGameUser($_SESSION['id'],$_GET['id']);
$tour=0;
while ($row_gameuser=$resultats->fetch_array(MYSQLI_ASSOC)) {
    $gameuser = new Gameuser($row_gameuser);
    $tour = $gameuser->getIs_tour();
    $ordre = $gameuser->getOrdre();
}
if (!$resultats->num_rows) {
  $_SESSION["messageKO"] = "Vous n'etes pas dans cette partit";
  header("Location:./index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Uno</title>
  </head>
  <body>
    <?php require_once('menutop.php') ?>
    <button class="btn btn-primary" onclick="pioche(<?php echo $_SESSION['id'] ?>)" style="margin-top:500px;">Piocher</button>
    <div style="margin-left:150px;position:absolute;" id="pioche"></div>
    <div style="margin-left:500px;margin-top:-300px;position:absolute;width: 100px;height: 160px;background-image: url('./carte/vide.png')" id="main"> </div>

  </body>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="./vendor/metisMenu/metisMenu.min.js"></script>


  <!-- Custom Theme JavaScript -->
  <script src="./dist/js/sb-admin-2.js"></script>
  <script>
  var joueur = [];
  var pioches = [];
  $(document).ready(function() {
    get_card_game()
  });


  function get_card_game(){
    var id_joueur = <?php echo $_SESSION['id']; ?>;
    var id_game = <?php echo $_GET['id']; ?>;
      $.ajax({
        type: "POST",
        url: './ajax.php',
        dataType: 'json',
        data:{
          source: "card_game",
          id_game: id_game,
          id_joueur: id_joueur,
          },
          success: function (response) {
              response.forEach(function(element) {
                var split_card = element.split(" ");
                if (split_card[0] < 10) {
                  pioches.push(split_card[0]+" "+split_card[1]);
                  var html = $("#pioche").html();
                  $("#pioche").html(html+'<div id="'+split_card[0]+'.'+split_card[1]+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/'+split_card[0]+split_card[1]+'.png);text-align:center;color:white;font-size:40px;"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+split_card[0]+'.'+split_card[1]+'" class="btn btn-primary">Jouer</button></div>');
                } else if (split_card[0] == 10 ) {
                  pioches.push(split_card[0]+" "+split_card[1]);
                  var html = $("#pioche").html();
                  var joker = "Stop"+split_card[1];
                  $("#pioche").html(html+'<div id="'+split_card[0]+'.'+split_card[1]+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/'+joker+'.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+split_card[0]+'.'+split_card[1]+'" class="btn btn-primary">Jouer</button></div>');
                } else if (split_card[0] == 11 ) {
                  pioches.push(split_card[0]+" "+split_card[1]);
                  var html = $("#pioche").html();
                  var joker = "S"+split_card[1];
                  $("#pioche").html(html+'<div id="'+split_card[0]+'.'+split_card[1]+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/'+joker+'.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+split_card[0]+'.'+split_card[1]+'" class="btn btn-primary">Jouer</button></div>');
                } else if (split_card[0] == 12 ) {
                  pioches.push(split_card[0]+" "+split_card[1]);
                  var html = $("#pioche").html();
                  var joker = "P"+split_card[1];
                  $("#pioche").html(html+'<div id="'+split_card[0]+'.'+split_card[1]+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/'+joker+'.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;"id="'+split_card[0]+'.'+split_card[1]+'" class="btn btn-primary">Jouer</button></div>');
                } else if (split_card[0] == 13 ) {
                  pioches.push(split_card[0]+" "+split_card[1]);
                  var html = $("#pioche").html();
                  $("#pioche").html(html+'<div id="'+split_card[0]+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/4.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+split_card[0]+'" class="btn btn-primary">Jouer</button></div>');
                } else if (split_card[0] == 14 ) {
                  joker4++
                  pioches.push(split_card[0]+" "+split_card[1]);
                  var html = $("#pioche").html();
                  $("#pioche").html(html+'<div id="'+split_card[0]+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/joker.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+split_card[0]+'" class="btn btn-primary">Jouer</button></div>');
                }
              });

          },
          error: function(jqXHR, textStatus, errorThrown) {
             alert("Erreur");
          }
      });
  };
  //10 = passe.
  //11 = change sens
  //12 = +2
  //13 = +4 et change couleur
  //14 = changement couleur

  var talonNumber = []
  var talonColor = []

  var card = [
    0,
    1,
    2,
    3,
    4,
    5,
    6,
    7,
    8,
    9,
    10,
    11,
    12,
    13,
    14,
  ];

  var color = [
    "Bleu",
    "Rouge",
    "Vert",
    "Jaune"
  ];

  var joker4 = 0



  var allready = 0;




  function pioche(){
      if (allready == 1) {
          alert('Vous avez jouer une carte pendant ce tour.')
      } else {
          var carde = card[Math.floor(Math.random() * card.length)];
          console.log(carde)
          if (carde < 13) {
            var colors = color[Math.floor(Math.random() * color.length)];
          }
          if (carde < 10) {
            pioches.push(carde+" "+colors);
            var html = $("#pioche").html();
            $("#pioche").html(html+'<div id="'+carde+'.'+colors+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/'+carde+colors+'.png);text-align:center;color:white;font-size:40px;"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+carde+'.'+colors+'" class="btn btn-primary">Jouer</button></div>');
          } else if (carde == 10 ) {
            pioches.push(carde+" "+colors);
            var html = $("#pioche").html();
            var joker = "Stop"+colors;
            $("#pioche").html(html+'<div id="'+carde+'.'+colors+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/'+joker+'.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+carde+'.'+colors+'" class="btn btn-primary">Jouer</button></div>');
          } else if (carde == 11 ) {
            pioches.push(carde+" "+colors);
            var html = $("#pioche").html();
            var joker = "S"+colors;
            $("#pioche").html(html+'<div id="'+carde+'.'+colors+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/'+joker+'.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+carde+'.'+colors+'" class="btn btn-primary">Jouer</button></div>');
          } else if (carde == 12 ) {
            pioches.push(carde+" "+colors);
            var html = $("#pioche").html();
            var joker = "P"+colors;
            $("#pioche").html(html+'<div id="'+carde+'.'+colors+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/'+joker+'.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;"id="'+carde+'.'+colors+'" class="btn btn-primary">Jouer</button></div>');
          } else if (carde == 13 ) {
            pioches.push(carde+" "+colors);
            var html = $("#pioche").html();
            $("#pioche").html(html+'<div id="'+carde+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/4.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+carde+'" class="btn btn-primary">Jouer</button></div>');
          } else if (carde == 14 ) {
            joker4++
            pioches.push(carde+" "+colors);
            var html = $("#pioche").html();
            $("#pioche").html(html+'<div id="'+carde+'" style="display:inline-block;width:110px;height:160px;background-image: url(./carte/joker.png);"><button onclick="jouer(<?php echo $_SESSION['id'] ?>)" style="margin-top:-50px;width:100%;" id="'+carde+'" class="btn btn-primary">Jouer</button></div>');
          }
      }

  }

  function jouer(joueur){
    var tour = check_if_is_tour();
    console.log(tour);
    if (allready != 1 && tour!=0) {
    var str = event.srcElement.id
    var card = str.split(".");
    var lastNumber = talonNumber[talonNumber.length - 1];
    var lastColor = talonColor[talonColor.length - 1];
    if(lastNumber == undefined){
      talonNumber.push(card[0]);
      talonColor.push(card[1]);
      if (card[0] < 10) {
        var search = card[0]+" "+card[1];
            $("#main").css("background-image", 'url(./carte/'+card[0]+card[1]+'.png)' );
          } else if (card[0] == 10 ) {
            var search = card[0]+" "+card[1];
            var joker = "Stop"+card[1];
            $("#main").css( "background-image", 'url(./carte/'+joker+'.png)' );
          } else if (card[0] == 11 ) {
            var search = card[0]+" "+card[1];
            var joker = "S"+card[1]
            $("#main").css( "background-image", 'url(./carte/'+joker+'.png)' );
          } else if (card[0] == 12 ) {
            var search = card[0]+" "+card[1];
            var joker = "P"+card[1];
            $("#main").css( "background-image", 'url(./carte/'+joker+'.png)' );
          } else if (card[0] == 13 ) {
            var search = card[0]
            $("#main").css( "background-image", 'url(./carte/4.png)' );
          } else if (card[0] == 14 ) {
            var search = card[0]
            $("#main").css( "background-image", "url(./carte/joker.png)" );
          }
    } else {
      if (card[0] == 13) {
        talonNumber.push(card[0]);
      } else {
        if (lastNumber != card[0] && lastColor != card[1]) {
          alert("Mauvaise carte")
          console.log(card)
        } else {
          alert('bonne carte')
          talonNumber.push(card[0]);
          talonColor.push(card[1]);
          var search = card[0]+" "+card[1];
          if (card[0] < 10) {
            $("#main").css( "background-image", 'url(./carte/'+card[0]+card[1]+'.png)' );
          } else if (card[0] == 10 ) {
            var joker = "Stop"+card[1];
            $("#main").css( "background-image", 'url(./carte/'+joker+'.png)' );
          } else if (card[0] == 11 ) {
            var joker = "S"+card[1]
            $("#main").css( "background-image", 'url(./carte/'+joker+'.png)' );
          } else if (card[0] == 12 ) {
            var joker = "P"+card[1];
            $("#main").css( "background-image", 'url(./carte/'+joker+'.png)' );
          } else if (card[0] == 13 ) {
            $("#main").css( "background-image", 'url(./carte/4.png)' );
          } else if (card[0] == 14 ) {
            $("#main").css( "background-image", "url(./carte/joker.png)" );
          }
        }
      }
    }
    var index = pioches.indexOf(search);    // <-- Not supported in <IE9
    if (index !== -1) {
        pioches.splice(index, 1);
    }
    drop_card_game(card[0],card[1])
    allready = 1
    var elem = document.getElementById("pioche");
    if (card[0] == 14 || card[0] == 13) {
      var id = document.getElementById(card[0]);
    } else {
      var id = document.getElementById(card[0]+"."+card[1]);
    }
    elem.removeChild(id);
    change_tour();
    //last_card_play(card[0],card[1]);
  } else {
    alert('Vous avez jouer une carte pendant ce tour.')
  }
}

function drop_card_game(card,color){
  var id_joueur = <?php echo $_SESSION['id']; ?>;
  var id_game = <?php echo $_GET['id']; ?>;
    $.ajax({
      type: "POST",
      url: './ajax.php',
      dataType: 'json',
      data:{
        source: "drop_card_game",
        id_game: id_game,
        id_joueur: id_joueur,
        card:card,
        color:color,
        },
        success: function (response) {
        },
        error: function(jqXHR, textStatus, errorThrown) {
           alert("Erreur");
        }
    });
};

function change_tour(){
  var id_joueur = <?php echo $_SESSION['id']; ?>;
  var id_game = <?php echo $_GET['id']; ?>;
  var ordre = <?php echo $ordre; ?>;
    $.ajax({
      type: "POST",
      url: './ajax.php',
      dataType: 'json',
      data:{
        source: "change_tour",
        id_game: id_game,
        id_joueur: id_joueur,
        ordre:ordre,
        },
        success: function (response) {
        },
        error: function(jqXHR, textStatus, errorThrown) {
           alert("Erreur change");
        }
    });
};

function check_if_is_tour(){
  var id_joueur = <?php echo $_SESSION['id']; ?>;
  var id_game = <?php echo $_GET['id']; ?>;
    $.ajax({
      type: "POST",
      url: './ajax.php',
      dataType: 'json',
      data:{
        source: "check_if_is_tour",
        id_game: id_game,
        id_joueur: id_joueur,
        },
        success: function (response) {
          return true
        },
        error: function(jqXHR, textStatus, errorThrown) {
          return false
        }
    });
};

function last_card_play(card,color){
  var id_game = <?php echo $_GET['id']; ?>;
    $.ajax({
      type: "POST",
      url: './ajax.php',
      dataType: 'json',
      data:{
        source: "last_card_play",
        card: card,
        color: color,
        },
        success: function (response) {
        },
        error: function(jqXHR, textStatus, errorThrown) {
           alert("Erreur");
        }
    });
};

  </script>
</html>

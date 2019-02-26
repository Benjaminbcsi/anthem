<?php
session_start();
require_once __DIR__ . "./model/_model.php";
$result=new Gamemanager($connexion);
$resultats=$result->db_getAllGame();
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
    <?php require_once('menu.php') ?>

    <div id="wrapper">


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Partit</h1>
                </div>
                <div class="row" style="text-align: center">
                <div class="col-lg-4" style="margin-left:450px;">
                    <div class="form-group">
                        <label>Créer une partit</label>
                        <input type="hidden" id="todo_form_connexion" name="todo_form_connexion" value="valid_connexion"/>
                        <input class="form-control" placeholder="Nom Partit" id="partit_name" name="partit_name" type="text" autofocus>
                        <input type="submit" onclick="addgame()" class="btn btn-lg btn-success btn-block">
                    </div>
                <!-- /.col-lg-12 -->
                </div>
            </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nom de la partit</th>
                                        <th>Nombre de joueur</th>
                                        <th>Etat</th>
                                        <th>Vainqueur</th>
                                        <th>Rejoindre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row_game=$resultats->fetch_array(MYSQLI_ASSOC)) {
                                        $game = new Game($row_game);
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $game->getNom() ?></td>
                                        <td><?php echo $game->getNb_Joueur() ?></td>
                                        <td><?php if ($game->getEtat() == 0) { ?>
                                            En attente
                                        <?php } elseif ($game->getEtat() == 1) { ?>
                                            En cours
                                        <?php } else { ?>
                                            Finis
                                        <?php } ?></td>
                                        <td class="center"><?php echo $game->getId_joueur_victorieux() ?></td>
                                        <td><button onclick="join(<?php echo $game->getId() ?>)" class="btn btn-info btn-block">Joindre</button></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

      <!-- Metis Menu Plugin JavaScript -->
      <script src="./vendor/metisMenu/metisMenu.min.js"></script>

      <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="./vendor/datatables-responsive/dataTables.responsive.js"></script>

      <!-- Custom Theme JavaScript -->
      <script src="./dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    function join(id){
        $.ajax({
          type: "POST",
          url: './ajax.php',
          dataType: 'json',
          data:{
            source: "joingame",
            id: id,
            },
            success: function (response) {
                document.location.href="game.php?id="+id           
            },
            error: function(jqXHR, textStatus, errorThrown) {
               alert("Partit impossible a rejoindre");
            }
        });
    }

    function addgame(){
        var namegame = $('#partit_name').val();
        $.ajax({
          type: "POST",
          url: './ajax.php',
          dataType: 'json',
          data:{
            source: "newgame",
            name: namegame,
            },
            success: function (response) {
                document.location.href="game.php?id="+response
            },
            error: function(jqXHR, textStatus, errorThrown) {
               alert("Nommer votre partit");
            }
        });
    };

    </script>

</body>

</html>

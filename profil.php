<?php
session_start();
require_once __DIR__ . "./model/_model.php";
$result = new UserManager($connexion);
$resultats = $result->db_getUsersId($_SESSION["id"]);
while ($row_user=$resultats->fetch_array(MYSQLI_ASSOC)) {
  $user=new Users($row_user);
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
    <link href="css/login.css" rel="stylesheet">
    <title>Anthem Builder</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Modification Profil</h5>
            <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_modif" name="form_modif">
                <input type="hidden" id="todo_form_modif" name="todo_form_modif" value="valid_modif"/>
              <div class="form-label-group">
                <input type="text" id="pseudo" name="pseudo" class="form-control" value="<?Php echo $user->getPseudo()?>" placeholder="Email address" required autofocus>
                <label for="pseudo">Pseudo</label>
              </div>
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" value="<?Php echo $user->getEmail()?>" class="form-control" placeholder="Email address" required>
                <label for="inputEmail">E-mail</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="origin" name="origin" class="form-control" value="<?Php echo $user->getOrigin_pc()?>" placeholder="Origin" >
                <label for="origin">Pseudo Origin PC</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="gamertag" name="gamertag" class="form-control" value="<?Php echo $user->getGamertag()?>" placeholder="Gamertag" >
                <label for="gamertag">Gamertag</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="psn" name="psn" class="form-control" value="<?Php echo $user->getPlaystation_network()?>" placeholder="PSN">
                <label for="psn">Playstation network</label>
              </div>

              <hr class="my-4">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Modifier</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

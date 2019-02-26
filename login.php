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
    <link href="css/login.css" rel="stylesheet">
    <title>Anthem Builder</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_connexion" name="form_connexion">
                <input type="hidden" id="todo_form_connexion" name="todo_form_connexion" value="valid_connexion"/>
              <div class="form-label-group">
                <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
                <label for="pseudo">Pseudo</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password">
                <label for="inputPassword">Mot de passe</label>
              </div>
              <hr class="my-4">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Connexion</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

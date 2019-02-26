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
            <h5 class="card-title text-center">S'inscrire</h5>
            <form enctype="multipart/form-data" action="./controllers/controller.php"  method="post" id="form_inscription" name="form_inscription">
                <input type="hidden" id="todo_form_inscription" name="todo_form_inscription" value="valid_inscription"/>
              <div class="form-label-group">
                <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
                <label for="pseudo">Pseudo</label>
              </div>
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
                <label for="inputEmail">E-mail</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="origin" name="origin" class="form-control" placeholder="Origin" >
                <label for="origin">Pseudo Origin PC</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="gamertag" name="gamertag" class="form-control" placeholder="Gamertag" >
                <label for="gamertag">Gamertag</label>
              </div>
              <div class="form-label-group">
                <input type="text" id="psn" name="psn" class="form-control" placeholder="PSN">
                <label for="psn">Playstation network</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <label for="password">Mot de passe</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="password2" name="password2" class="form-control" placeholder="Password" required>
                <label for="password2">Confirmation mot de passe</label>
              </div>
              <hr class="my-4">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">S'inscrire</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

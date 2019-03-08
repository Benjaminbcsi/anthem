<?php
session_start();
require_once __DIR__ . "./model/_model.php";
$result_build=new BuildsManager($connexion);
$result_javelin=new JavelinManager($connexion);
$result_user=new UserManager($connexion);
$resultats_build=$result_build->db_getAllBuild();
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
<body style="background-image:url('./image/background.png');background-size:cover;">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark col-lg-6 parallelogram">
  <!-- Brand -->
  <?Php if (isset($_SESSION['id']) && $_SESSION['id'] != "") { ?>
    <a class="navbar-brand" style="transform:skewX(-20deg);"  href="index.php">Bienvenue <?php echo ucfirst($_SESSION['pseudo']) ?></a>
  <?php } else { ?>
    <a class="navbar-brand" style="transform:skewX(-20deg);" href="index.php">ANTHEM Builder</a>
  <?php } ?>

  <!-- Links -->
    <ul style="transform:skewX(-20deg);" class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="list_build.php">Liste Build</a>
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
    <div class="row" style="text-align:center;">
      <table class="table">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Nom</th>
          <th scope="col">Javelin</th>
          <th scope="col">Nom créateur</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row_build=$resultats_build->fetch_array(MYSQLI_ASSOC)) {
            $build = new Builds($row_build);
            $resultats_javelin=$result_javelin->db_getJavelin($build->getId_javelin());
            $row_javelin=$resultats_javelin->fetch_array(MYSQLI_ASSOC);
            $resultats_user=$result_user->db_getUsersId($build->getId_user());
            $row_user=$resultats_user->fetch_array(MYSQLI_ASSOC);
            $javelin = new Javelin($row_javelin);
            $user = new Users($row_user);
            ?>
        <tr>
          <th scope="row"></th>
          <td><a class="nav-link" href="see_build.php?id_build=<?php echo $build->getId() ?>"><?php echo $build->getNom() ?></a></td>
          <td><?php echo $javelin->getNom() ?></td>
          <td><?php echo ucfirst($user->getPseudo()) ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </div>
  </div>
</body>
</html>

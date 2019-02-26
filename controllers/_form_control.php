<?php
require_once __DIR__ . "/../model/_model.php";

if (isset($_POST["todo_form_inscription"]) && $_POST["todo_form_inscription"] == "valid_inscription") {
    $result      = new UserManager($connexion);
    if (!isset($_POST["pseudo"]) || $_POST["pseudo"] == "") {
        $_SESSION["messageKO"] = "Login Obligatoire";
        header('location:../index.php');
        exit;
    }
    if (!isset($_POST["password"]) || $_POST["password"] == "") {
        $_SESSION["messageKO"] = "Password Obligatoire";
        header('location:../index.php');
        exit;
    }
    if (!isset($_POST["password2"]) || ($_POST["password2"] != $_POST["password"])) {
        $_SESSION["messageKO"] = "Password ne correspondent pas";
        header('location:../index.php');
        exit;
    }
    $resultats = $result->db_getUsersLogin(strtolower($_POST["pseudo"]));
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Compte existant";
        header("Location:../index.php");
        exit;
    }
    $pseudo = strtolower($_POST["pseudo"]);
    $users = new Users(array());
    $users->setPseudo($pseudo);
    $users->setMdp($_POST["password"]);
    $users->setEmail($_POST["email"]);
    $users->setGamertag($_POST['gamertag']);
    $users->setOrigin_pc($_POST['origin']);
    $users->setPlaystation_network($_POST['psn']);
    if($result->db_addUsers($users)) {
        $_SESSION["messageOK"] = "Inscription valid&eacute;e !";
    } else {
        $_SESSION["messageKO"] = "Erreur pendant l'inscription, veuillez prendre contact !";
    }
    header("Location:../index.php");
    exit;
}



  if (isset($_POST["todo_form_connexion"]) && $_POST["todo_form_connexion"] == "valid_connexion") {
    $pseudo = strtolower($_POST["pseudo"]);
    $result = new UserManager($connexion);
    if (!isset($_POST["pseudo"]) || $_POST["pseudo"] == "") {
        $_SESSION["messageKO"] = "pseudo Obligatoire";
        $_SESSION["pseudo"]    = "";
        header("Location: ../index.php");
        exit;
    }
    $resultats = $result->db_getUserLoginPassword($pseudo, $_POST["inputPassword"]);
    if ($resultats->num_rows) {
        $row_user           = $resultats->fetch_assoc();
		    $_SESSION["id"]     = "";
        $_SESSION["id"]     = $row_user["id"];
        $_SESSION["pseudo"] = $row_user["pseudo"];
        header("Location: ../index.php");
        exit;
    } else {
        $_SESSION["messageOK"] = "Identification incorrect";
        header("Location: ../index.php");
        exit;
    }
}

if (isset($_POST["todo_form_fighter"]) && $_POST["todo_form_fighter"] == "valid_fighter") {
    $result = new PersonnageManager($connexion);
    if (!isset($_POST["name_fighter"]) || $_POST["name_fighter"] == "") {
        $_SESSION["messageKO"] = "Nom du combattant Obligatoire";
        header("Location: ../index.php");
        exit;
    }
    $personnage = new Personnage(array());
    $personnage->setNom($_POST["name_fighter"]);
    $personnage->setId_user($_SESSION["id"]);
    $resultats=$result->db_existPersonnage($_POST["name_fighter"],$_SESSION["id"]);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Combattant existant";
        header("Location:../index.php");
        exit;
    }

    if($result->db_addPersonnage($personnage)) {
        $_SESSION["messageOK"] = "Combattant Crée";
    } else {
        $_SESSION["messageKO"] = "Erreur pendant la création du combattant.";
    }
    header("Location:../list_fighter.php");
    exit;
}


if (isset($_POST["todo_form_modif"]) && $_POST["todo_form_modif"] == "valid_modif") {
    $result      = new UserManager($connexion);
    $pseudo = strtolower($_POST["pseudo"]);
    $users = new Users(array());
    $users->setId($_POST['id_user']);
    $users->setPseudo($pseudo);
    $users->setEmail($_POST["email"]);
    $users->setGamertag($_POST['gamertag']);
    $users->setOrigin_pc($_POST['origin']);
    $users->setPlaystation_network($_POST['psn']);
    $resultats=$result->db_updateUsers($users);
    $_SESSION["messageOK"] = "Utilisateur Modifier !";
    header('location:../index.php');
    exit;
}

if (isset($_POST["todo_form_updateutil"]) && $_POST["todo_form_updateutil"] == "update_util") {
    $result = new UtilisateurManager($connexion);
    $resultmedia = new MediaManager($connexion);
    $utilisateur =  new Utilisateur(array());
    $pseudo = $_POST['pseudoutil'];
    if (isset($_FILES["fichier"]["name"]) && $_FILES["fichier"]["name"] != "") {
        $media =  new Media(array());
        $ext       = $_FILES["fichier"]["name"];
        $extension = pathinfo($ext, PATHINFO_EXTENSION);
        $tableau   = array(
            "JPG",
            "jpg",
            "PNG",
            "png",
            "jpeg",
            "JPEG"
        );
        switch ($_FILES["fichier"]["error"]) {
            case 1:
                $_SESSION["messageKO"] = " La taille du fichier téléchargé est trop grosse!";
                break;
            case 2:
                $_SESSION["messageKO"] = "La taille du fichier téléchargé est trop grosse";
                break;
            case 3:
                $_SESSION["messageKO"] = " Le fichier n'a été que partiellement téléchargé. ";
                break;
            case 4:
                $_SESSION["messageKO"] = "Aucun fichier n'a été téléchargé. ";
                break;
            case 6:
                $_SESSION["messageKO"] = "Un dossier temporaire est manquant.";
                break;
            case 7:
                $_SESSION["messageKO"] = "Échec de l'écriture du fichier sur le disque";
        }
        if (in_array($extension, $tableau)) {
            $media->setNom($ext);
            $media->setType($extension);
            $media->setId_utilisateur($_POST["idutil"]);
            $media->setTaille($_FILES['fichier']['size']);
            if (!move_uploaded_file($_FILES["fichier"]["tmp_name"], '../dossierjoueur/' . $pseudo . "/photo/" . $_FILES["fichier"]["name"])) {
                    trace("Upload du fichier " . $_FILES["fichier"]["name"] . "échouée");
                    $_SESSION["messageKO"] = "Photo non uploader";
                } else {
                    $media->setChemin("dossierjoueur/" . $pseudo . "/photo/" . $_FILES['fichier']['name']);
                    $id_media=$resultmedia->db_insertMediaUpdateUtilisateur($media);

                }
        } else {
            $_SESSION["messageKO"] = "Mauvaise Extension";
            trace("Upload du fichier " . $_FILES["fichier"]["name"] . "échouée (mauvaise extension)");
        }
    } else {
        $_SESSION["messageKO"] = "Photo obligatoire";
    }
    $utilisateur->setId($_POST["idutil"]);
    $utilisateur->setStatutjoueur($_POST["statut"]);
    $utilisateur->setDescjoueur($_POST["updatedesc"]);
    if(isset($id_media) && $id_media!=""){
        $utilisateur->setIdphoto($id_media);
        $result->db_updateUtilisateurProfilMedia($utilisateur);
    } else {
        $result->db_updateUtilisateurProfil($utilisateur);
    }
    $_SESSION["messageKO"] = "Profil modifier";
    header('location:../index.php');
    exit;
    }


?>

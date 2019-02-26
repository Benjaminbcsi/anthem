<?php
require_once __DIR__ . "/../model/_model.php";

if (isset($_POST["todo_form_inscription"]) && $_POST["todo_form_inscription"] == "valid_inscription") {
    $result      = new UtilisateurManager($connexion);
    $resultmedia = new MediaManager($connexion);
    if (!isset($_POST["robot"]) || $_POST["robot"] == "" || $_POST["robot"]!="42") {
        $_SESSION["messageKO"] = "Réponse fausse";
        header('location:../index.php');
        exit;
        
    }
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
    if (!isset($_POST["mail"]) && !filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["messageKO"] = "Mail Non valide";
        header('location:../index.php');
        exit;
    }
    $date   = $_POST["datenaissance"];
    $anneej = date("Y");
    list($jour, $mois, $annee) = explode('/', $date);
    $age  = $annee + 18;
    $date = $annee . "-" . $mois . "-" . $jour;
    if (checkdate($mois, $jour, $annee)) {
        if ($age > $anneej) {
            $_SESSION["messageKO"] = "Vous n'avez pas 18ans";
            header('location:../index.php');
            exit;
        }
    }
    $resultats = $result->db_getUtilisateurLoginEmail($_POST["pseudo"], $_POST["mail"]);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Compte existant";
        header("Location:../index.php");
        exit;
    }
    $resultats = $result->db_getUtilisateurVille($_POST["ville"]);
    if ($resultats->num_rows) {
        $row_ville = $resultats->fetch_assoc();
        $idville   = $row_ville["ville_id"];
    } else {
        $_SESSION["messageKO"] = "Villes Inconnus";
        header("Location: ../index.php");
        exit;
    }
    $pseudo      = strtolower($_POST["pseudo"]);
    $media       = new Media(array());
    $utilisateur = new Utilisateur(array());
    mkdir('../dossierjoueur/' . $pseudo);
    mkdir('../dossierjoueur/' . $pseudo . '/video');
    mkdir('../dossierjoueur/' . $pseudo . '/photo');
    if (isset($_FILES["profil"]["name"]) && $_FILES["profil"]["name"] != "") {
        $ext       = $_FILES["profil"]["name"];
        $extension = pathinfo($ext, PATHINFO_EXTENSION);
        $tableau   = array(
            "JPG",
            "jpg",
            "PNG",
            "png",
            "jpeg",
            "JPEG"                  
        );
        switch ($_FILES["profil"]["error"]) {
            case 1:
                $_SESSION["messageKO"] = " La taille du profil téléchargé est trop grosse!";
                break;
            case 2:
                $_SESSION["messageKO"] = "La taille du profil téléchargé est trop grosse";
                break;
            case 3:
                $_SESSION["messageKO"] = " Le profil n'a été que partiellement téléchargé. ";
                break;
            case 4:
                $_SESSION["messageKO"] = "Aucun profil n'a été téléchargé. ";
                break;
            case 6:
                $_SESSION["messageKO"] = "Un dossier temporaire est manquant.";
                break;
            case 7:
                $_SESSION["messageKO"] = "Échec de l'écriture du profil sur le disque";
        }
        if (in_array($extension, $tableau)) {
            $media->setNom($ext);
            $media->setType($extension);
            $media->setTaille($_FILES['profil']['size']);
            if (!move_uploaded_file($_FILES["profil"]["tmp_name"], '../dossierjoueur/' . $pseudo . "/photo/" . $_FILES["profil"]["name"])) {
                    trace("Upload du profil " . $_FILES["profil"]["name"] . "échouée");
                    $_SESSION["messageKO"] = "Photo non uploader";
                } else {
                    $media->setChemin("dossierjoueur/" . $pseudo . "/photo/" . $_FILES['profil']['name']);
                }
        } else {
            $_SESSION["messageKO"] = "Mauvaise Extension";
            trace("Upload du profil " . $_FILES["profil"]["name"] . "échouée (mauvaise extension)");
        }
    } else {
        $_SESSION["messageKO"] = "Photo obligatoire";
    }
     $id_media=$resultmedia->db_insertMediaUtilisateurInscription($media);
     $media->setId($id_media);
    $utilisateur->setPhoto($id_media);
    $utilisateur->setPseudo($pseudo);
    $utilisateur->setExputil(0);
    $utilisateur->setNiveauutil(0);
    $utilisateur->setDescriptif($_POST["desc"]);
    if ($_POST["genre"] == "homme") {
        $utilisateur->setGenre(0);
    } else if ($_POST["genre"] == "femme") {
        $utilisateur->setGenre(1);
    }
    if ($_POST["statut"] == "Cherche une équipe") {
        $utilisateur->setStatut(0);
    } else if ($_POST["statut"] == "Ne cherche pas d'équipe") {
        $utilisateur->setStatut(1);
    }
    $utilisateur->setDate($date);
    $datej = date("Y-m-d");
    $utilisateur->setDatej($datej);
    $utilisateur->setMdp($_POST["password"]);
    $utilisateur->setMail($_POST["mail"]);
    $utilisateur->setIdequipe("");
    $utilisateur->setIdrang(3);
    $utilisateur->setIdville($idville);
    if($util=$result->db_insertUtilisateur($utilisateur)) {
		$media->setId_utilisateur($util);
        $_SESSION["messageOK"] = "Inscription valid&eacute;e !";
        $_SESSION["vue"]       = "_validinscription";
    } else {
        $_SESSION["messageKO"] = "Erreur pendant l'inscription, veuillez prendre contact !";
    }
    $resultmedia->db_updateMediaUtilisateur($media);
}


if (isset($_POST["todo_form_equipe"]) && $_POST["todo_form_equipe"] == "valid_equipe") {
    $result = new EquipeManager($connexion);
    $resultmedia = new MediaManager($connexion);
    $resultutilisateur = new UtilisateurManager($connexion);
    if (!isset($_POST["pseudo"]) || $_POST["pseudo"] == "") {
        $_SESSION["messageKO"] = "Nom d'équipe Obligatoire";
        header('location:../index.php');
        exit;
    }
    $resultatsequipe = $resultutilisateur->db_getUtilisateurByIdEquipe($_SESSION["id"]);
    if ($resultatsequipe->num_rows) {
        $_SESSION["messageKO"] = "Vous avez déja une equipe";
        header("Location:../index.php");
        exit;
    }
    if (!isset($_POST["type"]) || $_POST["type"] == "") {
        $_SESSION["messageKO"] = "Type d'équipe Obligatoire";
        header('location:../index.php');
        exit;
    }
    $resultats = $result->db_getEquipePseudo($_POST["pseudo"]);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Equipe existant";
        header("Location:../index.php");
        exit;
    }
    $pseudo      = strtolower($_POST["pseudo"]);
    $media       = new Media(array());
    mkdir('../dossierequipe/' . $pseudo);
    mkdir('../dossierequipe/' . $pseudo . '/video');
    mkdir('../dossierequipe/' . $pseudo . '/photo');
    if (isset($_FILES["profil"]["name"]) && $_FILES["profil"]["name"] != "") {
        
        $ext       = $_FILES["profil"]["name"];
        $extension = pathinfo($ext, PATHINFO_EXTENSION);
        $tableau   = array(
            "JPG",
            "jpg",
            "PNG",
            "png",
            "jpeg",
            "JPEG"                  
        );
        switch ($_FILES["profil"]["error"]) {
            case 1:
                $_SESSION["messageKO"] = " La taille du profil téléchargé est trop grosse!";
                break;
            case 2:
                $_SESSION["messageKO"] = "La taille du profil téléchargé est trop grosse";
                break;
            case 3:
                $_SESSION["messageKO"] = " Le profil n'a été que partiellement téléchargé. ";
                break;
            case 4:
                $_SESSION["messageKO"] = "Aucun profil n'a été téléchargé. ";
                break;
            case 6:
                $_SESSION["messageKO"] = "Un dossier temporaire est manquant.";
                break;
            case 7:
                $_SESSION["messageKO"] = "Échec de l'écriture du profil sur le disque";
        }
        if (in_array($extension, $tableau)) {
            $media->setNom($ext);
            $media->setType($extension);
            $media->setTaille($_FILES['profil']['size']);
            if (!move_uploaded_file($_FILES["profil"]["tmp_name"], '../dossierequipe/' . $pseudo . "/photo/" . $_FILES["profil"]["name"])) {
                    trace("Upload du profil " . $_FILES["profil"]["name"] . "échouée");
                    $_SESSION["messageKO"] = "Photo non uploader";
            } else {
                    $media->setChemin("dossierequipe/" . $pseudo . "/photo/" . $_FILES['profil']['name']);
            }
        } else {
            $_SESSION["messageKO"] = "Mauvaise Extension";
            trace("Upload du profil " . $_FILES["profil"]["name"] . "échouée (mauvaise extension)");
        }
    } else {
        $_SESSION["messageKO"] = "Photo obligatoire";
    }
    $id_media=$resultmedia->db_insertMediaEquipeCreation($media);
    $media->setId($id_media);
    $equipe = new Equipe(array());
    $equipe->setPseudo($_POST["pseudo"]);
    $equipe->setNiveau(0);
    $equipe->setExp(0);
    $equipe->setDescriptif($_POST["desc"]);
    if ($_POST["statut"] == "Cherche des joueurs") {
        $equipe->setStatut(1);
    } else if ($_POST["statut"] == "Ne cherche pas de joueurs") {
        $equipe->setStatut(0);
    }
    $datej = date("Y-m-d");
    $equipe->setDatej($datej);
    $equipe->setType($_POST["type"]);
    $equipe->setChefequipe($_SESSION["id"]);
    $equipe->setPhoto($id_media);
    $equipe2=$result->db_insertEquipe($equipe);
    $equipeutil=$media->setIdequipe($equipe2);
    $media->setId($_SESSION["id"]);
    $resultmedia->db_updateMediaEquipe($media);
    $resultutilisateur->db_updateUtilisateurEquipe($equipe2,$_POST["idutil"]);
    $_SESSION["equipe"] = $equipe2;
    $_SESSION["vue"]="_profil";
    header("Location: ../index.php");
    exit;
}

if (isset($_POST["todo_form_connexion"]) && $_POST["todo_form_connexion"] == "valid_connexion") {
    $pseudo = strtolower($_POST["pseudo"]);
    $result = new UtilisateurManager($connexion);
    $resultequipe = new EquipeManager($connexion);
    if (!isset($_POST["pseudo"]) || $_POST["pseudo"] == "") {
        $_SESSION["messageKO"] = "pseudo Obligatoire";
        $_SESSION["pseudo"]    = "";
        header("Location: ../index.php");
        exit;
    }
    
    $resultats = $result->db_getUtilisateurRole($pseudo, $_POST["password"]);
    if ($resultats->num_rows) {
        $row_user           = $resultats->fetch_assoc();
		$_SESSION["id"]     = "";
        $_SESSION["id"]     = $row_user["idutilisateur"];
        $_SESSION["pseudo"] = $row_user["pseudo"];
        $_SESSION["rang"]   = $row_user["titre"];
        $_SESSION["vue"]    = "_profil";
        $_SESSION["equipe"] = $row_user["id_equipe"];
        header("Location: ../index.php");
        exit;
    } else {
        $_SESSION["messageOK"] = "Identification incorrect";
        header("Location: ../vues/index.php");
        exit;
    }
}

if (isset($_POST["todo_form_modo"]) && $_POST["todo_form_modo"] == "valid_modo") {
    $result = new UtilisateurManager($connexion);
    $utilisateur = new Utilisateur(array());
    $utilisateur->setId($_POST["utilisateur"]);
    $utilisateur->setIdrang($_POST["rang"]);
    $result->db_updateUtilisateurRole($utilisateur);
    $_SESSION["messageOK"] = "Utilisateur Modifier !";
    header('location:../index.php');
    exit;
}


if (isset($_POST["todoFormNavigation"]) && $_POST["todoFormNavigation"] == "navigate") {
    if (isset($_POST["vue"]) && !empty($_POST["vue"])) {
        $_SESSION["vue"] = "_" . decrypt($_POST["vue"], 'DISII28');
        $_SESSION["autre"] = $_POST["parametre1"];
    }
    if (isset($_POST["parametre2"]) && !empty($_POST["parametre2"])) {
        $_SESSION["autre1"] = $_POST["parametre2"];
    } else {
        $_SESSION["autre1"] = "";
    }
    header("Location: ../index.php");
    exit;
}
if (isset($_POST["todo_form_upload"]) && $_POST["todo_form_upload"] == "valid_upload") {
    if (isset($_FILES["profil"]["name"]) && $_FILES["profil"]["name"] != "") {
        $ext       = $_FILES["profil"]["name"];
        $extension = pathinfo($ext, PATHINFO_EXTENSION);
        $tableau   = array(
            "JPG",
            "jpg",
            "PNG",
            "png",
            "jpeg",
            "JPEG",
            "gif",
            "GIF"
        );
        switch ($_FILES["profil"]["error"]) {
            case 1:
                $_SESSION["messageKO"] = " La taille du profil téléchargé est trop grosse!";
                break;
            case 2:
                $_SESSION["messageKO"] = "La taille du profil téléchargé est trop grosse";
                break;
            case 3:
                $_SESSION["messageKO"] = " Le profil n'a été que partiellement téléchargé. ";
                break;
            case 4:
                $_SESSION["messageKO"] = "Aucun profil n'a été téléchargé. ";
                break;
            case 6:
                $_SESSION["messageKO"] = "Un dossier temporaire est manquant.";
                break;
            case 7:
                $_SESSION["messageKO"] = "Échec de l'écriture du profil sur le disque";
        }
        if (in_array($extension, $tableau)) {
            if (count(glob("../upload/*@" . $_FILES['profil']['name'])) > 0) {
                $_SESSION["messageKO"] = "profil existant";
                trace("Upload du profil " . $_FILES["profil"]["name"] . "échouée (profil Existant)");
            } else {
                $id = uniqid();
                if (!move_uploaded_file($_FILES["profil"]["tmp_name"], '../upload/' . $id . "@" . $_FILES["profil"]["name"])) {
                    trace("Upload du profil " . $_FILES["profil"]["name"] . "échouée");
                    $_SESSION["messageKO"] = "profil non uploader";
                }
                imagethumb('../upload/' . $_FILES["profil"]["name"], '../upload/thumb/' . $id . "@" . $_FILES["profil"]["name"], $max_size = 400, $expand = TRUE, $square = FALSE);
                imagethumb('../upload/' . $id . "@" . $_FILES["profil"]["name"], '../upload/thumb/' . $id . "@thumb_" . $_FILES["profil"]["name"], $max_size = 400, $expand = TRUE, $square = TRUE);
                $_SESSION["messageOK"] = "profil envoyer";
            }
        } else {
            $_SESSION["messageKO"] = "Mauvaise Extension";
            trace("Upload du profil " . $_FILES["profil"]["name"] . "échouée (mauvaise extension)");
            
        }
    }
}
if (isset($_POST["todo_form_modif"]) && $_POST["todo_form_modif"] == "valid_modif") {
    if (!isset($_POST["login"]) || $_POST["login"] == "") {
        $_SESSION["messageKO"] = "Erreur de Login";
        $_SESSION["login"]     = "";
        trace("Erreur Login");
        exit;
    }
    db_updateInternaute($_POST["id"], $_POST["login"], $_POST["password"], $_POST["mail"], $_POST["nom"]);
    $_SESSION["messageOK"] = "Utilisateur Modifier !";
    header('location:../index.php');
    exit;
}

if (isset($_POST["todo_form_amis"]) && $_POST["todo_form_amis"] == "valid_amis") {
    $resultamis = new AmisManager($connexion);
    $amis = new Amis(array());
    $resultats = $resultamis->db_getAmis($_POST["idutilisateur"],$_POST["idutilisateur2"]);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Demande d'amis en cour";
        header("Location:../index.php");
        exit;
    }
    $resultats = $resultamis->db_getAmis($_POST["idutilisateur2"],$_POST["idutilisateur"]);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Demande d'amis en cour";
        header("Location:../index.php");
        exit;
    }
    $amis->setId_utilisateur($_POST["idutilisateur"]);
    $amis->setId_utilisateur2($_POST["idutilisateur2"]);
    $amis->setEtat(0);
    if(!$resultamis->db_insertAmis($amis)){
    $_SESSION["messageKO"] = "Erreur de demande d'amis";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Demande envoyer";
    }

}

if (isset($_POST["todo_form_retirer_amis"]) && $_POST["todo_form_retirer_amis"] == "valid_retirer_amis") {
    $resultamis = new AmisManager($connexion);
    $amis = new Amis(array());
    $resultats = $resultamis->db_getAmis($_POST["idutilisateur"],$_POST["idutilisateur2"]);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Demande d'amis en cour";
        header("Location:../index.php");
        exit;
    }
    $resultats = $resultamis->db_getAmis($_POST["idutilisateur2"],$_POST["idutilisateur"]);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Demande d'amis en cour";
        header("Location:../index.php");
        exit;
    }
    $amis->setIdutilisateur($_POST["idutilisateur"]);
    $amis->setIdutilisateur2($_POST["idutilisateur2"]);
    $amis->setEtat(0);
    if(!$resultamis->db_insertAmis($amis)){
    $_SESSION["messageKO"] = "Erreur de demande d'amis";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Demande envoyer";
    }

}

if (isset($_POST["todo_form_team"]) && $_POST["todo_form_team"] == "valid_team") {
    $resultteam = new EquipeUtilManager($connexion);
    $equipe = new EquipeUtil(array());
    $resultats = $resultteam->db_getEquipeUtilId($_POST["idutilisateur"]);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Invitation en cour";
        header("Location:../index.php");
        exit;
    }
    $equipe->setId_utilisateur($_POST["idutilisateur"]);
    $equipe->setId_equipe($_POST["idequipe"]);
    if(!$resultteam->db_insertEquipeUtil($equipe)){
    $_SESSION["messageKO"] = "Erreur de d'équipe";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Demande envoyer";
    }

}

if (isset($_POST["todo_form_teamdel"]) && $_POST["todo_form_teamdel"] == "valid_teamdel") {
    $resultteam = new EquipeUtilManager($connexion);
    $equipe = new EquipeUtil(array());
    $equipe->setId_utilisateur($_POST["idutilisateur"]);
    $equipe->setId_equipe($_POST["idequipe"]);
    if(!$resultteam->db_deletetEquipeUtil($equipe)){
    $_SESSION["messageKO"] = "Erreur de demande d'amis";
    header('location:../index.php');
    exit;
    } else {
    $_SESSION["messageOK"] = "Suppresion effectuée";
    }

}
if (isset($_POST["todo_form_accepte_amis"]) && $_POST["todo_form_accepte_amis"] == "valid_accepte_amis") {
    $resultamis = new AmisManager($connexion);
    $amis = new Amis(array());
    $amis->setId_utilisateur($_POST["idutilisateur"]);
    $amis->setId_utilisateur2($_POST["idutilisateur2"]);
    $amis->setEtat(1);
    if(!$resultamis->db_updateAmis($amis)){
    $_SESSION["messageKO"] = "Erreur de demande d'amis";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Demande Accepter";
    }

}

if (isset($_POST["todo_form_refuse_amis"]) && $_POST["todo_form_refuse_amis"] == "valid_refuse_amis") {
    $resultamis = new AmisManager($connexion);
    $amis = new Amis(array());
    $amis->setId_utilisateur($_POST["idutilisateur"]);
    $amis->setId_utilisateur2($_POST["idutilisateur2"]);
    $amis->setEtat(1);
    if(!$resultamis->db_delAmis($amis)){
    $_SESSION["messageKO"] = "Erreur de demande d'amis";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Demande Accepter";
    }

}


if (isset($_POST["todo_form_mediautil"]) && $_POST["todo_form_mediautil"] == "valid_mediautil") {
if (isset($_FILES["fichier"]["name"]) && $_FILES["fichier"]["name"] != "") {
        $pseudo = $_SESSION["pseudo"];
        $resultmedia = new MediaManager($connexion);
        $media       = new Media(array());
        $ext       = $_FILES["fichier"]["name"];
        $extension = pathinfo($ext, PATHINFO_EXTENSION);
        $tableau   = array(
            "JPG",
            "jpg",
            "PNG",
            "png",
            "jpeg",
            "JPEG",
            "avi",
            "AVI",
            "mp4",
            "MP4",
            "mpeg-4",
            "MPEG-4"                  
        );
        switch ($_FILES["fichier"]["error"]) {
            case 1:
                $_SESSION["messageKO"] = " La taille du profil téléchargé est trop grosse!";
                break;
            case 2:
                $_SESSION["messageKO"] = "La taille du profil téléchargé est trop grosse";
                break;
            case 3:
                $_SESSION["messageKO"] = " Le profil n'a été que partiellement téléchargé. ";
                break;
            case 4:
                $_SESSION["messageKO"] = "Aucune Photo n'a été téléchargé.";
                break;
            case 6:
                $_SESSION["messageKO"] = "Un dossier temporaire est manquant.";
                break;
            case 7:
                $_SESSION["messageKO"] = "Échec de l'écriture du profil sur le disque";
        }
        if (in_array($extension, $tableau)) {
            if($extension=="JPG" || $extension=="jpg" || $extension=="PNG" || $extension=="png" || $extension=="jpeg" || $extension=="JPEG"){
            $media->setIdutilisateur($_SESSION["id"]);
            $media->setNom($ext);
            $media->setType($extension);
            $media->setTaille($_FILES['fichier']['size']);
            if (!move_uploaded_file($_FILES['fichier']["tmp_name"], '../dossierjoueur/' . $pseudo . "/photo/" . $_FILES["fichier"]["name"])) {
                    trace("Upload du profil " . $_FILES['fichier']["name"] . "échouée");
                    $_SESSION["messageKO"] = "Photo non uploader";
                } else {
                    $media->setChemin("dossierjoueur/" . $pseudo . "/photo/" . $_FILES['fichier']['name']);
                }
        } else {
            $media->setIdutilisateur($_SESSION["id"]);
            $media->setNom($ext);
            $media->setType($extension);
            $media->setTaille($_FILES['fichier']['size']);
            if (!move_uploaded_file($_FILES['fichier']["tmp_name"], '../dossierjoueur/' . $pseudo . "/video/" . $_FILES["fichier"]["name"])) {
                    trace("Upload du profil " . $_FILES['fichier']["name"] . "échouée");
                    $_SESSION["messageKO"] = "Video non uploader";
                } else {
                    $media->setChemin("dossierjoueur/" . $pseudo . "/video/" . $_FILES['fichier']['name']);
                }
        }  
    } else {
        $_SESSION["messageKO"] = "Erreur chargement fichier";
    }
    $resultmedia->db_insertMediaUtilisateur($media);

}
}
if (isset($_POST["todo_form_jeu"]) && $_POST["todo_form_jeu"] == "valid_jeu") {
    if (!isset($_POST["nomjeu"]) || $_POST["nomjeu"] == "") {
        $_SESSION["messageKO"] = "Nom jeu Obligatoire";
        header('location:../index.php');
        exit;
        
    }
    if (!isset($_POST["descjeu"]) || $_POST["descjeu"] == "") {
        $_SESSION["messageKO"] = "Description Obligatoire";
        header('location:../index.php');
        exit;
    }
    $result      = new JeuManager($connexion);
    $resultats = $result->db_getJeuNom($_POST["nomjeu"]);
    if ($resultats->num_rows) {
        $_SESSION["messageKO"] = "Jeu existant";
        header("Location:../index.php");
        exit;
    }
    $resultjeu = new JeuManager($connexion);
    $resultgenre = new GenreManager($connexion);
    $jeu =  new Jeu(array());
    if (isset($_FILES["jeu"]["name"]) && $_FILES["jeu"]["name"] != "") {
            $resultmedia = new MediaManager($connexion);
            $media       = new Media(array());
            $ext       = $_FILES["jeu"]["name"];
            $extension = pathinfo($ext, PATHINFO_EXTENSION);
            $tableau   = array(
                "JPG",
                "jpg",
                "PNG",
                "png",
                "jpeg",
                "JPEG",
            );
            switch ($_FILES["jeu"]["error"]) {
                case 1:
                    $_SESSION["messageKO"] = " La taille du profil téléchargé est trop grosse!";
                    break;
                case 2:
                    $_SESSION["messageKO"] = "La taille du profil téléchargé est trop grosse";
                    break;
                case 3:
                    $_SESSION["messageKO"] = " Le profil n'a été que partiellement téléchargé. ";
                    break;
                case 4:
                    $_SESSION["messageKO"] = "Aucune Photo n'a été téléchargé.";
                    break;
                case 6:
                    $_SESSION["messageKO"] = "Un dossier temporaire est manquant.";
                    break;
                case 7:
                    $_SESSION["messageKO"] = "Échec de l'écriture du profil sur le disque";
            }
            if (in_array($extension, $tableau)) {
                $media->setNom($ext);
                $media->setType($extension);
                $media->setTaille($_FILES['jeu']['size']);
                if (!move_uploaded_file($_FILES['jeu']["tmp_name"], '../imagejeu/'.$_FILES["jeu"]["name"])) {
                        trace("Upload du profil " . $_FILES['jeu']["name"] . "échouée");
                        $_SESSION["messageKO"] = "Photo non uploader";
                    } else {
                        $media->setChemin("imagejeu/" . $_FILES['jeu']['name']);
                    }
        } else {
            $_SESSION["messageKO"] = "Erreur mauvaise extension";
        }
        $id_media=($resultmedia->db_insertMediaUtilisateurInscription($media));

    }
    $resultgenre = new GenreManager($connexion);
    $jeu->setId_media($id_media);
    $jeu->setId_genre($_POST["genre"]);
    $jeu->setNom($_POST["nomjeu"]);
    $jeu->setDescriptif($_POST["descjeu"]);
    $media->setIdjeu($resultjeu->db_insertJeu($jeu));
    $media->setId($id_media);
    $resultmedia->db_updateMediaJeu($media);
}


if (isset($_POST["todoFormDelMedia"]) && $_POST["todoFormDelMedia"] == "delmedia") {
    $resultmedia = new MediaManager($connexion);
    $media =  new Media(array());
    $media->setID($_POST["iddel"]);
    if(!$resultmedia->db_deleteMedia($media)){
    $_SESSION["messageKO"] = "Suppression non effectuée";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Suppresion effectuée";
    }

}


if (isset($_POST["todoFormModifUtil"]) && $_POST["todoFormModifUtil"] == "ModifUtil") {
    $resultutilisateur = new UtilisateurManager($connexion);
    $utilisateur =  new Utilisateur(array());
    $utilisateur->setID($_POST["idmodif"]);
    if(!$resultmedia->db_updateUtilisateur($utilisateur)){
    $_SESSION["messageKO"] = "Suppression non effectuée";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Suppresion effectuée";
    }

}

if (isset($_POST["todo_form_comm"]) && $_POST["todo_form_comm"] == "valid_comm") {
    $resultcommentaire = new CommentaireManager($connexion);
    $comm =  new Commentaire(array());
    $comm->setData($_POST["commentaire"]);
    $comm->setId_utilisateur($_POST["idutilisateur"]);
    $comm->setId_post($_POST["idpost"]);
    if(!$resultcommentaire->db_insertCommentaire($comm)){
    $_SESSION["messageKO"] = "Commentaire non posté";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Commentaire envoyer";
    }

}

if (isset($_POST["todo_form_updatecomm"]) && $_POST["todo_form_updatecomm"] == "update_comm") {
    $resultcommentaire = new CommentaireManager($connexion);
    $comm =  new Commentaire(array());
    $comm->setData($_POST["commentaire"]);
    $comm->setId($_POST["idcomm"]);
    if(!$resultcommentaire->db_updateCommentaire($comm)){
    $_SESSION["messageKO"] = "Erreur commenaire non modifié";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Commentaire modifié";
    }

}

if (isset($_POST["todo_form_post"]) && $_POST["todo_form_post"] == "valid_post") {
    $resultpost = new PostManager($connexion);
    $post       =  new Post(array());
    $resultmedia = new MediaManager($connexion);
    $media       = new Media(array());
    if (isset($_FILES["post"]["name"]) && $_FILES["post"]["name"] != "") {
        $ext       = $_FILES["post"]["name"];
        $extension = pathinfo($ext, PATHINFO_EXTENSION);
        $tableau   = array(
            "JPG",
            "jpg",
            "PNG",
            "png",
            "jpeg",
            "JPEG"                  
        );
        switch ($_FILES["post"]["error"]) {
            case 1:
                $_SESSION["messageKO"] = " La taille du post téléchargé est trop grosse!";
                break;
            case 2:
                $_SESSION["messageKO"] = "La taille du post téléchargé est trop grosse";
                break;
            case 3:
                $_SESSION["messageKO"] = " Le post n'a été que partiellement téléchargé. ";
                break;
            case 4:
                $_SESSION["messageKO"] = "Aucun post n'a été téléchargé. ";
                break;
            case 6:
                $_SESSION["messageKO"] = "Un dossier temporaire est manquant.";
                break;
            case 7:
                $_SESSION["messageKO"] = "Échec de l'écriture du post sur le disque";
        }
        if (in_array($extension, $tableau)) {
            $result      = new UtilisateurManager($connexion);
            $resultatsutilisateur = $result->db_getUtilisateurById($_POST["idutilisateurpost"]);
            while ($row_post=$resultatsutilisateur->fetch_array(MYSQLI_ASSOC)) {
            $pseudo=$row_post["pseudo"];
            }
            $media->setNom($ext);
            $media->setType($extension);
            $media->setId_utilisateur($_POST["idutilisateurpost"]);
            $media->setTaille($_FILES['post']['size']);
            if (!move_uploaded_file($_FILES["post"]["tmp_name"], '../dossierjoueur/' . $pseudo . "/photo/" . $_FILES["post"]["name"])) {
                    trace("Upload du post " . $_FILES["post"]["name"] . "échouée");
                    $_SESSION["messageKO"] = "Photo non uploader";
                } else {
                    $media->setChemin("dossierjoueur/" . $pseudo . "/photo/" . $_FILES['post']['name']);
                }
            } else {
                $_SESSION["messageKO"] = "Mauvaise Extension";
                trace("Upload du post " . $_FILES["post"]["name"] . "échouée (mauvaise extension)");
            }
            $id_media=$resultmedia->db_insertMediaUtilisateur($media);
            $post->setId_media($id_media);
            $post->setTitre($_POST["titrepost"]);
            $post->setContenu($_POST["contenupost"]);
            $post->setId_utilisateur($_POST["idutilisateurpost"]);
            //var_dump($post);
            //exit;
            if(!$resultpost->db_insertPostUtilisateurMedia($post)){
            $_SESSION["messageKO"] = "Post non publié";
            header('location:../index.php');
            exit;
            } else {
           $_SESSION["messageOK"] = "Post publié";
        }
    } else {
        $post->setTitre($_POST["titrepost"]);
        $post->setContenu($_POST["contenupost"]);
        $post->setId_utilisateur($_POST["idutilisateurpost"]);
        if(!$resultpost->db_insertPostUtilisateurNoMedia($post)){
        $_SESSION["messageKO"] = "Post non publié";
        header('location:../index.php');
        exit;
        } else {
       $_SESSION["messageOK"] = "Post publié";
        }
    }
    

}

if (isset($_POST["todo_form_refequipe"]) && $_POST["todo_form_refequipe"] == "update_refequipe") {
    $result = new EquipeUtilManager($connexion);
    if(!$result->db_deleteEquipeUtil($_POST["idutil"],$_POST["idequipe"])){
    $_SESSION["messageKO"] = "Erreur";
    header('location:../index.php');
    exit;
    } else {
       $_SESSION["messageOK"] = "Candidature refusé";
    }

}

if (isset($_POST["todo_form_accequipe"]) && $_POST["todo_form_accequipe"] == "update_accequipe") {
    $result = new EquipeUtilManager($connexion);
    $resultutil = new UtilisateurManager($connexion);
    $test=$resultutil->db_testUtilisateurById($_POST["idutil"]);
    if ($test->num_rows) {
        $_SESSION["messageKO"] = "l'utilisateur a déja une équipe";
        header("Location:../index.php");
        exit;
    }
    $result->db_updateEquipeUtil($_POST["idutil"],$_POST["idequipe"]);
    $resultutil->db_updateUtilisateurEquipe($_POST["idequipe"],$_POST["idutil"]);
    $_SESSION["messageKO"] = "Erreur";
    header('location:../index.php');
    exit;
    }

if (isset($_POST["todo_form_delequipe"]) && $_POST["todo_form_delequipe"] == "del_equipe") {
    $resultmedia = new MediaManager($connexion);
    $result = new EquipeManager($connexion);
    $resultutil = new UtilisateurManager($connexion);
    $resultequiputil = new EquipeUtilManager($connexion);
    $resultequiputil->db_deleteEquipeUtil2($_POST["idequipe"]);
    $resultutil->db_delUtilisateurEquipe($_POST["idequipe"]);
    $resultmedia->db_updateMediaEquipeDel($_POST["idequipe"]);
    $result->db_delEquipeNull($_POST["idequipe"]);
    $result->db_delEquipe($_POST["idequipe"]);
    $_SESSION["vue"]="_profil";
    $_SESSION["equipe"]="";
    header('location:../index.php');
    exit;
    }

    if (isset($_POST["todo_form_ragequit"]) && $_POST["todo_form_ragequit"] == "ragequit_equipe") {
    $resultutil = new UtilisateurManager($connexion);
    $resultequiputil = new EquipeUtilManager($connexion);
    $resultutil->db_delUtilisateurEquipeQuit($_POST["idequipe"],$_POST["idutil"]);
    $_SESSION["vue"]="_profil";
    $_SESSION["equipe"]="";
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

    if (isset($_POST["todo_form_conv"]) && $_POST["todo_form_conv"] == "conv_util") {
    $messageManager=new MessageManager($connexion);
    $util1=$_POST["pseudoutil"];
    $util2=$_POST["idutil"];
    $data="Souhaite discuter avec vous ";
    $messageManager->db_insertMessage($util1,$util2,$data);
    $_SESSION["vue"]="_profil_messages";
    }



if (isset($_POST["todo_form_supppost"]) && $_POST["todo_form_supppost"] == "valid_supppost") {
    $result = new PostManager($connexion);
    $resultcomm = new CommentaireManager($connexion);
    $resultcomm->db_DelCommentaire($_POST["idpost"]);
    $result->db_DelPost($_POST["idpost"],$_POST["idutilisateurpost"]);
    $_SESSION["messageOK"] = "Post Supprimer!";
    header('location:../index.php');
    exit;
}

if (isset($_POST["todo_form_searchplayer"]) && $_POST["todo_form_searchplayer"] == "valid_searchplayer") {
    $_SESSION["search"] = $_POST["search"];
    header('location:../index.php');
    exit;
}

if (isset($_POST["todo_form_searchjeu"]) && $_POST["todo_form_searchjeu"] == "valid_searchjeu") {
    $_SESSION["search"] = $_POST["searchjeu"];
    header('location:../index.php');
    exit;
}


?>


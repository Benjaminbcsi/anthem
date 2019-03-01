<?php
session_start();
require_once __DIR__ . "./model/_model.php";

if (isset($_POST['source']) && $_POST['source'] == "colosse_build") {
	$result=new BuildsManager($connexion);
	$builds = new Builds(array());
	$builds->setNom("test");
	$builds->setId_user($_SESSION["id"]);
	$builds->setId_javelin($_POST["id_javelin"]);
	$builds->setId_soutient(1);
	$builds->setId_explosion(1);
	$builds->setId_concentration(1);
	if($build_id= $result->db_addBuilds($builds)) {
		foreach ($_POST['weapons'] as $weapon) {
			$result_build=new BuildarmesManager($connexion);
			$builds_arme = new Buildarmes(array());
			$builds_arme->setId_build($build_id);
			$builds_arme->setId_arme($weapon);
			if(!$result_build->db_addBuildsArmes($builds_arme)){
				$_SESSION["messageKO"] = "Erreur pendant l'enregistrement des armes, veuillez réessayer !";
			}
		}
	} else {
			$_SESSION["messageKO"] = "Erreur pendant l'enregistrement du builds, veuillez réessayer !";
	}

}

?>

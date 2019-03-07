<?php
session_start();
require_once __DIR__ . "./model/_model.php";

if (isset($_POST['source']) && $_POST['source'] == "colosse_build") {
	$result=new BuildsManager($connexion);
	$builds = new Builds(array());
	if ($_POST['nameBuild']) {
		echo false;
	}
	$builds->setNom($_POST['nameBuild']);
	$builds->setId_user($_SESSION["id"]);
	$builds->setId_javelin($_POST["id_javelin"]);
	$builds->setId_soutient($_POST['soutient']);
	$builds->setId_assaut($_POST['assaut1']);
	$builds->setId_concentration($_POST['assaut2']);
	if($build_id= $result->db_addBuilds($builds)) {
		foreach ($_POST['weapons'] as $weapon) {
			$result_build=new BuildarmesManager($connexion);
			$builds_arme = new Buildarmes(array());
			$builds_arme->setId_build($build_id);
			$builds_arme->setId_arme($weapon);
			if(!$result_build->db_addBuildsArmes($builds_arme)){
				$_SESSION["messageKO"] = "Erreur pendant l'enregistrement des armes, veuillez réessayer !";
				echo false;
			}
		}
	} else {
			$_SESSION["messageKO"] = "Erreur pendant l'enregistrement du builds, veuillez réessayer !";
			echo false;
	}
	echo true;
}

if (isset($_POST['source']) && $_POST['source'] == "see_arme") {
	$result=new ArmesManager($connexion);
	$resultats=$result->db_getWeaponbyid($_POST['id_arme']);
	$row_armes=$resultats->fetch_array(MYSQLI_ASSOC);
	$resultType=new TypeManager($connexion);
	$resultatsType=$resultType->db_getType($row_armes['id_type']);
	$row_type=$resultatsType->fetch_array(MYSQLI_ASSOC);
	$type= new Type($row_type);
	$row_armes['id_type'] = $type->getData();
	echo json_encode($row_armes);
}


if (isset($_POST['source']) && $_POST['source'] == "see_assaut") {
	$result=new AssautManager($connexion);
	$resultType=new TypeassautManager($connexion);
	$resultStatut=new StatutManager($connexion);
	$resultCombo=new TypecomboManager($connexion);
	//Resultat assaut
	$resultats=$result->db_getAssautbyid($_POST['id_arme']);
	$row_assaut=$resultats->fetch_array(MYSQLI_ASSOC);
	//Resultat type
	$resultatsType=$resultType->db_getType($row_assaut['id_type']);
	$row_type_assaut=$resultatsType->fetch_array(MYSQLI_ASSOC);
	$typeassaut= new Typeassaut($row_type_assaut);
	$row_assaut['id_type'] = $typeassaut->getDesignation();
	//Resultat statut
	if ($row_assaut['id_statut'] != null || $row_assaut['id_statut'] != 0) {
		$resultatsStatut=$resultStatut->db_getStatut($row_assaut['id_statut']);
		$row_statut=$resultatsStatut->fetch_array(MYSQLI_ASSOC);
		$statut= new Statut($row_statut);
		$row_assaut['id_statut'] = $statut->getElement();
	}
	//Resultat combo
	if ($row_assaut['id_combo'] != null || $row_assaut['id_combo'] != 0) {
		$resultatsCombo=$resultCombo->db_getTypecombo($row_assaut['id_combo']);
		$row_combo=$resultatsCombo->fetch_array(MYSQLI_ASSOC);
		$combo= new Typecombo($row_combo);
		$row_assaut['id_combo'] = $combo->getCombo_data();
	}
	echo json_encode($row_assaut);
}

if (isset($_POST['source']) && $_POST['source'] == "see_soutient") {
	$result=new SoutientManager($connexion);
	$resultats=$result->db_getSoutientbyid($_POST['id_soutient']);
	$row_soutient=$resultats->fetch_array(MYSQLI_ASSOC);
	echo json_encode($row_soutient);
}

if (isset($_POST['source']) && $_POST['source'] == "see_composant") {
	$result=new ComposantManager($connexion);
	$resultats=$result->db_getComposantbyid($_POST['id_composant']);
	$row_composant=$resultats->fetch_array(MYSQLI_ASSOC);
	echo json_encode($row_composant);
}
?>

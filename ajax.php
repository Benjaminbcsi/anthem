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
	$builds->setId_assaut(1);
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
	$resultats=$result->db_getAssautbyid($_POST['id_arme']);
	$row_assaut=$resultats->fetch_array(MYSQLI_ASSOC);
	$resultType=new TypeassautManager($connexion);
	$resultatsType=$resultType->db_getType($row_assaut['id_type']);
	$row_type_assaut=$resultatsType->fetch_array(MYSQLI_ASSOC);
	$typeassaut= new Typeassaut($row_type_assaut);
	$row_assaut['id_type'] = $typeassaut->getDesignation();
	echo json_encode($row_assaut);
}
?>

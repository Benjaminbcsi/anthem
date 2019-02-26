<?php // vue accès directe au requêtes AJAX en méthode POST
function safeData($data){
	$data=strip_tags($data); //Suppression des tags
	$data=htmlentities($data); // Suppression des entités HTML
	$data=stripslashes($data);//Suppression des slashs
	return $data;
}

if (isset($_POST["url"]) && $_POST["url"]!="") {
	//FAIT QUELQUE CHOSE D'INTELLIGENT
	echo file_get_contents("http://".safeData($_POST["url"]));
}
?>
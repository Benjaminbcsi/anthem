<?php

$read = __DIR__."/../config/config_db.conf";

$ini = parse_ini_file($read, true);

foreach ($ini as $key => $value) {
	define("_".$key, $value);	
}
$connexion=new mysqli(_DB_HOST,_DB_USER,_DB_PASSWORD,_DB_DATABASE,_DB_PORT);
if($connexion->connect_errno) {
	$_SESSION["error"]="1";
	trace("Erreur de connexion".$connexion->connect_errno.":".$connexion->connect_error);
	header("Location:./erreur.php");
	exit;

} else {
	$connexion->set_charset("utf8");
	$charset_query="SET 
character_set_results='utf8',
character_set_client='utf8',
character_set_connection='utf8',
character_set_database='utf8',
character_set_server='utf8'";
$connexion->query($charset_query);
}

?>
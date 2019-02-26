<?php
session_start();
require_once(__DIR__."/../model/db_init.php");
require_once(__DIR__."/../fonctions/fonctions.php");
require_once(__DIR__."/../controllers/_form_control.php");
require_once(__DIR__."/../fonctions/fonctions_images.php");
?>


<?php
	if
	(
		isset($_GET['todo']) &&
		isset($_GET['id']) &&
		$_GET['todo'] == "getjeu" &&
		trim($_GET['id']) != ""
	)
	{
		// sécu
		$id = $_GET['id'] + 1-1;
		
		$mngr = new JeuManager($connexion);
		$resp = $mngr->db_getJeuId($id);
		$tab = $resp->fetch_array(MYSQLI_ASSOC);
		if ($tab->num_rows > 0) {
			echo "<h1>ok</h1>";
		}
		else {
			echo "<h1>Ce jeu n'exite pas !</h1>";
		}
		/*
		$jeu = new Jeu($tab);
		
		echo "<h1>".$jeu.getId()."</h1>";
		*/
	}
	else
	{
		?>
		<h1>Vous n'êtes probablement pas sur la bonne page</h1>
		<?php
	}
?>
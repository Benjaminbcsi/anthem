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
		if ($resp->num_rows>0) {
			$tab = $resp->fetch_array(MYSQLI_ASSOC);
			$jeu = new Jeu($tab);
			// RÉCUPÉRER LA PHOTO DU JEUX
			$md_mngr = new MediaManager($connexion);
			$med_id = $jeu->getId_media();
			$md_resp = $md_mngr->db_getMediaIdMedia($med_id);
			if ($md_resp->num_rows>0) {
				$md_tab = $md_resp->fetch_array(MYSQLI_ASSOC);
				$profil_pic = new Media($md_tab);
				echo '<div class="modal_cover_container">';
				echo '<img src="'.$profil_pic->getChemin().'" class="modal_cover">';
				echo '</div>';
			}
			
			echo '<div class="modal_game_infos">';
			echo "<h1>".$jeu->getNom()."</h1>";
			
			// RÉCUPÉRER LE GENRE DU JEUX
			$genre_mngr = new GenreManager($connexion);
			$genre_id = $jeu->getId_genre();
			$genre_resp = $genre_mngr->db_getGenreId($genre_id);
			while($genre_tab=$genre_resp->fetch_array(MYSQLI_ASSOC)){
                $genre = new Genre($genre_tab);
				?>
                <h4><?php echo $genre->getGenre()?></h4>
			<?php } ?>
			<?php 
			echo "<h3>".$jeu->getDescriptif()."</h3>";
			echo '</div>';
		}else {
			echo "<h1>Ce jeu n'existe pas !</h1>";
		}
	}
	else
	{
		?>
		<h1>Vous n'êtes probablement pas sur la bonne page</h1>
		<?php
	}
	
	exit;
?>
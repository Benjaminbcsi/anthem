
<?php
if(isset($_SESSION["error"]) && $_SESSION["error"]=="1") {$_SESSION["messageKO"]=="Désoler le site rencontre des probleme Dans la vrais vie on revient bientot ! (le stagiaire a renverser sont café sur la machine)";} 

echo $_SESSION["messageKO"];
?>
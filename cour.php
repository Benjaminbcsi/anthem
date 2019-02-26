<?php
require_once "./fonctions/fonctions.php";
if(isset($_FILES["fichier_disii"]["name"]) && $_FILES["fichier_disii"]["name"]!="") {
	if ($_FILES["fichier_disii"]["error"]=="0") {
		move_uploaded_file($_FILES["fichier_disii"]["tmp_name"],'./upload/upload_'.$_FILES["fichier_disii"]["name"]);

	} switch ($_FILES["fichier_disii"]["error"]!="0") {
		case $_FILES["fichier_disii"]["error"]=="1":
		echo "Une erreur ";
		break;
		case $_FILES["fichier_disii"]["error"]=="2":
		echo "Une erreur est ";
		break;
		case $_FILES["fichier_disii"]["error"]=="3":
		echo "Une erreur est survenue ";
		break;
		case $_FILES["fichier_disii"]["error"]=="4":
		echo "Une erreur est survenue pendant ";
		break;
		case $_FILES["fichier_disii"]["error"]=="6":
		echo "Une erreur est survenue pendant le charg";
		break;
		case $_FILES["fichier_disii"]["error"]=="7":
		echo "Une erreur est survenue pendant le chargement";
		default:
		echo "Une erreur est survenue pendant le chargement";
		break;
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
		<title>Cours php - DiSii - 2017</title>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta name="author" content=""/>
		<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
		<script type="text/javascript" src="./js/fonctions.js"></script>
</head>
<body>
<div style="background-color: black;color: white;">
	<?php
	echo "Le DiSii c'est cool";
	// commentaire ligne //
	/*Commentaire 
	plusieur ligne*/
	$var="variable1";
	echo "<br/>";
	$Var="variable2";
	echo $var; ?>
	<br/>
	<?php
	echo $Var;
	?>
	<br/>
	<h1>Ma variable $var est = <?php echo $var; ?> </h1>
	<br/>
	<?php echo "Le contenu de ma variable \$Var est ".$Var." ! ";?>
	<br/>
	<?php
	$x=3;$y=2;echo $x + $y."<br/>";
	$x="3";$y="2";echo $x * $y."<br/>";
	$x = " global "; //par defaut les variable sont globales";
	function testVariable($parametre)
	{
		$parametre.=" modif&eacute;e";
		return $parametre;

	}
	echo testVariable($x)."<br/>";
	echo $x."<br/>";
	function testVariable2()
	{
		global $x;
		$x.=" modif&eacute;e";

	}
	testVariable2()."<br/>";
	echo $x."<br/>";
	function testVariable3()
	{
		static $i;
		$i++;
		$statique = "variable statique".$i;
		return $statique;

	}
	echo testVariable3()."<br/>";
	echo $statique."<br/>";
	var_dump($x);
	echo "<br/>";
	define("CONSTANTE1", "Test Constante");
	function print_constante(){
		echo CONSTANTE1."<br/>";
	}
	print_constante();

	?>
	<h2>Chaines de caractére</h2>
	<?php
	$chaine1="Le PHP c'est Super Chouette !";
	echo strlen($chaine1)."<br/>";
	echo str_word_count($chaine1)."<br/>";
	echo strrev($chaine1)."<br/>";
	echo strpos($chaine1, "PHP")."<br/>";
	echo str_replace("PHP", "php", $chaine1)."(";echo $chaine1.")<br/>";
	$auteur = "lovecraft";
	switch ($auteur) {
		case "lovecraft":
		echo "Votre auteur est ".$auteur."<br/>";
		break;
		case "tolkien":
		echo "Vous avez aussi bon gout";
		default:
		echo "c'est forcement un des deux !";
		break;
	}

	?>
	<h3>Tableaux</h3>
	<?php
	$auteur=array();
	$auteur[0]="VERNES";
	$auteur[1]="JORDAN";
	echo $auteur[0]."<br/>";
	echo "la longueur de mon tableaux est : ".count($auteur);
	for ($i=0;$i<count($auteur);$i++) {
		echo "l'auteur numéro".$i." est : ".$auteur[$i]."<br/>";
	}
	$auteurs = array(
		"VERNE" => "L'île mystérieuse",
		"JORDAN" => "La roue du temps",
		);
	$auteurs["tolkien"]="Le Seigneur Des Anneaux";
	foreach ($auteurs as $auteur => $titre) {
		echo "l'auteur de ".$titre." est ".$auteur."<br/>";
	}
	?>
	<pre><?php var_dump($auteur); ?></pre>
	<?php
	$auteurs=array(
		array(
			"NOM" =>"VERNE",
			"PRENOM" => "Jules",
			"Titre" => "L'île mystérieuse",
			"Mail" => "VerneJules@gmail.com",
			),
		array(
			"NOM" =>"JORDAN",
			"PRENOM" => "Robert",
			"Titre" => "La roue du temps",
			"Mail" => "Jordanrobert@gmail.com",
			),
		);
	echo $auteurs[0]["NOM"]." ".$auteurs[0]["PRENOM"]." à ecrit : ".$auteurs[0]["Titre"]."<br/>";
	?>
	<table border="1px">
	<tr>
		<th>ID</th>
		<?php foreach ($auteurs[0] as $index => $value)   {?>
		<?php
		echo "<th>".$index."</th>";
		 }?>
	</tr>
	<?php for ($i=0; $i < count($auteurs); $i++) { ?>
	<tr>
		<td><?php echo $i ?></td>
		<?php foreach ($auteurs[$i] as $value) { ?>
		<?php echo "<td>" .$value."</td>" ?>
		<?php } ?>
	</tr>
	<?php } ?>
	</table>
	<h2>Function Tableau</h2>
	<?php 
		/*
		echo afficheTableau($auteurs);
		sort($auteurs);
		echo afficheTableau($auteurs);
		rsort($auteurs);
		echo afficheTableau($auteurs);
		asort($auteurs[0]);
		echo afficheTableau($auteurs);
		ksort($auteurs[0]);
		*/
		echo afficheTableau($auteurs);
	?>
	<h2>Bataille NAVALE</h2>
	<?php 
	$x = 0;
	global $x;
    function jeux($char,$int)
    {              
        $variable = "$char$int";
        static $tableau = array('b4','b5','f2','g2','h2','g5','g6','g7','g8','g9');
        static $i ="b0"; ;
        if(preg_match("/^[a-i]$/", $char) AND preg_match("/^[1-9]$/", $int) )
        {
            if(in_array($variable,$tableau))
            {	
	          	if (stripos($i,$variable,true)) {
			    	$retour = "Vous Avez déja tirer la";
			    } else {
			    		global $x;
						$x++;
						$i.=",$variable";
				 		$retour = "touche";
				 		if ($x >= 10) {
				 			$retour = "Gagner";
				 		}
				    }
				}
            else
            {
                $retour = "loupe";
            }
        }
        else
        {
         $retour = "hors-jeu";
        }
   	return $retour;
    }
    ?> <br/> <?php
    echo jeux('b',5);
    ?> <br/> <?php
    echo jeux('b',4);
    ?> <br/> <?php
    echo jeux('b',5);
    ?> <br/> <?php
    echo jeux('f',2);
    ?> <br/> <?php
    echo jeux('g',2);
    ?> <br/> <?php
    echo jeux('h',2);
    ?> <br/> <?php
    echo jeux('g',5);
    ?> <br/> <?php
    echo jeux('g',6);
    ?> <br/> <?php
    echo jeux('g',7);
    ?> <br/> <?php
    echo jeux('g',8);
    ?>  <br/> <?php
    echo jeux('g',9);
    ?>
    <br/><br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<h2>Chargement Fichier</h2>
   <form name="form_upload" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="2097152"/>
    Fichier: <br/>
    <input type="file" name="fichier_disii"/>
    <input type="submit" name="valider"/>
   </form>
   </div>

<div style="background-color: green;color: white;"><pre>
<h2>Création/lecture de fichier</h2>
<?php
echo readfile("./js/fonctions.js")
?>
</pre>
<br/>
<?php
$monFichier=fopen("test.txt","w");
// w et w+: Ouverture en écriture, curseur en début de fichier .
// a et a+: Ouverture en écriture, curseur en fin de fichier .
// r ou r+: Ouverture en lécture uniquement .
fwrite($monFichier, "Une Premiére ligne\n");
fwrite($monFichier, "Une Seconde ligne\n");
fclose($monFichier);
echo readfile("test.txt")."<br/>";
$monFichier=fopen("test.txt","a");
fwrite($monFichier, "Une Troisieme ligne\n");
fclose($monFichier);
echo readfile("test.txt");

?>
<h2>Lecture fichier ligne par ligne</h2>
<?php
$monFichier=fopen("test.txt","r");
while (!feof($monFichier)) {
	echo fgets($monFichier)."<br/>---<br/>";
}
fclose($monFichier);
?>    
<h2>Lecture fichier caractere par caractere</h2>
<?php
$monFichier=fopen("test.txt","r");
while (!feof($monFichier)) {
	echo fgetc($monFichier)."#";
}
fclose($monFichier);
?>    
<br/>
<?php

$connexion=new mysqli("localhost","revue","revue","revue",3306);
if($connexion->connect_errno) {
	trace("Erreur de connexion".$connexion->connect_errno.":".$connexion->connect_error);
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
	//Def de la requete
	$login="benjamin";$password="test";
	$query="select * from internaute where login='".$login."'and password='".$password."'"; 
	$results=$connexion->query($query) or trace("Erreur sur la requête :".$query);;
	if($results->num_rows>0){
		while ($row_user=$results->fetch_array(MYSQLI_ASSOC)) {
			echo "Login : ".$row_user["login"]." / password : ".$row_user["password"];
		}
	}
	?>
	<br/>
	<?php
	//plus sécurisée	
	$login="benjamin";$password="test";
	$login=$connexion->real_escape_string(htmlspecialchars($login));$password=$connexion->real_escape_string(htmlspecialchars($password));
	$query="select * from internaute where login='".$login."'and password='".$password."'"; 
	$results=$connexion->query($query) or trace("Erreur sur la requête :".$query);;
	if($results->num_rows>0){
		while ($row_user=$results->fetch_array(MYSQLI_ASSOC)) {
			echo "Login : ".$row_user["login"]." / password : ".$row_user["password"];
		}
	}
?>
<br/>
<?php
	//plus sécurisée et opti	
	$login="benjamin";$password="test";
	$login=$connexion->real_escape_string(htmlspecialchars($login));
	$password=$connexion->real_escape_string(htmlspecialchars($password));
	$query=$connexion->prepare("select * from internaute where login=? and password=?");
	$query->bind_param("ss",$login,$password); 
	$query->execute();
	$results=$query->get_result();
		while ($row_user=$results->fetch_array(MYSQLI_ASSOC)) {
			echo "Login : ".$row_user["login"]." / password : ".$row_user["password"];
		}
?>
<br/>
<?php
	//plus sécurisée et opti une 2eme fois 
	$login="benjamin";$password="test";
	$login=$connexion->real_escape_string(htmlspecialchars($login));
	$password=$connexion->real_escape_string(htmlspecialchars($password));
	$query->execute();
	$results=$query->get_result();
		while ($row_user=$results->fetch_array(MYSQLI_ASSOC)) {
			echo "Login : ".$row_user["login"]." / password : ".$row_user["password"];
		}
?>
</div>
<div style="background-color: #151515;color: white;">
<div style="background-color: grey;color: white;">
<h1>Ajax</h1>
<code>AJAX</code><i> : Asynchronous Javascript and Xml</i>, Génération de requête
HTTP en javascript de manière asynchrone sans avoir à recharger la page.<br/>

<h2>Propriétés</h2>
- <code>onreadystatechange</code> : Contient le nom d'une fonction javascript à lancer à chaque changement de la valeur de la propriété.
<br/>
- <code>readyState</code> : Contient le statut courant de la requête.
<br/>
&nbsp;&nbsp;&nbsp;<code>0</code>: Non initalisé.
<br/>
&nbsp;&nbsp;&nbsp;<code>1</code>: En cours de chargement.
<br/>
&nbsp;&nbsp;&nbsp;<code>2</code>: Requête en cours.
<br/>
&nbsp;&nbsp;&nbsp;<code>3</code>: Interactive.
<br/>
&nbsp;&nbsp;&nbsp;<code>4</code>: Requête terminée.
<br/>

- <code>responseText</code>: Contient les données envoyées par le serveur au format texte.
<br/>
- <code>responseXML</code>: Contient les données envoyées par le serveur au format XML.
<br/>
- <code>status</code>: Code de retour de la requête HTTP (200, 404, 500).
<br/>
- <code>statusText</code>: Message de retour de la requête.
<br/>
</div>
<div style="background-color: #424242;color: white;">
<h2>Methodes</h2>
- <code>abort()</code>: Abandon de la requête.
<br/> 
- <code>getAllResponseHeader</code>: Renvoie le header de la réponse sous la forme d'une chaîne de caractères.
<br/> 
- <code>getResponseHeader</code>: Retourne la valeur du paramètre sous la forme d'une chaîne de carctères.
<br/>
- <code>open(method,url,async)</code>: Get ou Post,URL,Asynchrone ou pas (TRUE ou FALSE)
<br/>
- <code>send(data)</code>: Envoie les données data au serveur en utilisant la méthode indiquée dans <code>open</code>.
<br/>
- <code>setRequestHeader(param,value)</code>: exemple : &var=1.
<br/>
</div>
</div>
<script>
	//POST
	params = "url=www.google.fr"; //destination finale de l'appel AJAX
	request = new ajaxRequest();
	request.open("POST","ajaxPOST.php",true);
	//definition du type de données envoyée en AJAX
	//application/x-www-form-urlencoded : &var1=value&var2=value2&...
	//multipart/form-data : Envoyer un fichier, des données binaires
	request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	request.onreadystatechange = function () {
		if (this.readyState==4) {	//Uniquement lorsque la requête est terminée
			if (this.status==200) {		//Uniquement lorque la ressource existe
				if (this.responseText!=null) { // Uniquement lorque j'ai du contenu
				document.getElementById("ajaxResponse").innerHTML = this.responseText;
					//FAIT QUELQUE CHOSE D'INTELLIGENT
				} else {
					alert("Aucune Données");
				}
			} else {
				alert("Le serveur web renvoie une erreur : "+this.statusText);
			}
		}
	};
	//GET
	nocache="&nocache="+Math.random()*100000000;
	requestGET = new ajaxRequest();
	requestGET.open("GET","ajaxGET.php?url=amazon.com/gp/aw"+nocache,true);
		requestGET.onreadystatechange = function () {
		if (this.readyState==4) {	//Uniquement lorsque la requête est terminée
			if (this.status==200) {		//Uniquement lorque la ressource existe
				if (this.responseText!=null) { // Uniquement lorque j'ai du contenu
				document.getElementById("ajaxResponse").innerHTML = this.responseText;
					//FAIT QUELQUE CHOSE D'INTELLIGENT
				} else {
					alert("Aucune Données");
				}
			} else {
				alert("Le serveur web renvoie une erreur : "+this.statusText);
			}
		}
	};



	function sendAjaxRequest(method){
		if(method=="POST"){request.send(params);}
		if(method=="GET"){requestGET.send(null);}
	}
</script>
<br/>
<div id="ajaxResponse" style="width:60%;margin:auto;border:2px solid grey;padding:10px;">
C'est ici quelque chose d'intelligent

</div>
<button id="ajaxButtonPOST" onclick="javascript:sendAjaxRequest('POST');">Execute POST</button>
<button id="ajaxButtonPOST" onclick="javascript:sendAjaxRequest('GET');">Execute GET</button>
</body>
</html>
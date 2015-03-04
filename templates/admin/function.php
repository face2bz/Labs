<?php session_start();
// Fonction qui permet de faire un message par session.
function flash(){
	if (isset($_SESSION['flash'])) {
		extract($_SESSION['flash']);
		unset($_SESSION['flash']);
		return "<div class='alert alert-$type alert-dismissable'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>
		$message
		</div>";
	}
}

function setFlash($message, $type = 'success'){
	$_SESSION['flash']['message'] = $message;
	$_SESSION['flash']['type'] = $type;
}


// Protection des données SQL

if (!isset($_SESSION['csrf'])) {
	$_SESSION['csrf'] = sha1(time() + rand());
}

function csrf(){
	return 'csrf=' . $_SESSION['csrf'];
}

function checkCsrf(){
	if (!isset($_GET['csrf']) || $_GET['csrf'] != $_SESSION['csrf']) {
		header('Location:csrf.php');
		die();
	}
}


/*Fonction qui affiche les infos des utilisateur n'importe ou dans la page*/
function info($id){
	
	global $bdd;
	$membres = $bdd->prepare('SELECT * FROM membres, configurations WHERE membres.id_membre = configurations.id_membre AND membres.id_membre = :id');
	$membres->execute(array('id' => $_SESSION['id_membre']));
	$donnees = $membres->fetch(); 
	$membres->closeCursor();
	return $donnees[$id];;
	
}

/* FONCTION LISTE DES FOURNISSEURS
*/
function fournisseurs($id){
	
	global $bdd;
	$fournisseurs = $bdd->prepare('SELECT * FROM membres, fournisseurs WHERE membres.id_membre = fournisseurs.id_membre AND membres.id_membre = :id ORDER BY fournisseurs.f_nom ASC');
	$fournisseurs->execute(array('id' => $_SESSION['id_membre']));
	while ($donnees = $fournisseurs->fetch()){
		echo '<option>' .  $donnees[$id] . '</option>';
	} 
	$fournisseurs->closeCursor();
	return $donnees[$id];
}




function securisation($donnees){
	$donnees = trim($donnees);
	$donnees = stripcslashes($donnees);
	$donnees = strip_tags($donnees);
	return $donnees;
}



//Fonction pour choisir label et texte des types historiques

function type_historique($id) {
	global $bdd;
	$type_historique = $bdd->query('SELECT * FROM historiques'); 
	$donnees = $type_historique->fetch();
	if ($id == 1) {
		echo '<span class="label label-success label-sm"> Modification </span>';
	}elseif ($id == 2) {
		echo '<span class="label label-primary label-sm"> Ajout </span>';
	}elseif ($id == 3) {
		echo '<span class="label label-danger label-sm"> Suppression </span>';
	}
	return $id;

	$type_historique->closeCurser();

}

// Fonction insertion historique
function historique($type, $page, $description){
	global $bdd;
	$h_page = $page;
	$h_type = $type;
	$h_description =  $description;
	$h_ip = $_SERVER["REMOTE_ADDR"];
	$h_id_membre = $_SESSION['id_membre'];

	$historique = $bdd->prepare('INSERT INTO historiques(h_page, h_date, h_type, h_description, h_ip, h_id_membre) VALUES (:h_page, NOW(), :h_type, :h_description, :h_ip, :h_id_membre)');
	$historique->execute(array(         
		'h_page' => $h_page,                    
		'h_type' => $h_type,
		'h_description' => $h_description,
		'h_ip' => $h_ip,
		'h_id_membre' => $h_id_membre
		));
}

function input($id){
	$value = isset($_POST[$id]) ? $_POST[$id] : '';
	return "<input type='text' class='form-control' name='$id' value='$value'>";
}


?>
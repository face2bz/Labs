<?php 
if (isset($_SESSION['id_membre']) == '' ) {
	header('Location:login.php');
	die();
}

?>
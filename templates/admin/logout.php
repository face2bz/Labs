<?php 
include 'function.php';
$_SESSION = array();
session_unset();
session_destroy();
setFlash('Vous êtes déconnecté.');
header('Location:login.php');
die();
?>
<?php

header('Content-type: application/json');

require '../class/user.class.php';
require '../class/connect.php';


$pdo = new Connect();

$add = new User ($pdo);


$add->setName($_POST['name']);
$add->setEmail($_POST['email']);
$add->setPass($_POST['pass']);

$add->saveUser();

if (isset($_SESSION['new']) && $_SESSION['new'] === true){
	$add=null;
	$a = array ();
	$a [] = 1;
	echo json_encode($a);
} else if (isset($_SESSION['new']) && $_SESSION['new'] === false){
	$add=null;
	$a = array ();
	$a [] = 0;
	echo json_encode($a);
}
?>

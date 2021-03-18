<?php
header('Content-type: application/json');

require_once '../class/user.class.php';
require_once '../class/connect.php';


$pdo = new Connect();

//echo $_POST['pass'];
$login = new User ($pdo);

$login->setEmail($_POST['email']);
$login->setPass($_POST['pass']);

$login->validateUser();

if (isset($_SESSION['logged']) && $_SESSION['logged'] === true){
	$login=null;
	//header ("Location: http://localhost/GitHub/hospital_system/web_medico/home.php");
	$a = array ();
	$a [] = 1;
	echo json_encode($a);
} else {
	$login=null;
	$a = array ();
	$a [] = 0;
	echo json_encode ($a);
	exit();
}
?>

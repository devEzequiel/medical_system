<?php

require '../class/employed.class.php';
require '../class/set.employed.php';

// if (($_GET['name'] == '') || ($_GET['birth'] == '') || ($_GET['role'] == '') || ($_GET['cpf'] == '') || ($_GET['phone'] == '') || ($_GET['email'] == '') || ($_GET['turn'] == '')){

// 	header ('Content-type: application/json');
// 	$a = 1;
// 	echo json_encode($a);
// 	exit;

// }

$emp = new Employed ();

$cpf= preg_replace('/[\.\-]/', '', $_GET['cpf']);

$emp->setName($_GET['name']);
$emp->setBirth($_GET['birth']);
$emp->setRole($_GET['role']);
$emp->setCpf($cpf);
$emp->setPhone($_GET['phone']);
$emp->setEmail($_GET['email']);
$emp->setTurn($_GET['turn']);


$create = new SetEmployed ($emp);
$create->createEmp();

// header ('Content-type: application/json');

// $data = array (
// 			1 => $create->screenEmp(),
// 			2 => $create->pagHome()
// 		);
// echo json_encode($data);

$create = null;
$emp = null;
?>



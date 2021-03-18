<?php
require '../class/doctor.class.php';
require '../class/set.doctor.php';


$doctor = new Doctor();

$cpf= preg_replace('/[\.\-]/', '', $_GET['cpf']);

$doctor->setName($_GET['name']);
$doctor->setCpf($cpf);
$doctor->setEsp($_GET['espec']);
$doctor->setCrm($_GET['crm']);
$doctor->setPhone($_GET['phone']);
$doctor->setEmail($_GET['email']);
$doctor->setTurn($_GET['turn']);


$createdoctor = new SetDoctor($doctor);

$createdoctor->insertDoctor($doctor);

if (isset($_SESSION['cpf']) && $_SESSION['cpf'] === true){

	header ('Content-type: application/json');
	$createdoctor->getDoctors();
	$data = array (
		1 => $createdoctor->getDoctors(), 
		2 => $createdoctor->pagHome()
	);
	echo json_encode ($data);
	$createdoctor = null;
	$doctor = null;

} else {
	header ('Content-type: application/json');
	$createdoctor = null;
	$doctor = null;
	echo 0;
}




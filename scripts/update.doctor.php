<?php

require '../class/doctor.class.php';
require '../class/set.doctor.php';

$doctor = new Doctor();

$cpf= preg_replace('/[\.\-]/', '', $_GET['cpf']);

$doctor->setName($_GET['name']);
$doctor->setCpf($cpf);
$doctor->setEsp($_GET['esp']);
$doctor->setCrm($_GET['crm']);
$doctor->setPhone($_GET['phone']);
$doctor->setEmail($_GET['email']);
$doctor->setTurn($_GET['turn']);

$update = new SetDoctor($doctor);

$update->updateDoctor();

if($update){
    $update=null;
    $doctor=null;
} else {
	$update=null;
    $doctor=null;
	exit();
}
?>
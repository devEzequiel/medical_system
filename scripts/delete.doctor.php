<?php
require '../class/doctor.class.php';
require '../class/set.doctor.php';

$doctor = new Doctor();
$delete = new SetDoctor($doctor);

$doctor->setId($_GET['id']);

$delete->deleteDoctor();

header ('Content-type: application/json');
$data = array (
	1 => $delete->getDoctors(),
	2 => $delete->pagHome()
);
echo json_encode ($data);
$delete = null;
$doctor = null;
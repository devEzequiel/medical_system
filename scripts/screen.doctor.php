<?php

require '../class/doctor.class.php';
require '../class/set.doctor.php';

$doctor = new Doctor();
$set = new SetDoctor($doctor);

header ('Content-type: application/json');
$data = array (
	1 => $set->getDoctors(),
	2 => $set->pagHome()
);
echo json_encode ($data);
$set = null;
$doctor = null;



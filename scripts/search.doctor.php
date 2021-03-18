<?php

require '../class/doctor.class.php';
require '../class/set.doctor.php';

$doctor = new Doctor();
$search = new SetDoctor($doctor);

$value = $_GET['val'];
$search->searchDoctor($value);

if ($search){
	$search = null;
	$doctor = null;
}
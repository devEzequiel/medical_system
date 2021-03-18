<?php

require '../class/doctor.class.php';
require '../class/set.doctor.php';

$doctor = new Doctor();
$pag = new SetDoctor($doctor);

$page = $_GET['p'];

header ('Content-type: application/json');
$data = $pag->getDoctors($page);

echo json_encode ($data);

$doctor = null;
$pag = null;
?>
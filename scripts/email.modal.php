<?php

if ($_GET['role'] === 'doctor'){

	require "../class/doctor.class.php";
	require "../class/set.doctor.php";

	$doctor = new Doctor ();
	$id = $_GET['id'];
	$doctor->setId($id);

	$set = new SetDoctor($doctor);

	$email = $set->modal();

	header ('Content-type: application/json');
	echo json_encode ($email);
	$doctor = null;
	$set = null;
	exit;

} else if ($_GET['role'] === 'emp'){

	require "../class/employed.class.php";
	require "../class/set.employed.php";

	$emp = new Employed();

	$emp->setId($_GET['id']);

	$set = new SetEmployed($emp);

	$email = $set->modal();
	header ('Content-type: application/json');
	echo json_encode($email);
	$emp=null;
	$set=null;
	exit;
} else {
	exit;
}
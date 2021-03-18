<?php

require '../class/employed.class.php';
require '../class/set.employed.php';

$emp = new Employed ();
$screen = new SetEmployed($emp);

header ('Content-type: application/json');
$data = array (
	1 => $screen->screenEmp(),
	2 => $screen->pagHome()
);
echo json_encode ($data);
$screen = null;
$emp = null;
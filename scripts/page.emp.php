<?php

require '../class/employed.class.php';
require '../class/set.employed.php';

$emp = new Employed();
$pag = new SetEmployed($emp);

$page = $_GET['p'];

header ('Content-type: application/json');

$data = $pag->screenEmp($page);

echo json_encode ($data);

$emp = null;
$pag = null;
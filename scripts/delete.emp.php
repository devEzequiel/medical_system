<?php

require '../class/employed.class.php';
require '../class/set.employed.php';

$emp = new Employed ();
$emp->setId($_GET['id']);
$delete= new SetEmployed($emp);

$delete->deleteEmp();

if($delete){
	$delete->screenEmp();
	$delete=null;
	$emp=null;
}


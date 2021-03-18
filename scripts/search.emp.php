<?php

require '../class/employed.class.php';
require '../class/set.employed.php';

$emp = new Employed ();
$search= new SetEmployed($emp);

$search->searchEmp($_GET['val']);

if($search){
	$search=null;
	$emp=null;
}
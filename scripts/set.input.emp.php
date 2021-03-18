<?php

require '../class/employed.class.php';
require '../class/set.employed.php';

$emp = new Employed ();
$modal = new SetEmployed($emp);
$emp->setId($_POST['id']);
$modal->setModal();

if ($modal){
	$modal = null;
	$emp = null;
}
?>
<?php

require '../class/employed.class.php';
require '../class/set.employed.php';



$emp = new Employed();

$cpf= preg_replace('/[\.\-]/', '', $_GET['cpf']);


$emp->setName($_GET['name']);
$emp->setBirth($_GET['birth']);
$emp->setRole($_GET['role']);
$emp->setCpf($cpf);
$emp->setPhone($_GET['phone']);
$emp->setEmail($_GET['email']);
$emp->setTurn($_GET['turn']);

$update = new SetEmployed($emp);
$update->updateEmp();

$update->screenEmp();
$update=null;
$emp=null;
?>




<?php

require '../class/doctor.class.php';
require '../class/set.doctor.php';

$doctor = new Doctor();
$set = new SetDoctor($doctor);


$doctor->setId($_GET['id']);

$set->setModal();

if($set){
    $set=null;
    $doctor=null;
}
?>
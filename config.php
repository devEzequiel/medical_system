<?php
require_once "environment.php";

$config= array();

if (ENVIRONMENT === 'development'){
	define ("BASE_URL", "http://localhost/GitHub/hospital_system/web_medico/");
	$config['dbname'] = 'medical_system';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

} else {
	define ("BASE_URL", "https://medicalsystem00.000webhostapp.com/");
	$config['dbname'] = 'id16357592_medical_system';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'id16357592_ezequiel';
	$config['dbpass'] = 'h{v^=rWj%XMmMwi1';
}

?>
<?php


class Connect 
{


public $pdo;

public function __construct()
{
	require "../config.php";
	try {
		
		$this->pdo = new PDO("mysql: host=".$config['host']."; dbname=".$config['dbname'], $config['dbuser'], $config['dbpass']);
		return $this->pdo;
	} catch (PDOException $e) {
		echo "Connection Failed: " . $e->getMessage();
	}
}
}
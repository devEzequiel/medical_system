<?php

session_start();
if (isset($_SESSION['logged']) and $_SESSION['logged'] === true){
	$_SESSION['user'] = null;
} else {
	$_SESSION['user'] = 'try';
	header ("Location: ./index.php");
	exit();
}

?>
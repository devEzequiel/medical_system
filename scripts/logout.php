<?php

require "../config.php";
session_start();
$_SESSION['logged'] = false;
session_destroy();
header ("Location:".BASE_URL);
exit();

?>
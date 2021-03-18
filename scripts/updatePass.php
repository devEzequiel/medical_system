<?php

require '../config.php';
require '../class/user.class.php';
require '../class/connect.php';


$pdo = new Connect();

//verify if the user is registered

if (!isset($_SESSION['attempts'])){
	$_SESSIONS['attempts'] = 0;
}

if ($_SESSION['attempts'] <= 5){

	$_SESSION['attempts']++;

	$stmt= "SELECT * FROM users WHERE email = :email";
	$stmt= $pdo->pdo->prepare($stmt);
	$stmt->bindValue(':email', $_POST['email']);
	$stmt->execute();

	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$id = $result['id'];

	//consulting the validity of the token
	$query= "SELECT * FROM token_user WHERE id_user = :id AND used = 0 AND hash = :hash";
	$query= $pdo->pdo->prepare($query);
	$query->bindValue(':id', $id);
	$query->bindValue(':hash', md5($_POST['hash']));
	$query->execute();

	if ($query->rowCount() == 0){
		header ("Location: ".BASE_URL."redefine.php?token=invalid");
		exit;
	} else {

		$upd = new User ();

		$upd->setId($id);
		$upd->setEmail($_POST['email']);

		$upd->updateUser($_POST['pass'], md5($_POST['hash']));

	}
} else {
	header ("Location: ".BASE_URL."./redefine.php?attempts=limit");
}

?>

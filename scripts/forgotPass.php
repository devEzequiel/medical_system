<?php
require_once '../class/connect.php';

$pdo = new Connect();

if(isset($_POST['email']) && !empty($_POST['email'])) {
	$stmt= "SELECT * FROM users WHERE email = ?";
	$stmt= $pdo->pdo->prepare($stmt);
	$stmt->execute(array($_POST['email']));
	if ($stmt->rowCount() == 0){
		header ("Location: ".BASE_URL."password-login.php?erro=email");
		exit;
	} else {
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		$id = $user['id'];
		$stmt = "SELECT * FROM token_user WHERE id_user=:id";
		$stmt = $pdo->pdo->prepare($stmt);
		$stmt->bindValue(':id', $id);
		$stmt->execute();

		if (!($stmt->rowCount() >= 5)) {

		
			$token = (rand(0, 9).rand(0, 99).rand(0, 99));

			$query = "INSERT INTO token_user (id_user, hash) VALUES (:id, :h)";

			$query = $pdo->pdo->prepare($query);
			$query->bindValue(':id', $id);
			$query->bindValue(':h', md5($token));
			$query->execute();

			$pdo = null;
			$stmt = null;
			if ($query->rowCount() > 0){
				$query=null;
				$name = "System Medic Corporation";
				$email = $user['email'];
				$body = '<h3>Olá, '.$name.'! </br>Esqueceu a senha?</h3></br></br>
						<p>Não se Preocupe!</p></br>
						Clique nesse <a href="'.BASE_URL.'updatePass.php">link</a> e utilize o código '.$token.', para redefinir sua senha.';
				$subject = "Esqueceu sua senha";
				$header = "From: esofinney@gmail.com"."\r\n".
							"Reply-To: esofinney@gmail.com"."\r\n".
							"X-Mailer:PHP/".phpversion();

				if(mail($email, $subject, $body, $header)){
					echo "work";

				} else {
					echo "don't work";
				}

				//header ("Location: ".BASE_URL."redefine.php");

				exit;
				
			}
		} else {
			header ("Location:".BASE_URL."/password-login.php?error=token");
			exit;
		}
	}
} 

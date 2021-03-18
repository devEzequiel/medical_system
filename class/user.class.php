<?php

session_start();

class User{
	private $id;
	private $name;
	private $email;
	private $pass;

	private $pdo;


	public function __construct($pdo)
	{
		$this->pdo = $pdo;

	}

	public function saveUser(){
		
		$sql= "SELECT * FROM users WHERE email=?";
		$sql= $this->pdo->pdo->prepare($sql);
		$sql->execute(array($this->email));


		if($sql->rowCount() == 0){

			$stmt= "INSERT INTO users (name, email, pass) VALUES (:n, :e, :p)";
			$stmt=$this->pdo->pdo->prepare($stmt);
			$stmt->bindValue(':n', $this->name);
			$stmt->bindValue(':e', $this->email);
			$stmt->bindValue(':p', $this->pass);
			$stmt->execute();

			if ($stmt->rowCount() > 0){
				$_SESSION['new'] = true;
				return true;
			}
		} else {
			$_SESSION['new'] = false;
			return false;
		}
	}

	
	public function updateUser($pass, $token)
	{
		$stmt= "UPDATE users SET pass=:p WHERE id=:id";
		$stmt=$this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':p', md5($pass));
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();

		if($stmt->rowCount() > 0){
			//invalidating the token
			$sql = "UPDATE token_user SET used = 1 WHERE id_user=:id";
			$sql->$this->pdo->pdo->prepare($sql);
			$sql->bindValue(':id', $this->id);
			$sql->execute();

			if ($sql->rowCount() > 0){
				header ("Location: ".BASE_URL."redefine?newpass=yes");
				exit;
			} else {
				exit;
			}
		} else {
			exit;
		}
	}


	public function validateUser()
	{
		$stmt= "SELECT * FROM users WHERE email=:e AND pass=:p";
		$stmt= $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':e', $this->email);
		$stmt->bindValue(':p', $this->pass);
		$stmt->execute();


		$data = $stmt->fetch();

		if ($stmt->rowCount() > 0){
			$name = trim($data['name']);
    		$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    		$first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
			$name3 = ucfirst($first_name);
			$try = true;
			$_SESSION['logged'] = true;
			$_SESSION['login'] = $name3;
			return true;
		} else {
			$_SESSION['logged'] = false;
			return false;
		}
	}

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

 
    /**
     * @param mixed $pass
     *
     * @return self
     */
    public function setPass($pass)
    {
        $this->pass = md5($pass);
    }
}

?>
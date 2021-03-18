<?php

require "connect.php";

class SetEmployed
{
	private $emp;
	private $pdo;

	public function __construct (Employed $emp) 
	{
		$conn = new Connect ();
		$this->pdo = $conn;

		$this->emp= $emp;
	}

	public function createEmp()
	{
		$sql = "SELECT * FROM employeds WHERE cpf = :c or email = :email";
		$sql = $this->pdo->pdo->prepare($sql);
		$sql->bindValue(':c', $this->emp->getCpf());
		$sql->bindValue(':email', $this->emp->getEmail());
		$sql->execute();

		if(!($sql->rowCount() > 0)){

			$stmt = $this->pdo->pdo->prepare('INSERT INTO employeds (name, cpf, role, birth, phone, email, turn) VALUES (:n, :c, :r, :b, :p, :e, :t)');
			$stmt->bindValue(':n', $this->emp->getName());
			$stmt->bindValue(':c', $this->emp->getCpf());
			$stmt->bindValue(':r', $this->emp->getRole());
			$stmt->bindValue(':b', $this->emp->getBirth());
			$stmt->bindValue(':p', $this->emp->getPhone());
			$stmt->bindValue(':e', $this->emp->getEmail());
			$stmt->bindValue(':t', $this->emp->getTurn());
			$stmt->execute();
			
			if ($stmt){
				return true;
			}

		} else {
			header ('Content-type: application/json');
			$a = 1;
			echo json_encode($a);
			exit;
		}
	}

	public function updateEmp()
	{
		$stmt = "UPDATE employeds 
				 SET name=:n, birth=:b, role=:r, email=:e, phone=:p, turn=:t
				 WHERE cpf=:c";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':n', $this->emp->getName());
		$stmt->bindValue(':b', $this->emp->getBirth());
		$stmt->bindValue(':r', $this->emp->getRole());
		$stmt->bindValue(':p', $this->emp->getPhone());
		$stmt->bindValue(':e', $this->emp->getEmail());
		$stmt->bindValue(':t', $this->emp->getTurn());
		$stmt->bindValue(':c', $this->emp->getCpf());
		$stmt->execute();

		if ($stmt->rowCount() > 0){
			echo "brabo";
		} else {
			echo "nada";
		}


	}

	public function deleteEmp()
	{
		$stmt = "DELETE FROM employeds WHERE id = :id ";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':id', $this->emp->getId());
		$stmt->execute();
		if ($stmt){
			return true;
		} else {
			return false;
		}
	}

	public function searchEmp($val)
	{
		$pg = 1;

		if (isset($_SESSION['e']) && !empty($_SESSION['e'])){
			$pg=addslashes($_SESSION['e']);
		}
		
		$p = ((int)$pg  -1) * 5;

		$stmt = "SELECT * FROM employeds WHERE name LIKE CONCAT ('%', :a, '%') LIMIT $p, 5";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':a', $val);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $key => $value){
			$cpf = $value['cpf'];
			$rep = '.';
			$cpf = substr_replace ( $cpf, $rep, 3, 0 );
			$cpf = substr_replace ( $cpf, $rep, 7, 0 );
			$rep = '-';
			$cpf = substr_replace ( $cpf, $rep, 11, 0 );

			echo '<tr>
					  <td>'.$value['name'].'</td>
			          <td>'.$value['role'].'</td> 
			          <td>'.$value['birth'].'</td> 
			          <td>'.$cpf.'</td> 
			          <td>'.$value['phone'].'</td> 
			          <td>'.$value['turn'].'</td> 
			          <td>

			          	<button title="Editar" type="button" class="btn btn-default bi-pencil" data-toggle="modal" data-target="#employee_editor" style="color:blue;" onclick="inputAddEmp('.$value['id'].')"></button> 
                    	<button title="Deletar" type="button" class="btn btn-default bi-trash" data-toggle="modal" data-target="#aba_del" style="color:red;" onclick="deleteEmp('.$value['id'].')"></button>
                    	<button title="Email" type="button" class="btn btn-default bi-envelope" data-toggle="modal" data-target="#mail-employee" style="color:green;"></button>
			          </td>
	              </tr>';
		}
	}

	public function screenEmp($page = '')
	{

		$pg = 1;


		if (isset($page) && !empty($page)){
			$pg=addslashes($page);
		}
		
		$p = ((int)$pg  -1) * 4;
		

		$stmt = "SELECT * FROM employeds LIMIT $p, 4";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->execute();

		$array = $stmt->fetchAll();

		$emp = '';
		foreach ($array as $key => $value){

			$cpf = $value['cpf'];
			$rep = '.';
			$cpf = substr_replace ( $cpf, $rep, 3, 0 );
			$cpf = substr_replace ( $cpf, $rep, 7, 0 );
			$rep = '-';
			$cpf = substr_replace ( $cpf, $rep, 11, 0 );

	 		$emp .= '<tr>
					  <td>'.$value['name'].'</td>
			          <td>'.$value['role'].'</td> 
			          <td>'.$value['birth'].'</td> 
			          <td>'.$cpf.'</td> 
			          <td>'.$value['phone'].'</td> 
			          <td>'.$value['turn'].'</td> 
			          <td>

			          	<button title="Editar" type="button" class="btn btn-default bi-pencil" data-toggle="modal" data-target="#employee_editor" style="color:blue;" onclick="inputAddEmp('.$value['id'].')"></button> 
                    	<button title="Deletar" type="button" class="btn btn-default bi-trash" data-toggle="modal" data-target="#aba_del" style="color:red;" onclick="deleteEmp('.$value['id'].')"></button>
						<button title="Email" type="button" class="btn btn-default bi-envelope" data-toggle="modal" data-target="#mail-employee" style="color:green;" onclick="setEmaile('.$value['id'].')"></button>
			          </td>
	              </tr>';
	    }

	    if ($stmt){
			return $emp;
		} else {
			return false;
		}
	}

	public function pagHome(){

		$total = 0;
		$sql = "SELECT COUNT(*) AS c FROM employeds";
		$sql = $this->pdo->pdo->query($sql);
		$sql = $sql->fetch();
		$total = $sql['c'];
		$page = $total / 4;
		$pager = ''; 
		for ($q=0;$q<$page;$q++){
			$pager .= '<a class="paginacao-funcio" onclick="pageEmp('.($q+1).')">
						 '.($q+1).'
					   </a>'; 
			
		}
		return $pager;
	}

	public function setModal(){
		$stmt = "SELECT * FROM employeds WHERE id=:id";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':id', $this->emp->getId());
		$stmt->execute();
		$array = $stmt->fetch(PDO::FETCH_ASSOC);

		$cpf = $array['cpf'];

			$rep = '.';
			$cpf = substr_replace ( $cpf, $rep, 3, 0 );
			$cpf = substr_replace ( $cpf, $rep, 7, 0 );
			$rep = '-';
			$cpf = substr_replace ( $cpf, $rep, 11, 0 );

		echo '<div class="modal-body">
                <input value="'.$array['name'].'" type="text" name="name" id="namee" class="name_modal" placeholder="Insira o nome" required/>
                <select name="role" id="rolee" class="esp_modal" required>
                    <option value="" disabled selected>Selecione Uma Alocação ...</option>
                    <option value="Limpeza" required>Limpeza</option>
                    <option value="Recepção" required>Recepção</option>
                    <option value="Copa" required>Copa</option>
                    <option value="Almoxarifado" required>Almoxarifado</option>
                    <option value="Segurança" required>Segurança</option>
                    <option value="Motorista" required>Motorista</option>
                    <option value="Enfermagem" required>Enfermagem</option>
                    <option selected="selected">'.$array['role'].'</option>
                </select>
                <input value="'.$array['birth'].'" id="birthe" type="text" name="birth" class="data"  placeholder="Data de nascimento" readonly/>
                <input value="'.$cpf.'" type="text"  name="cpf" id="cpfe" class="cpf_modal" placeholder="CPF" readonly/>
                <input type="text" value="'.$array['phone'].'" name="phone" id="cele" class="cel_modal" placeholder="Numero de telefone" required/> 
                <input value="'.$array['email'].'" type="email" name="email" id="maile" class="mail_modal" placeholder="Digte seu email" required/> 
                <select name="turn" id="turne" class="turno_modal" required>
                    <option value="" disabled selected>Selecione Um Turno ...</option>
                    <option value="Manhã" required>Manhã</option>
                    <option value="Tarde" >Tarde</option>
                    <option value="Noite" >Noite</option>
                    <option selected="selected">'.$array['turn'].'</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-danger" value="Enviar">
            </div>';
	}

	public function modal(){
		$stmt = "SELECT email FROM employeds WHERE id=:id";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':id', $this->emp->getId());
		$stmt->execute();

		$emp= $stmt->fetch(PDO::FETCH_ASSOC);
		$email=$emp['email'];

		return $email;

	}
}
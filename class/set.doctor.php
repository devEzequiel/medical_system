<?php
session_start();
require "connect.php";

class SetDoctor{

private $pdo;
private $doctor;

	public function __construct($doctor){
		$conn = new Connect ();
		$this->pdo = $conn;

		$this->doctor=$doctor;


	}

	public function insertDoctor(Doctor $doctor){
		//testing if already exists the cpf, email or CRM in the database
		$sql = "SELECT * FROM medics WHERE cpf = :c or email = :email or  crm = :crm";
		$sql = $this->pdo->pdo->prepare($sql);
		$sql->bindValue(':c', $this->doctor->getCpf());
		$sql->bindValue(':email', $this->doctor->getEmail());
		$sql->bindValue(':crm', $this->doctor->getCrm());
		$sql->execute();
		if(!($sql->rowCount() > 0)){

			$stmt = $this->pdo->pdo->prepare('INSERT INTO medics (name, cpf, crm, espec, phone, email, turn) VALUES (:n, :cpf, :crm, :esp, :p, :e, :t)');
			$stmt->bindValue(':n', $this->doctor->getName());
			$stmt->bindValue(':cpf', $this->doctor->getCpf());
			$stmt->bindValue(':crm', $this->doctor->getCrm());
			$stmt->bindValue(':esp', $this->doctor->getEsp());
			$stmt->bindValue(':p', $this->doctor->getPhone());
			$stmt->bindValue(':e', $this->doctor->getEmail());
			$stmt->bindValue(':t', $this->doctor->getTurn());
			$stmt->execute();
			
			if ($stmt){
				$_SESSION['cpf'] = true;
				return true;
			}
		} else {
			$_SESSION['cpf'] = false;
			return false;
		}
		
	}
	
	public function deleteDoctor(){
		
		$stmt = "DELETE FROM medics WHERE id = :id ";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':id', $this->doctor->getId());
		$stmt->execute();
		if ($stmt){
			return true;
		} else {
			return false;
		}
	}

	public function searchDoctor($val){
		$stmt = "SELECT * FROM medics WHERE name LIKE CONCAT ('%', :a, '%')";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':a', $val);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $key => $value){
			echo '<tr>
					  <td>'.$value['name'].'</td>
			          <td>'.$value['espec'].'</td> 
			          <td>'.$value['crm'].'</td> 
			          <td>'.$value['cpf'].'</td> 
			          <td>'.$value['phone'].'</td> 
			          <td>'.$value['turn'].'</td> 
			          <td>
			              <button title="Editar" type="button" class="btn btn-default bi-pencil" data-toggle="modal" data-target="#doctor_editor" style="color:blue;" onclick="inputAdd('.$value['id'].')"></button> 
			              <button title="Deletar" type="button" class="btn btn-default bi-trash" style="color:red;" onclick="deleteMedic('.$value['id'].')"></button>
			              <button title="Email" type="button" class="btn btn-default bi-envelope" data-toggle="modal" data-target="#mail-doctor" style="color:green;"></button>
			          </td>
	              </tr>';
		}

		if ($stmt){
			return true;
		} else {
			return false;
		}

	}
	
	

	public function updateDoctor(){

		$sql = "UPDATE medics SET name=:n, crm=:c, espec=:es, email=:e, phone=:p, turn=:t WHERE cpf=:cpf";

		$stmt = $this->pdo->pdo->prepare($sql);
		$stmt->bindValue(':n', $this->doctor->getName());
		$stmt->bindValue(':c', $this->doctor->getCrm());
		$stmt->bindValue(':es', $this->doctor->getEsp());
		$stmt->bindValue(':p', $this->doctor->getPhone());
		$stmt->bindValue(':e', $this->doctor->getEmail());
		$stmt->bindValue(':t', $this->doctor->getTurn());
		$stmt->bindValue(':cpf', $this->doctor->getCpf());
		$stmt->execute();

		return true;
	}

	public function getDoctors($pages = ''){

		$pg = 1;


		if (isset($pages) && !empty($pages)){
			$pg=addslashes($pages);
		}
		
		$p = ((int)$pg  -1) * 4;
		

		$stmt = "SELECT * FROM medics LIMIT $p, 4";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->execute();

		$array = $stmt->fetchAll();

		$doc = '';

		foreach ($array as $key => $value){

			$cpf = $value['cpf'];
			$rep = '.';
			$cpf = substr_replace ( $cpf, $rep, 3, 0 );
			$cpf = substr_replace ( $cpf, $rep, 7, 0 );
			$rep = '-';
			$cpf = substr_replace ( $cpf, $rep, 11, 0 );

	 		$doc .= '<tr>
					  <td>'.$value['name'].'</td>
			          <td>'.$value['espec'].'</td> 
			          <td>'.$value['crm'].'</td> 
			          <td>'.$cpf.'</td> 
			          <td>'.$value['phone'].'</td> 
			          <td>'.$value['turn'].'</td> 
			          <td>
			              <button title="Editar" type="button" class="btn btn-default bi-pencil" data-toggle="modal" data-target="#doctor_editor" style="color:blue;" onclick="inputAdd('.$value['id'].')"></button> 
			              <button title="Deletar" type="button" class="btn btn-default bi-trash" style="color:red;" onclick="deleteMedic('.$value['id'].')"></button>
						  <button title="Email" type="button" class="btn btn-default bi-envelope" data-toggle="modal" data-target="#mail-doctor" style="color:green;" onclick="setEmail('.$value['id'].')"></button>
			          </td>
	              </tr><hr/>;';
	    }

	    if ($stmt){
			return $doc;
		} else {
			return false;
		}
	}

	public function pagHome(){
		$total = 0;
		$sql = "SELECT COUNT(*) AS c FROM medics";
		$sql = $this->pdo->pdo->query($sql);
		$sql = $sql->fetch();
		$total = $sql['c'];
		$page = $total / 4;
		$pager = '';
		for ($q=0;$q<$page;$q++){
			$pager .= '<a class="paginacao-medic" onclick="pageDoc('.($q+1).')">
						 '.($q+1).'
					</a>'; 
			
		}
		return $pager;
	}


	public function setModal(){
		$stmt = "SELECT * FROM medics WHERE id=:id";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':id', $this->doctor->getId());
		$stmt->execute();
		$array = $stmt->fetch(PDO::FETCH_ASSOC);


		$cpf = $array['cpf'];
		$rep = '.';
		$cpf = substr_replace ( $cpf, $rep, 3, 0 );
		$cpf = substr_replace ( $cpf, $rep, 7, 0 );
		$rep = '-';
		$cpf = substr_replace ( $cpf, $rep, 11, 0 );


		echo '<div class="modal-body">
                    <input type="text" value="'.$array['name'].'" name="name" id="nomem" class="name_modal" placeholder="Insira o nome" required/>
                    <select name="esp" id="espm" class="esp_modal">
                        <option value="Cirurgião" required>Cirurgião</option>
                        <option value="Pediatra" required>Pediatra</option>
                        <option value="Neurologista" required>Neurologista</option>
                        <option value="Anestesista" required>Anestesista</option>
                        <option value="Dermatologista" required>Dermatologista</option>
                        <option value="Cardiologista" required>Cardiologista</option>
                        <option value="Ortopedista" required>Ortopedista</option>
                        <option value="Otorrinolaringologista" required>Otorrinolaringologista</option>
                        <option value="Endocrinologista" required>Endocrinologista</option>
                        <option value="Outro" required>Outro</option>
                        <option selected="selected">'.$array['espec'].'</option>
                    </select>
                    <input type="text" value="'.$array['crm'].'" name="crm" id="crm_mm" class="crm_modal" placeholder="Digite o CRM" readonly/>
                    <input type="text" value="'.$cpf.'" name="cpf" id="cpf_mm" class="cpf_modal" placeholder="CPF" readonly/>
                    <input type="text" value="'.$array['phone'].'" name="phone" id="cel_mm" class="cel_modal" placeholder="Numero de telefone" required/> 
                    <input type="email" value="'.$array['email'].'" name="email" id="mail_mm" class="mail_modal" placeholder="Digte seu email" required/> 
                    <select name="turn" id="turno_mm" class="turno_modal">
                        <option value="Manhã" required>Manhã</option>
                        <option value="Tarde" >Tarde</option>
                        <option value="Noite" >Noite</option>
                        <option selected="selected">'.$array['turn'].'</option>				
                    </select>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <input type="submit" id="update1" class="btn btn-danger" value="Enviar">

                </div>';
	
		if ($stmt){
			return true;
		} else {
			return false;
		}
	}
		public function modal(){
		$stmt = "SELECT * FROM medics WHERE id=:id";
		$stmt = $this->pdo->pdo->prepare($stmt);
		$stmt->bindValue(':id', $this->doctor->getId());
		$stmt->execute();

		$array = $stmt->fetch(PDO::FETCH_ASSOC);

		//'<input value="'.$array['email'].'" type="mail" id="readonly_mail-doctor" name="readonly_mail-doctor" class="form form-control" readonly/>';

		return $array['email'];

	}
}
?>

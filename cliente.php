<?php
/**
* 
*/
class Cliente
{


	private $id;
	private $nome;
	private $email;
	private $db;

	
	function __construct(\PDO $pdo)
	{
		$this->db = $pdo;
	}


	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}




	public function inserir(){
		$query = "INSERT INTO cliente (nome, email) VALUES(:nome, :email)";
		$conn = $this->db->prepare($query);
		$conn->bindValue(':nome', $this->getNome());
		$conn->bindValue(':email', $this->getEmail());
		$conn->execute();
	}

	public function deletar(){
		$query = "DELETE FROM cliente WHERE id = :id"; 
		$conn = $this->db->prepare($query);
		$conn->bindValue(':id', $this->getId());
		$conn->execute();
		# code...[]
	}
	public function alterar(){
		$query = " UPDATE cliente SET nome = :nome, email = :email WHERE id = :id"; 
		$conn = $this->db->prepare($query);
		$conn->bindValue(':id', $this->getId());
		$conn->bindValue(':nome', $this->getNome());
		$conn->bindValue(':email', $this->getEmail());
		$conn->execute();
	}
	public function listar(){

		$query = " SELECT * FROM cliente";
		$conn = $this->db->prepare($query);
		$conn->execute();
		$res = $conn->fetchAll(\PDO::FETCH_ASSOC);
		return $res;
	
	}


}





?>


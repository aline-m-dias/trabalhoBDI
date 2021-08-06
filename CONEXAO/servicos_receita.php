<?php

class Serviços_receita {

	private $conexao;
    private $login;
	private $nome;
	private $codigo;
	private $valor;
	private $data_rec;
	
	
	public function __construct(Conexao $conexao, Receita $receita) { 
		$this->conexao = $conexao->conectar();
        $this->nome = $receita->__get('nome');
		$this->valor = $receita->__get('valor');
		$this->data_rec = $receita->__get('data_rec');
	}
	
	
	public function inserirReceita(){
		session_start( );
		$this->login = $_SESSION["login"];

		$query = "select login from receita;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$this->codigo = count($stmt->fetchAll(PDO::FETCH_NUM)); 

		$this->cont = $this->cont+1;
		$query = "insert into receita_individual (nome, codigo, valor, data_rec, login)
		values ('$this->nome', $this->codigo, $this->valor, '$this->data_rec', '$this->login');";
		$this->conexao->exec($query);

		header('Location: receita.php?receitacadastrada=1'); 
			
		/*}if($cont == 0){
			$query = "insert into receita_individual (nome, codigo, valor, data_rec, login)
			values ('$this->nome', 1, $this->valor, '$this->data_rec', '$this->login');";
			$this->conexao->exec($query);

			header('Location: receita.php?receitacadastrada=1'); 
			
		}*/
		
	}


	public function retornaRreceita(){
		
	}

}

?>

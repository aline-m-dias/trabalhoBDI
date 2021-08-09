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
		if(!isset($_SESSION)){
            session_start();
        }
		$this->login = $_SESSION["login"];

		$query = "select codigo from receita;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$this->codigo = count($stmt->fetchAll(PDO::FETCH_NUM)); 
		$this->codigo++;
		$query = "insert into receita (nome, codigo, valor, data_rec, login)
		values ('$this->nome', $this->codigo, $this->valor, '$this->data_rec', '$this->login');";
		$this->conexao->exec($query);

		header('Location: receita.php?receitacadastrada=1'); 
		
	}

	public function imprimirReceitas(){
		if(!isset($_SESSION)){
            session_start();
        }
		$this->login = $_SESSION["login"];

		$query = "select R.nome, R.valor, R.data_rec from receita R, usuario U where '$this->login' = U.login AND '$this->login' = R.login;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

}

?>

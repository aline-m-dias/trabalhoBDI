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
		$this->codigo = $receita->__get('codigo');
	}
	
	
	public function inserirReceita(){

		try{
			if(!isset($_SESSION)){
				session_start();
			}
			$this->login = $_SESSION["login"];

			$query = "select count(codigo) as cont, max(codigo) as max from receita;";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			$receita = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($receita[0]['cont'] == 0){
				$this->codigo = 0;
			}else{
				$this->codigo = $receita[0]['max']; 
			}
			$this->codigo ++; 

			$query = "insert into receita (nome, codigo, valor, data_rec, login)
			values ('$this->nome', $this->codigo, $this->valor, '$this->data_rec', '$this->login');";
			$this->conexao->exec($query);

			header('Location: receita.php?receitacadastrada=1'); 
		}catch (PDOException $e){
			header('Location: receita.php?erroCadastro=1');
		}
	}

	public function erro(){
		header('Location: receita.php?inputEmBranco=1');
	}

	public function imprimirReceitas(){
		try{
			if(!isset($_SESSION)){
				session_start();
			}
			$this->login = $_SESSION["login"];
	
			$query = "select R.nome, R.valor, R.data_rec, R.codigo from receita R, usuario U where '$this->login' = U.login AND '$this->login' = R.login;";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch (PDOException $e){
			return null;
		}		
	}

	public function calcularReceitasTotais(){
		if(!isset($_SESSION)){
			session_start();
		}
		$this->login = $_SESSION["login"];

		$query = "select sum (R.valor) as valor from receita R, usuario U
					where R.login = '$this->login' AND U.login = '$this->login';";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$receita = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		if($receita[0]['valor'] == NULL){
			$receitas_totais = 0;
		}else{
			$receitas_totais = $receita[0]['valor'];
		}
		return $receitas_totais;
	}

	public function excluirReceita(){
		try{
			if (!isset($_SESSION)) {
				session_start();
			}
			$this->login = $_SESSION["login"];
	
			$query = "delete from receita where '$this->login' = login and $this->codigo = codigo;";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
	
			header('Location: receita.php?receitaexcluida=1');
		}catch (PDOException $e){
			header('Location: receita.php?erroExcluir=1');
		}
	}
}

?>

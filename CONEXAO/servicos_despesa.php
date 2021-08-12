<?php

class Serviços_despesa
{
	private $conexao;
	private $tipo; 
	private $nome;
	private $codigo;
	private $valor;
    private $data_desp;
    private $login;


	public function __construct(Conexao $conexao, Despesa $despesa)
	{
		$this->conexao = $conexao->conectar();
		$this->tipo = $despesa->__get('tipo');
		$this->nome = $despesa->__get('nome');
		$this->valor = $despesa->__get('valor');
		$this->data_desp = $despesa->__get('data_desp');
	}

	public function inserirDespesa(){
		if(!isset($_SESSION)){
			session_start();
		}
		$this->login = $_SESSION["login"];

		if ($this->tipo == 'Alimentação') {
			$this->tipo = 'alimentacao';
		} else if ($this->tipo == 'Saúde') {
			$this->tipo = 'saude';
		}else if ($this->tipo == 'Educação') {
			$this->tipo = 'educacao';
		}else if ($this->tipo == 'Moradia') {
			$this->tipo = 'moradia';
		}else if ($this->tipo == 'Transporte') {
			$this->tipo = 'transporte';
		}else if ($this->tipo == 'Diversos') {
			$this->tipo = 'diversos';
		}

		$query = "select codigo from $this->tipo;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$cont = count($stmt->fetchAll(PDO::FETCH_NUM));
		if($cont == 0){
			$_SESSION["geradorCodigoDespesa"] = 0;
		}
		$_SESSION["geradorCodigoDespesa"] = $_SESSION["geradorCodigoDespesa"] + 1;
		$this->codigo = $_SESSION["geradorCodigoDespesa"];

		$query = "insert into $this->tipo (nome, codigo, valor, data_desp, login)
		values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
		$this->conexao->exec($query);
		header('Location: despesa.php?despesacadastrada=1');
	}

	public function imprimirDespesas(){
		if(!isset($_SESSION)){
            session_start();
        }
		$this->login = $_SESSION["login"];
		$_SESSION["tipoDespesa"] = $this->tipo;

		if ($this->tipo == 'Alimentação') {
			$this->tipo = 'alimentacao';
		} else if ($this->tipo == 'Saúde') {
			$this->tipo = 'saude';
		}else if ($this->tipo == 'Educação') {
			$this->tipo = 'educacao';
		}else if ($this->tipo == 'Moradia') {
			$this->tipo = 'moradia';
		}else if ($this->tipo == 'Transporte') {
			$this->tipo = 'transporte';
		}else if ($this->tipo == 'Diversos') {
			$this->tipo = 'diversos';
		}

		$query = "select D.nome, D.valor, D.data_desp, D.codigo from $this->tipo D, usuario U where '$this->login' = U.login AND '$this->login' = D.login;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function calcularDespesasTotais(){
		if(!isset($_SESSION)){
            session_start();
        }
		$this->login = $_SESSION["login"];

		$categoria_despesa = ['alimentacao', 'saude', 'educacao', 'moradia','transporte','diversos'];
		$despesas_totais = 0;

		$i = isset($i) ? 0 : 0;
    	for ($i = 0; $i < 6; $i++) {
			$query = "select sum (D.valor) as valor from $categoria_despesa[$i] D, usuario U
					where D.login = '$this->login' AND U.login = '$this->login';";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			$despesa_total_categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($despesa_total_categoria[0]['valor'] == NULL){
				$despesas_totais = $despesas_totais + 0;
			}else{
				$despesas_totais = $despesas_totais + $despesa_total_categoria[0]['valor'];	
			}	
		}
		return $despesas_totais;
	}

	public function totalDespesaGrafico(){
		if(!isset($_SESSION)){
            session_start();
        }
		$this->login = $_SESSION["login"];

		$cat_despesa_total = [
			0 => ['tipo' => 'alimentacao','valor' => 0],
			1 => ['tipo' => 'saude','valor' => 0],
			2 => ['tipo' => 'educacao','valor' => 0],
			3 => ['tipo' => 'moradia','valor' => 0],
			4 => ['tipo' => 'transporte','valor' => 0],
			5 => ['tipo' => 'diversos','valor' => 0]];

		$i = isset($i) ? 0 : 0;
		for ($i; $i<6; $i++) {
			$aux = $cat_despesa_total[$i]['tipo'];
			$query = "select sum (D.valor) as valor from $aux D, usuario U
					where D.login = '$this->login' AND U.login = '$this->login';";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			$despesa_total_categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($despesa_total_categoria[0]['valor'] != NULL){
				$cat_despesa_total[$i]['valor'] = $despesa_total_categoria[0]['valor'];	
			}	
		}
		return $cat_despesa_total;	
	}

	public function excluirDespesa(){
		if (!isset($_SESSION)) {
			session_start();
		}
		$this->login = $_SESSION["login"];
		$this->codigo = $_SESSION["codigoDespesa"];
		$this->tipo = $_SESSION["tipoDespesa"];

		$query = "delete from $this->tipo where '$this->login' = login and $this->codigo = codigo;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();

		header('Location: despesa.php?despesaexcluida=1');

	}
}

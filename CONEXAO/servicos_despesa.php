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
		$this->codigo = count($stmt->fetchAll(PDO::FETCH_NUM));
		$this->codigo++;

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

		$query = "select D.nome, D.valor, D.data_desp from $this->tipo D, usuario U where '$this->login' = U.login AND '$this->login' = D.login;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

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

	public function inserirDespesa()
	{
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

<<<<<<< HEAD
		if ($this->tipo == 'Alimentação') {
			$query = "insert into alimentacao (nome, codigo, valor, data_desp, login)
			values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
			$this->conexao->exec($query);
		}
		if ($this->tipo == 'Saúde') {
			$query = "insert into saude (nome, codigo, valor, data_desp, login)
			values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
			$this->conexao->exec($query);
		}
		if ($this->tipo == 'Educação') {
			$query = "insert into educacao (nome, codigo, valor, data_desp, login)
			values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
			$this->conexao->exec($query);
		}
		if ($this->tipo == 'Moradia') {
			$query = "insert into moradia (nome, codigo, valor, data_desp, login)
			values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
			$this->conexao->exec($query);
		}
		if ($this->tipo == 'Transporte') {
			$query = "insert into transporte (nome, codigo, valor, data_desp, login)
			values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
			$this->conexao->exec($query);
		}
		if ($this->tipo == 'Diversos') {
			$query = "insert into diversos (nome, codigo, valor, data_desp, login)
			values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
			$this->conexao->exec($query);
		}
=======
		$query = "insert into $this->tipo (nome, codigo, valor, data_desp, login)
		values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
		$this->conexao->exec($query);
>>>>>>> c2e690fbf9c1b44acc462e9eff68825dc57a6e56
		header('Location: despesa.php?despesacadastrada=1');
	}

	public function retornarDespesa()
	{
	}
}

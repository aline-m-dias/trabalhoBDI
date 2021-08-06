<?php

class Serviços_despesa
{

	private $conexao;
	private $despesa;


	public function __construct(Conexao $conexao, Despesa $despesa)
	{
		$this->conexao = $conexao->conectar();
		$this->despesa = $despesa;
	}

	public function inserirDespesa()
	{
		session_start();
		$this->login = $_SESSION["login"];

		$query = "select codigo from despesa;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$this->codigo = count($stmt->fetchAll(PDO::FETCH_NUM));
		$this->codigo++;

		if ($this->tipo == 'Alimentação') {
			$query = "insert into alimentacao (nome, codigo, valor, data_desp, login)
			values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
			$this->conexao->exec($query);
		}
		if ($this->tipo == 'Alimentação') {
			$query = "insert into alimentacao (nome, codigo, valor, data_desp, login)
			values ('$this->nome', $this->codigo, $this->valor, '$this->data_desp', '$this->login');";
			$this->conexao->exec($query);
		}
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
		header('Location: despesa.php?despesacadastrada=1');
	}

	public function retornarDespesa()
	{
	}
}

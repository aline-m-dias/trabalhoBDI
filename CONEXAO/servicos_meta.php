<?php

class Serviços_meta
{

	private $tipo; //tipo da meta
	private $nome_meta;
	private $codigo;
	private $valor;
	private $data_fim;
	private $login;


	public function __construct(Conexao $conexao, Meta $meta)
	{
		$this->conexao = $conexao->conectar();
		$this->nome_meta = $meta->__get('nome_meta');
		$this->valor = $meta->__get('valor');
		$this->data_fim = $meta->__get('data_fim');
	}


	public function inserirMeta()
	{
		if (!isset($_SESSION)) {
			session_start();
		}
		$this->login = $_SESSION["login"];
		$this->tipo = $_SESSION["meta"];

		$query = "select M.codigo from $this->tipo M, usuario U where '$this->login' = U.login AND '$this->login' = M.login;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$cont = count($stmt->fetchAll(PDO::FETCH_NUM));
		
		if($cont == 0){
			$query = "select codigo from $this->tipo;";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			$this->codigo = count($stmt->fetchAll(PDO::FETCH_NUM));
			$this->codigo ++;

			$query = "insert into $this->tipo (nome_meta, codigo, valor, data_fim, login)
			values ('$this->nome_meta', $this->codigo, $this->valor, '$this->data_fim', '$this->login');";
			$this->conexao->exec($query);

			if ($this->tipo == 'meta_curto_prazo') {
				header('Location: metaCurtoPrazo.php?metacadastrada=1');
			} else if ($this->tipo == 'meta_longo_prazo') {
				header('Location: metaLongoPrazo.php?metacadastrada=1');
			}
		}else{
			if ($this->tipo == 'meta_curto_prazo') {
				header('Location: metaCurtoPrazo.php?metacadastrada=0');
			} else if ($this->tipo == 'meta_longo_prazo') {
				header('Location: metaLongoPrazo.php?metacadastrada=0');
			}
		}
	}

	public function imprimirMetas(){
		if (!isset($_SESSION)) {
			session_start();
		}
		$this->login = $_SESSION["login"];
		$this->tipo = $_SESSION["meta"];

		$query = "select M.nome_meta, M.valor, M.data_fim from $this->tipo M, usuario U where '$this->login' = U.login AND '$this->login' = M.login;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		

	}
}

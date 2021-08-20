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
		try{
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
				$query = "select max(codigo) as max from $this->tipo;";
				$stmt = $this->conexao->prepare($query);
				$stmt->execute();
				$meta = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				$this->codigo = $meta[0]['max']; 
				$this->codigo++;
				 
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
		}catch (PDOException $e){
			if ($this->tipo == 'meta_curto_prazo') {
				header('Location: metaCurtoPrazo.php?erroCadastrar=1');
			} else if ($this->tipo == 'meta_longo_prazo') {
				header('Location: metaLongoPrazo.php?erroCadastrar=1');
			}
		}
	}

	public function erroMetaCurtoPrazo(){
		header('Location: metaCurtoPrazo.php?inputEmBranco=1');
	}

	public function erroMetaLongoPrazo(){
		header('Location: metaLongoPrazo.php?inputEmBranco=1');
	}

	public function imprimirMeta(){
		try{
			if (!isset($_SESSION)) {
				session_start();
			}
			$this->login = $_SESSION["login"];
			$this->tipo = $_SESSION["meta"];
	
			$query = "select M.nome_meta, M.valor, M.data_fim from $this->tipo M, usuario U where '$this->login' = U.login AND '$this->login' = M.login;";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch (PDOException $e){
			if ($this->tipo == 'meta_curto_prazo') {
				header('Location: metaCurtoPrazo.php?erroImprimir=1');
			} else if ($this->tipo == 'meta_longo_prazo') {
				header('Location: metaLongoPrazo.php?erroImprimir=1');
			}
		}			
	}

	public function excluirMeta(){
		try {
			if (!isset($_SESSION)) {
				session_start();
			}
			$this->login = $_SESSION["login"];
			$this->tipo = $_SESSION["meta"];
	
			$query = "delete from $this->tipo where '$this->login' = login;";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
	
			if ($this->tipo == 'meta_curto_prazo') {
				header('Location: metaCurtoPrazo.php?metaexcluida=1');
			} else if ($this->tipo == 'meta_longo_prazo') {
				header('Location: metaLongoPrazo.php?metaexcluida=1');
			}
		}catch (PDOException $e){
			if ($this->tipo == 'meta_curto_prazo') {
				header('Location: metaCurtoPrazo.php?erroExcluir=1');
			} else if ($this->tipo == 'meta_longo_prazo') {
				header('Location: metaLongoPrazo.php?erroExcluir=1');
			}
		}	
	}
}

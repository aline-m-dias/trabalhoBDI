<?php

class Serviços_meta {

	private $tipo; //tipo da meta
	private $nome_meta;
	private $codigo;
	private $valor;
    private $data_fim;
    private $login;
	
	
	public function __construct(Conexao $conexao, Meta $meta) { 
		$this->conexao = $conexao->conectar();
        $this->nome_meta = $meta->__get('nome_meta');
		$this->valor = $meta->__get('valor');
		$this->data_fim = $meta->__get('data_fim');
	}
	
	
	public function inserirMeta(){
		session_start( );
		$this->login = $_SESSION["login"];
		$this->tipo = $_SESSION["meta"];

		$query = "select codigo from $this->tipo;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$this->codigo = count($stmt->fetchAll(PDO::FETCH_NUM)); 
		$this->codigo++;

		$query = "insert into $this->tipo (nome_meta, codigo, valor, data_fim, login)
		values ('$this->nome_meta', $this->codigo, $this->valor, '$this->data_fim', '$this->login');";
		$this->conexao->exec($query);

		if($this->tipo == 'meta_curto_prazo'){
			header('Location: metaCurtoPrazo.php?metacadastrada=1'); 
		}else if($this->tipo == 'meta_curto_prazo'){
			header('Location: metaLongoPrazo.php?metacadastrada=1');
		}
		
		
		
	}


	public function retornaRmeta(){
		
	}

}

?>
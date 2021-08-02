<?php

class Serviços_meta {

	private $conexao;
	private $despesa;
	

	public function __construct(Conexao $conexao, Meta $meta) { 
		$this->conexao = $conexao->conectar();
		$this->meta = $meta;
	}

	public function inserirMeta(){

	}
	
	public function retornarMeta(){
		
	}
}

?>
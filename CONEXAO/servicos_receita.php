<?php

class Serviços_receita {

	private $conexao;
	private $receita;
	

	public function __construct(Conexao $conexao, Receita $receita) { 
		$this->conexao = $conexao->conectar();
		$this->receita = $receita;
	}

	public function inserirReceita(){

	}
	
    public function retornarReceita(){
		
	}
}

?>
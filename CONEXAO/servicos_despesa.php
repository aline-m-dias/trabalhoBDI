<?php

class Serviços_despesa {

	private $conexao;
	private $despesa;
	

	public function __construct(Conexao $conexao, Despesa $despesa) { 
		$this->conexao = $conexao->conectar();
		$this->despesa = $despesa;
	}

	public function inserirDespesa(){

	}
	
    public function retornarDespesa(){
		
	}
}


?>
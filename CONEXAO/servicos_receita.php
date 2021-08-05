<?php

class Serviços_receita {

	private $conexao;
    private $login;
	private $nome;
	private $codigo;
	private $valor;
	private $data_rec;
	
	
	public function __construct(Conexao $conexao, Receita $receita) { 
		$this->conexao = $conexao->conectar();
		$this->login = $receita->__get('login');
        $this->nome = $receita->__get('nome');
		$this->codigo = $receita->__get('codigo');
		$this->valor = $receita->__get('valor');
		$this->data_rec = $receita->__get('data_rec');
	}
	
	
	public function inserirReceita(){
		$query = "insert into receita_individual (nome, codigo, valor, data_rec, login)
		values ('$this->nome', $this->codigo, $this->valor, '$this->data_rec', '$this->login');";
		$this->conexao->exec($query);

		header('Location: receita.php?receitacadastrada=1'); //após a plicação do BD me direciona para essa página
		
	}


	public function retornaRreceita(){
		
	}

}

?>

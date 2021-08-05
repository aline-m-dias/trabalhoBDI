<?php

class Serviços_pessoa {

	private $conexao;
	private $login;
    private $cpf;
	private $nome_pessoa;
	private $data_nasc;
	private $parentesco;
	
	
	public function __construct(Conexao $conexao, Pessoa $pessoa) { 
		$this->conexao = $conexao->conectar();
		$this->cpf = $pessoa->__get('cpf');
        $this->login = $pessoa->__get('login');
		$this->nome_pessoa = $pessoa->__get('nome_pessoa');
		$this->data_nasc = $pessoa->__get('data_nasc');
		$this->parentesco = $pessoa->__get('parentesco');
	}
	
	
	public function inserirPessoa(){
		$query = "insert into pessoa (cpf, nome_pessoa, data_nasc, parentesco, login)
		values ('13770130540', 'Gabriele Almeida', '04111998', 'filha', 'naalmeida98');";
		$this->conexao->exec($query);

		header('Location: pessoa.php?pessoacadastrada=1'); //após aplicação do BD me direciona para essa página
		
	}

	public function retornarPessoa(){
		
	}

}

?>

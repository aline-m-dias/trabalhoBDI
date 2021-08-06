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
		$this->nome_pessoa = $pessoa->__get('nome_pessoa');
		$this->data_nasc = $pessoa->__get('data_nasc');
		$this->parentesco = $pessoa->__get('parentesco');
	}
	
	
	public function inserirPessoa(){ 
		if(!isset($_SESSION)){
            session_start();
        }
		$this->login = $_SESSION["login"];

		$query = "insert into pessoa (cpf, nome_pessoa, data_nasc, parentesco, login)
		values ('$this->cpf', '$this->nome_pessoa', '$this->data_nasc', '$this->parentesco', '$this->login');";
		$this->conexao->exec($query);

		header('Location: pessoa.php?pessoacadastrada=1'); //após aplicação do BD me direciona para essa página
		
	}

	public function retornarPessoa(){
		
	}

}

?>

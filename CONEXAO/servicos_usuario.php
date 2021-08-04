
<?php

class Serviços_usuario {

	private $conexao;
	private $login;
	private $senha;
	private $nome_familia;
	private $qtd_pessoas;
	
	
	public function __construct(Conexao $conexao, Usuario $usuario) { 
		$this->conexao = $conexao->conectar();
		$this->login = $usuario->__get('login');
		$this->senha = $usuario->__get('senha');
		$this->nome_familia = $usuario->__get('nome_familia');
		$this->qtd_pessoas = $usuario->__get('qtd_pessoas');
	}
	
	
	public function inserirUsuario(){
		$query = "insert into usuario (login,senha, nome_familia, qtd_pessoas)
		values ('$this->login', '$this->senha', '$this->nome_familia', $this->qtd_pessoas );";
		$this->conexao->exec($query);
		
	}

	/*$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':login', $this->usuario->__get('login'));
		$stmt->bindValue(':senha', $this->usuario->__get('senha'));
		$stmt->bindValue(':nome_familia', $this->usuario->__get('nome_familia'));
		$stmt->bindValue(':qtd_pessoas', $this->usuario->__get('qtd_pessoas'));
		$stmt->execute();*/

	public function logar(){
		//EDITAR!!
		$query = "select U.login from usuario U where '$this->login' = U.login and 
		'$this->login' = U.senha;";
		$retorno = $this->conexao->exec($query);
		echo $retorno;
	}

	public function retornarUsuario(){
		
	}



}

?>


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

		//TRATAR A EXCEÇÃO QUANDO TIVER JÁ UM USUÁRIO COM AQUELE NOME
		header('Location: pagprincipal.php'); //após a plicação do BD me direciona para essa página
		
	}

	public function logar(){
		$query = "select U.login from usuario U where '$this->login' = U.login and '$this->senha' = U.senha;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		$cont = count($stmt->fetchAll(PDO::FETCH_NUM)); 

		if($cont == 0){
			header('Location: login.php?loginnegado=1');
		}
		if($cont == 1){
			header('Location: pagprincipal.php');
		}
	}

	public function retornarUsuario(){
		
	}



}

?>

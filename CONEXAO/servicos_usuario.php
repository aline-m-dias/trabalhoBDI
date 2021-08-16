
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
		try{
			$query = "select U.login from usuario U where '$this->login' = U.login;";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			$cont = count($stmt->fetchAll(PDO::FETCH_NUM)); 

			if($cont == 1){
				header('Location: index.php?usuarioexistente=1');
			}else if($cont == 0){
				$query = "insert into usuario (login,senha, nome_familia, qtd_pessoas)
				values ('$this->login', '$this->senha', '$this->nome_familia', $this->qtd_pessoas );";
				$this->conexao->exec($query);
				header('Location: login.php');}
		}catch(PDOException $e){
			header('Location: index.php?erro=1');
		}	
	}

	public function erro(){
		header('Location: index.php?inputEmBranco=1');
	}

	public function logar(){
		try{
			$query = "select U.login, U.nome_familia from usuario U where '$this->login' = U.login and '$this->senha' = U.senha;";
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			$cont = count($stmt->fetchAll(PDO::FETCH_NUM)); 

			if($cont == 0){
				header('Location: login.php?loginnegado=1');
			}else if($cont == 1){
				$query = "select U.nome_familia from usuario U where '$this->login' = U.login and '$this->senha' = U.senha;";
				$stmt = $this->conexao->prepare($query);
				$stmt->execute();
				$aux = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if(!isset($_SESSION)){
					session_start();
				};
				$_SESSION["login"] = $this->login;
				$_SESSION["nome_familia"] = $aux[0]['nome_familia'];
				header('Location: pagprincipal.php');}
		}catch (PDOException $e){
			header('Location: login.php?erro=1');
		}
	}
}?>

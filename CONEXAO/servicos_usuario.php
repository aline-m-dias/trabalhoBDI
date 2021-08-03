
<?php

class Serviços_usuario {

	private $conexao;
	private $usuario;
	

	public function __construct(Conexao $conexao, Usuario $usuario) { 
		$this->conexao = $conexao->conectar();
		$this->usuario = $usuario;
	}
	
	

	public function inserirUsuario(){
		$query = 'insert into usuario (login, senha, nome_familia, qtd_pessoas)
		values(:login, :senha, :nome_familia, :qtd_pessoas)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':login', $this->usuario->__get('login'));
		$stmt->bindValue(':senha', $this->usuario->__get('senha'));
		$stmt->bindValue(':nome_familia', $this->usuario->__get('nome_familia'));
		$stmt->bindValue(':qtd_pessoas', $this->usuario->__get('qtd_pessoas'));
		$stmt->execute();
	}

	

	public function logar(){
		
	}

	public function retornarUsuario(){
		
	}



}

?>


<?php

class Serviços_usuario {

	private $conexao;
	private $usuario;
	

	public function __construct(Conexao $conexao, Usuario $usuario) { 
		$this->conexao = $conexao->conectar();
		$this->usuario = $usuario;
	}

	public function inserirUsuario(){

	}

	public function logar(){
		
	}

	public function retornarUsuario(){
		
	}

	public function inserir() { //create
		$query = 'insert into tb_tarefas(tarefa)values(:tarefa)'; //tarefa será especificado no bindValue
		$stmt = $this->conexao->prepare($query); 
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa')); //trata a inserção: remove injeções de SQL
		$stmt->execute(); //executa a função de inserir uma nova tupla
	}

	public function recuperar() { //read
		$query = '
			select 
				t.id, s.status, t.tarefa 
			from 
				tb_tarefas as t
				left join tb_status as s on (t.id_status = s.id)
		';
		
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ); // fetchall retorna todos os registros da consulta em forrma
		// em forma de um array, para acessar indice especifico variavel[]->local 
		//TECH_OBJ retorna a consulta em classes de objetos
	}

}

?>

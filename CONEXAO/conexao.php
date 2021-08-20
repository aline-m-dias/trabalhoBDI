<?php

class Conexao
{

	private $host = 'ec2-35-153-114-74.compute-1.amazonaws.com';
	private $dbname = 'd46f2u52mcqvnk';
	private $user = 'cfpffxorgxfkzk';
	private $pass = '1c9ce944b50a8fa0afed83ddc6cf8229289db0f3fe6d911bd3dd0de47c3ead2f';

	public function conectar()
	{
		try {
			$conexao = new PDO(
				"pgsql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"
			);
			return $conexao;
		} catch (PDOException $e) {
			echo '<p>' . $e->getMessage() . '</p>';
			print("ERRO DE CONEXÃO");
		}
	}
}

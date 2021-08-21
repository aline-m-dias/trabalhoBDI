<?php

class Conexao
{
	private $host = 'ec2-44-195-247-84.compute-1.amazonaws.com';
	private $dbname = 'dcdqohb6s9ia6e';
	private $user = 'hfmgsqeodenguh';
	private $pass = 'f33fedc0e4e7ec79ad2304303b21b31df0b336eeb81237861f44f55e64645593';

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

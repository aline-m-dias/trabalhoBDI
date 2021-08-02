<?php

class Usuario{
	private $login;
	private $senha;
	private $nome_familia;
	private $qtd_pessoas;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}

?>
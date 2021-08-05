<?php

class Pessoa{
	private $cpf;
    private $nome_pessoa;
	private $data_nasc;
	private $parentesco;
	private $login;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}

?>
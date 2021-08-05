<?php

class Receita{
	private $nome;
	private $codigo;
	private $valor;
    private $cpf;
	private $data_rec;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}

?>
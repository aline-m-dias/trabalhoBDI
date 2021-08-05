<?php

class Receita{
	private $nome;
	private $codigo;
	private $valor;
    private $data_rec;
	private $login;
	
	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}

?>
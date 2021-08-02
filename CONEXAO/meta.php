<?php

class Meta{
	private $tipo; //tipo da meta
	private $nome_meta;
	private $codigo;
	private $valor;
    private $data_fim;
    private $login;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}

?>
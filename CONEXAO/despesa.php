<?php

class Despesa{
	private $tipo; //tipo da tabela de despesa
	private $nome;
	private $codigo;
	private $valor;
    private $data_desp;
    private $login;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
	}
}?>
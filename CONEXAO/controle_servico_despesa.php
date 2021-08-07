<?php
//recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
require "../../CONEXAO/conexao.php";
require "../../CONEXAO/despesa.php";
require "../../CONEXAO/servicos_despesa.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
//setando os valores de despesa preencheidos pelo input 
if ($acao == 'inserirDespesa') {
    $despesa = new Despesa();
    $despesa->__set('nome', $_POST['nome']);
    $despesa->__set('valor', $_POST['valor']);
    $despesa->__set('tipo', $_POST['tipo']);
    $despesa->__set('data_desp', $_POST['data_desp']);

    $conexao = new Conexao();
    $servico_despesa = new Serviços_despesa($conexao, $despesa);
    $servico_despesa->inserirDespesa();
}

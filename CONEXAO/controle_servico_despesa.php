<?php
//recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
require_once "../../CONEXAO/conexao.php";
require_once "../../CONEXAO/despesa.php";
require_once "../../CONEXAO/servicos_despesa.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

//setando os valores de despesa preencheidos pelo input 
if ($acao == 'inserirDespesa') {
    if( $_POST['nome'] == '' || $_POST['valor'] == '' || $_POST['tipo'] == ''){
        $despesa = new Despesa();
        $conexao = new Conexao();
        $servico_despesa = new Serviços_despesa($conexao, $despesa);
        $servico_despesa->erro();
    } else{
        $despesa = new Despesa();
        $despesa->__set('nome', $_POST['nome']);
        $despesa->__set('valor', $_POST['valor']);
        $despesa->__set('tipo', $_POST['tipo']);
        $despesa->__set('data_desp', $_POST['data_desp']);
        $conexao = new Conexao();
        $servico_despesa = new Serviços_despesa($conexao, $despesa);
        $servico_despesa->inserirDespesa();
    }    
}else if($acao == 'imprimirDespesas?totalDespesaGrafico'){
    if (!isset($_SESSION)) {
        session_start();
    }
    $despesa = new Despesa();
    $conexao = new Conexao();
    $despesa->__set('tipo', $_POST['tipo']);
    $servico_despesa = new Serviços_despesa($conexao, $despesa);
    $listaDespesas = $servico_despesa->imprimirDespesas();
} else if($acao == 'calcularTotal'){
    $despesa = new Despesa();
    $conexao = new Conexao();
    $servico_despesa = new Serviços_despesa($conexao, $despesa);
    $despesas_totais = $servico_despesa->calcularDespesasTotais();
}else if($acao == 'excluirDespesa'){
    $despesa = new Despesa();
    $conexao = new Conexao();
    $despesa->__set('codigo',$_GET['codigo']);
    $servico_despesa = new Serviços_despesa($conexao, $despesa);
    $servico_despesa->excluirDespesa();
}

if($acao == 'imprimirDespesas?totalDespesaGrafico' or $acao == 'totalDespesaGrafico' ){
    $despesa = new Despesa();
    $conexao = new Conexao();
    $servico_despesa = new Serviços_despesa($conexao, $despesa);
    $despesa_total_grafico = $servico_despesa->totalDespesaGrafico();
}

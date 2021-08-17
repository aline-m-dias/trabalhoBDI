<?php
    //recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
    require_once "../../CONEXAO/conexao.php";
    require_once "../../CONEXAO/receita.php";
    require_once "../../CONEXAO/servicos_receita.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
     //setando os valores de receita preencheidos pelo input 
     if ($acao == 'inserirReceita'){
        if( $_POST['nome'] == '' || $_POST['valor'] == ''){
            $receita = new Receita();
            $conexao = new Conexao();
            $servico_receita = new Serviços_receita($conexao, $receita);
            $servico_receita->erro();
        }else{
            $receita = new Receita();
            $receita->__set('nome',$_POST['nome']);
            $receita->__set('data_rec',$_POST['data_rec']);
            $receita->__set('valor',$_POST['valor']);
            
            $conexao = new Conexao();
            $servico_receita = new Serviços_receita($conexao, $receita);
            $servico_receita->inserirReceita();
        }        
    } else if($acao == 'imprimirReceitas'){
        $receita = new Receita();
        $conexao = new Conexao();
        $servico_receita = new Serviços_receita($conexao, $receita);
        $listaReceitas = $servico_receita->imprimirReceitas();
    }  else if($acao == 'calcularTotal'){
        $receita = new Receita();
        $conexao = new Conexao();
        $servico_receita = new Serviços_receita($conexao, $receita);
        $receitas_totais = $servico_receita->calcularReceitasTotais();
    } else if($acao == 'excluirReceita'){
        $receita = new Receita();
        $conexao = new Conexao();
        $receita->__set('codigo',$_GET['codigo']);
        $servico_receita = new Serviços_receita($conexao, $receita);
        $servico_receita->excluirReceita();
    }
    
?> 
<?php
    //recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
    require "../../CONEXAO/conexao.php";
    require "../../CONEXAO/receita.php";
    require "../../CONEXAO/servicos_receita.php";

     //setando os valores de receita preencheidos pelo input 
     if (isset($_GET['acao']) && $_GET['acao'] == 'inserirReceita'){
        $receita = new Receita();
        $receita->__set('nome',$_POST['nome']);
        $receita->__set('data_rec',$_POST['data_rec']);
        $receita->__set('valor',$_POST['valor']);

        echo '<prep>';
        print_r("chegou aqui");
        echo '<prep>';
        
        $conexao = new Conexao();
        $servico_receita = new Serviços_receita($conexao, $receita);
        $servico_receita->inserirReceita();
    }
    
?> 
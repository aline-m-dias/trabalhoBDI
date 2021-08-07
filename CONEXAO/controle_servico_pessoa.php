<?php
    //recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
    require "../../CONEXAO/conexao.php";
    require "../../CONEXAO/pessoa.php";
    require "../../CONEXAO/servicos_pessoa.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    //setando os valores de pessoa preencheidos pelo input 
    if ($acao == 'inserirPessoa'){
        $pessoa = new Pessoa();

        $pessoa->__set('cpf',$_POST['cpf']);
        $pessoa->__set('nome_pessoa',$_POST['nome_pessoa']);
        $pessoa->__set('data_nasc',$_POST['data_nasc']);
        $pessoa->__set('parentesco',$_POST['parentesco']);
        
        $conexao = new Conexao();
        $servico_pessoa = new Serviços_pessoa($conexao, $pessoa);
        $servico_pessoa->inserirPessoa();
    }else if($acao == 'imprimirPessoas'){
        $pessoa = new Pessoa();
        $conexao = new Conexao();
        $servico_pessoa = new Serviços_pessoa($conexao, $pessoa);
        $listaPessoas = $servico_pessoa->imprimirPessoas();
    }
    
?> 
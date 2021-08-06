<?php
    //recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
    require "../../CONEXAO/conexao.php";
    require "../../CONEXAO/meta.php";
    require "../../CONEXAO/servicos_meta.php";

     //setando os valores preencheidos pelo input 
     if (isset($_GET['acao']) && $_GET['acao'] == 'inserirMetaCurtoPrazo'){
        $meta = new Meta();
        $meta->__set('nome_meta',$_POST['nome_meta']);
        $meta->__set('data_fim',$_POST['data_fim']);
        $meta->__set('valor',$_POST['valor']);
        session_start( );
		$_SESSION["meta"] = 'meta_curto_prazo';
        
        $conexao = new Conexao();
        $servico_meta = new Serviços_meta($conexao, $meta);
        $servico_meta->inserirMeta();
    } else if (isset($_GET['acao']) && $_GET['acao'] == 'inserirMetaLongoPrazo'){
        $meta = new Meta();
        $meta->__set('nome_meta',$_POST['nome_meta']);
        $meta->__set('data_fim',$_POST['data_fim']);
        $meta->__set('valor',$_POST['valor']);
        session_start( );
		$_SESSION["meta"] = 'meta_longo_prazo';
        
        $conexao = new Conexao();
        $servico_meta = new Serviços_meta($conexao, $meta);
        $servico_meta->inserirMeta();
    }
    
?> 
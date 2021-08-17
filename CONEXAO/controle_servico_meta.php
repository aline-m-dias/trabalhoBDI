<?php
    //recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
    require_once "../../CONEXAO/conexao.php";
    require_once "../../CONEXAO/meta.php";
    require_once "../../CONEXAO/servicos_meta.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if ($acao == 'inserirMetaCurtoPrazo'){
        if( $_POST['nome_meta'] == '' || $_POST['valor'] == ''){
            $meta = new Meta();
            $conexao = new Conexao();
            $servico_meta = new Serviços_meta($conexao, $meta);
            $servico_meta->erroMetaCurtoPrazo();
        }else{
            $meta = new Meta();
            $meta->__set('nome_meta',$_POST['nome_meta']);
            $meta->__set('data_fim',$_POST['data_fim']);
            $meta->__set('valor',$_POST['valor']);
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION["meta"] = 'meta_curto_prazo';
            $conexao = new Conexao();
            $servico_meta = new Serviços_meta($conexao, $meta);
            $servico_meta->inserirMeta();
        }} else if ($acao == 'inserirMetaLongoPrazo'){
            if( $_POST['nome_meta'] == '' || $_POST['valor'] == ''){
                $meta = new Meta();
                $conexao = new Conexao();
                $servico_meta = new Serviços_meta($conexao, $meta);
                $servico_meta->erroMetaLongoPrazo();
            }else{
                $meta = new Meta();
                $meta->__set('nome_meta',$_POST['nome_meta']);
                $meta->__set('data_fim',$_POST['data_fim']);
                $meta->__set('valor',$_POST['valor']);
                
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION["meta"] = 'meta_longo_prazo';
                
                $conexao = new Conexao();
                $servico_meta = new Serviços_meta($conexao, $meta);
                $servico_meta->inserirMeta();}
    } else if ($acao == 'imprimirMetasCurtoPrazo'){
        if(!isset($_SESSION)){
            session_start();
        }
		$_SESSION["meta"] = 'meta_curto_prazo';

        $meta = new Meta();
        $conexao = new Conexao();
        $servico_meta = new Serviços_meta($conexao, $meta);
        $listaMetas = $servico_meta-> imprimirMeta();
    } else if ($acao == 'imprimirMetasLongoPrazo'){
        if(!isset($_SESSION)){
            session_start();
        }
		$_SESSION["meta"] = 'meta_longo_prazo';

        $meta = new Meta();
        $conexao = new Conexao();
        $servico_meta = new Serviços_meta($conexao, $meta);
        $listaMetas = $servico_meta-> imprimirMeta();
    } else if($acao == 'excluirMetaCurtoPrazo'){
        if(!isset($_SESSION)){
            session_start();
        }
		$_SESSION["meta"] = 'meta_curto_prazo';

        $meta = new Meta();
        $conexao = new Conexao();
        $servico_meta = new Serviços_meta($conexao, $meta);
        $servico_meta-> excluirMeta();
    } else if($acao == 'excluirMetaLongoPrazo'){
        if(!isset($_SESSION)){
            session_start();
        }
		$_SESSION["meta"] = 'meta_longo_prazo';

        $meta = new Meta();
        $conexao = new Conexao();
        $servico_meta = new Serviços_meta($conexao, $meta);
        $servico_meta-> excluirMeta();
    }

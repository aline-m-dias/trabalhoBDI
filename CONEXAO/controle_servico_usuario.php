<?php
    //recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
    require "../../CONEXAO/conexao.php";
    require "../../CONEXAO/usuario.php";
    require "../../CONEXAO/pessoa.php";
//    require "../../CONEXAO/despesa.php";
    require "../../CONEXAO/meta.php";
    require "../../CONEXAO/servicos_usuario.php";

    //setando os valores de usuario preencheidos pelo input Cadastro
    if (isset($_GET['acao']) && $_GET['acao'] == 'inserirUsuario'){
        $usuario = new Usuario();
        $pessoa = new Pessoa();
     // $despesa = new Despesa();
        $meta = new Meta();

        $usuario->__set('login',$_POST['login']);
        $usuario->__set('nome_familia',$_POST['nome_familia']);
        $usuario->__set('qtd_pessoas',$_POST['qtd_pessoas']);
        $usuario->__set('senha',$_POST['senha']);

        $pessoa->__set('login',$_POST['login']);
     // $despesa->__set('login',$_POST['login']);   
        $meta->__set('login',$_POST['login']);
        
        $conexao = new Conexao();
        $servico_usuario = new Serviços_usuario($conexao, $usuario);
        $servico_usuario->inserirUsuario();
    }
    if(isset($_GET['acao']) && $_GET['acao'] == 'logar'){
        //ESTÁ DANDO ERRO!!
        $usuario = new Usuario();
        $pessoa = new Pessoa();
        // $despesa = new Despesa();
        //$meta = new Meta();

        $usuario->__set('login',$_POST['login']);
        $usuario->__set('senha',$_POST['senha']);

        $pessoa->__set('login',$_POST['login']);
        // $despesa->__set('login',$_POST['login']);   
        //$meta->__set('login',$_POST['login']);
        
        $conexao = new Conexao();
        $servico_usuario = new Serviços_usuario($conexao, $usuario);
        $servico_usuario->logar();        
    }
    
    

 /*   echo '<prep>';
    print_r($servico_usuario);
    echo '</prep>';*/
    
?> 
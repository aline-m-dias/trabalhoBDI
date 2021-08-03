<?php
    //recupera cada informação digitada no 'input' pelo usuário com seus respectivos "name" e valores 
    require "../../CONEXAO/conexao.php";
    require "../../CONEXAO/usuario.php";
    require "../../CONEXAO/servicos_usuario.php";

    echo '<prep>';
    print_r($_POST);
    echo '</prep>';

    //setando os valores de usuario preencheidos pelo input Cadastro
    $usuario = new Usuario();
    $usuario->__set('login',$_POST['login']);
    $usuario->__set('nome_familia',$_POST['nome_familia']);
    $usuario->__set('qtd_pessoas',$_POST['qtd_pessoas']);
    $usuario->__set('senha',$_POST['senha']);
    
    $conexao = new Conexao();
    $servico_usuario = new Serviços_usuario($conexao, $usuario);
    $servico_usuario->inserirUsuario();

    echo '<prep>';
    print_r($servico_usuario);
    echo '</prep>';
    
?> 